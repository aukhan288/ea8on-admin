@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#storeModal" data-action="create">Add New</button>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="bannersTable">
              <thead>
                <tr>
                  <th>Thumbnail</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Store Modal -->
<div class="modal fade" id="storeModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitleId">Add New Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="bannerForm" action="" enctype="multipart/form-data">
          @csrf
          <input type="hidden" id="categoryId" name="id">
          
          <!-- Status Checkbox -->
          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="checkbox" class="form-check-input" id="status" name="status" checked>
            <label class="form-check-label" for="status">Active</label>
          </div>

          <!-- Thumbnail input -->
          <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail</label>
            <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*">
            <!-- Preview container for thumbnail -->
            <div id="thumbnailPreview" class="mt-3">
              <img id="thumbnailPreviewImage" src="#" alt="Thumbnail Preview" class="img-fluid d-none" style="max-height: 150px; object-fit: cover;">
              <span id="noImageText" class="text-muted d-none">No image selected</span>
            </div>
          </div>

          <div id="categoryErrors" class="alert alert-danger d-none"></div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    var table = $('#bannersTable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        stateSave: true,
        ajax: {
            url: "/admin/bannerList",
            type: "GET",
            dataSrc: function(json) {
                console.log(json); // Log the response to check the structure
                return json.banners; // Ensure 'banners' is the key returned by the server
            }
        },
        columns: [
           
            {
              title: 'Thumbnail',
              data: 'banner_img', // Assuming 'category_img' is the key in each category object
              render: function(data, type, row) {
                console.log(row); // Check the row object to ensure category_img exists

                // Check if 'category_img' is present, and use a fallback if not
                return data ? 
                  `<img style="height:40px; width:40px; border-radius:100px" src="{{ url('/') }}/${data}" alt="Category Thumbnail">` : 
                  '<span>No Image</span>'; // Return a default if no image is available
              }
            },
            {
                title: 'Status',
                data: '',
                render: function(data, type, row) {
                    return row?.status ? 
                      `<i class="bi bi-check-circle-fill text-success"></i>` : 
                      `<i class="bi bi-x-circle-fill text-danger"></i>`;
                }
            },
            {
                title: 'Actions',
                data: '',
                render: function(data, type, row) {
                    return `
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-warning" onclick="editCategory(${row?.id})"><i class="bi bi-pencil"></i></button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteCategory(${row?.id})"><i class="bi bi-trash"></i></button>
                        </div>`;
                }
            }
        ],
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50],
        pagingType: "simple_numbers"
    });

    // Handle the form submission for adding/editing category
    $('#bannerForm').on('submit', function(event) {
        event.preventDefault();
        var id = $('#categoryId').val();
        var url = id ? `/admin/banner/${id}` : '/admin/banner/store';
        var method = id ? 'PUT' : 'POST';

        // Get the status value from the checkbox
        var status = $('#status').prop('checked') ? 1 : 0;

        // Append status to FormData
        var formData = new FormData(this);
        formData.append('status', status);

        $.ajax({
            url: url,
            type: method,
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#storeModal').modal('hide');
                table.ajax.reload();
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                var errorHtml = '<ul>';
                for (var key in errors) {
                    errors[key].forEach(function(error) {
                        errorHtml += '<li>' + error + '</li>';
                    });
                }
                errorHtml += '</ul>';
                $('#categoryErrors').html(errorHtml).removeClass('d-none');
            }
        });
    });

    $('#storeModal').on('hidden.bs.modal', function() {
        $('#bannerForm')[0].reset();
        $('#categoryErrors').addClass('d-none');
        $('#categoryId').val('');
        // Clear the thumbnail preview
        $('#thumbnailPreviewImage').addClass('d-none');
        $('#noImageText').removeClass('d-none');
    });

    // Add preview functionality for the thumbnail file input
    $('#thumbnail').on('change', function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#thumbnailPreviewImage').attr('src', e.target.result).removeClass('d-none');
                $('#noImageText').addClass('d-none');
            };
            reader.readAsDataURL(file);
        } else {
            $('#thumbnailPreviewImage').addClass('d-none');
            $('#noImageText').removeClass('d-none');
        }
    });
});

function editCategory(id) {
    $.get(`/admin/banner/${id}`, function(data) {
        $('#modalTitleId').text('Edit Category');
        $('#categoryId').val(data.id);

        // Set the status checkbox based on the current status of the category
        $('#status').prop('checked', data.status); // Ensure the checkbox reflects the current status

        // Set the image preview based on the current thumbnail image
        if (data.img) {
            $('#thumbnailPreviewImage').attr('src', data.img).removeClass('d-none');
            $('#noImageText').addClass('d-none');
        } else {
            $('#thumbnailPreviewImage').addClass('d-none');
            $('#noImageText').removeClass('d-none');
        }
        
        // Open the modal
        $('#storeModal').modal('show');
    });
}

function deleteCategory(id) {
    if (confirm('Are you sure you want to delete this category?')) {
        $.ajax({
            url: `/admin/banner/${id}`,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // Add CSRF token to the header
            },
            success: function(response) {
                $('#bannersTable').DataTable().ajax.reload();
            },
            error: function(xhr) {
                alert('Error deleting category');
            }
        });
    }
}
</script>
@endsection
