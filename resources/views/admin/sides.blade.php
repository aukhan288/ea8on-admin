@extends('layouts.app')

@section('content')

<section class="section">
  <div class="mb-3">
    <button type="button" class="btn btn-primary btn-sm" onclick="sideDetail(-1, 'create')">
      Add New Side
    </button>
  </div>
  
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card py-5">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="sidesTable">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Image</th>
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

<!-- Side Modal -->
<div class="modal fade" id="sideModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="sideModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sideModalTitle">Side Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="sideForm" action="">
        @csrf
          <div id="sideFormErrors" class="alert alert-danger d-none"></div>
          <input type="hidden" id="sideId" name="id" />
          
          <div class="mb-3">
            <label for="sideName" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="sideName" placeholder="Side Name" required />
          </div>
          
          <div class="mb-3">
            <label for="sidePrice" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" id="sidePrice" placeholder="Price" required />
          </div>

          <!-- Image Upload -->
          <div class="mb-3">
            <label for="sideImage" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" id="sideImage" accept="image/*"/>
          </div>
          
          <!-- Image Preview -->
          <div id="imagePreviewContainer" class="mb-3" style="display: none;">
            <label for="imagePreview" class="form-label">Image Preview</label>
            <img id="imagePreview" src="" alt="Image Preview" style="max-width: 100%; height: auto;"/>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="sideModalSubmit">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    // Initialize DataTable
    var table = $('#sidesTable').DataTable({
        "processing": true,
        "serverSide": false,
        "ajax": {
            url: '/admin/sideList',  
            type: 'GET',
            dataSrc: function(response) {
                return response.data;
            }
        },
        "columns": [
            {
                title: 'Image',
                data: 'image',
                render: function(data) {
                    return data ? `<img src="/storage/${data}" style="height: 40px; width: 40px; border-radius: 50%;">` : 'No Image';
                }
            },
            { 'title': 'Name', 'data': 'name' },
            { 'title': 'Price', 'data': 'price' },
            {
                title: 'Actions',
                data: 'id',
                render: function(data) {
                    return `
                        <button class="btn btn-info btn-sm" onclick="viewSide(${data})">View</button>
                        <button class="btn btn-warning btn-sm" onclick="sideDetail(${data}, 'edit')">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteSide(${data})">Delete</button>
                    `;
                }
            }
        ]
    });

    // Show image preview on file selection
    $('#sideImage').on('change', function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').attr('src', e.target.result);
                $('#imagePreviewContainer').show();
            }
            reader.readAsDataURL(file);
        }
    });
});

// View side details
function viewSide(id) {
    $.ajax({
        url: `/admin/sides/${id}`,
        type: 'GET',
        success: function(data) {
            Swal.fire({
                title: data.name,
                text: `Price: ${data.price}`,
                imageUrl: `/storage/${data.image}`,
                imageAlt: 'Side Image'
            });
        }
    });
}

// Delete side item
function deleteSide(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, keep it'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: `/admin/sides/${id}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#sidesTable').DataTable().ajax.reload();
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Side deleted successfully',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Failed to delete side',
                        showConfirmButton: true
                    });
                }
            });
        }
    });
}

// Modal form for creating or editing a side
function sideDetail(id, action) {
    $('#sideModal').modal('show');
    $('#sideForm')[0].reset();  
    $('#sideFormErrors').addClass('d-none');
    $('#imagePreviewContainer').hide();  
    $('#sideId').val('');  

    if (action === 'create') {
        $('#sideModalTitle').text('Add New Side');
        $('#sideModalSubmit').text('Save');

        // Handle form submission for creating a new side
        $('#sideForm').off('submit').on('submit', function(event) {
            event.preventDefault();
            createSide(); // Call function for creating side
        });
    } else if (action === 'edit') {
        $('#sideModalTitle').text('Edit Side');
        $('#sideModalSubmit').text('Update');

        // Fetch existing side data to edit
        $.ajax({
            url: `/admin/sides/${id}`,
            type: 'GET',
            success: function(data) {
                $('#sideName').val(data.name);
                $('#sidePrice').val(data.price);
                $('#sideId').val(data.id);

                if (data.image) {
                    $('#imagePreviewContainer').show();
                    $('#imagePreview').attr('src', `/storage/${data.image}`);
                } else {
                    $('#imagePreviewContainer').hide();
                }
            }
        });

        // Handle form submission for updating side
        $('#sideForm').off('submit').on('submit', function(event) {
            event.preventDefault();
            updateSide(id); // Call function for updating side
        });
    }
}

// Function for creating side
function createSide() {
    var formData = new FormData($('#sideForm')[0]);

    $.ajax({
        url: '/admin/side-create',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            $('#sidesTable').DataTable().ajax.reload();
            $('#sideModal').modal('hide');
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Side created successfully',
                showConfirmButton: false,
                timer: 1500
            });
        },
        error: function(xhr) {
            var errors = xhr.responseJSON.errors;
            var errorMessages = Object.values(errors).join('<br>');
            $('#sideFormErrors').html(errorMessages).removeClass('d-none');
        }
    });
}

// Function for updating side
function updateSide(id) {
    var formData = new FormData($('#sideForm')[0]);

    $.ajax({
        url: `/admin/sides/${id}`,
        type: 'PUT',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            $('#sidesTable').DataTable().ajax.reload();
            $('#sideModal').modal('hide');
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Side updated successfully',
                showConfirmButton: false,
                timer: 1500
            });
        },
        error: function(xhr) {
            var errors = xhr.responseJSON.errors;
            var errorMessages = Object.values(errors).join('<br>');
            $('#sideFormErrors').html(errorMessages).removeClass('d-none');
        }
    });
}
</script>

@endsection
