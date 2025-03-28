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
            <table class="table table-striped table-sm table-bordered" id="sidesTable">
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Side Modal -->
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
          <input type="hidden" id="sideId" name="id" />

          <!-- Name -->
          <div class="mb-3">
            <label for="sideName" class="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="name" id="sideName" placeholder="Side Name" />
          </div>

          <!-- Price -->
          <div class="mb-3">
            <label for="sidePrice" class="form-label">Price <span class="text-danger">*</span></label>
            <input type="number" step="any" class="form-control" name="price" id="sidePrice" placeholder="Price" />
          </div>

          <!-- Status Checkbox -->
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="sideStatus" name="status">
            <label class="form-check-label" for="sideStatus">Active</label>
          </div>

          <!-- Description (Max 3 lines) -->
          <div class="mb-3">
            <label for="sideDescription" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="sideDescription" placeholder="Enter description..." style="max-height: 75px; resize: none;"></textarea>
          </div>

          <!-- Image Upload -->
          <div class="mb-3">
            <label for="sideImage" class="form-label">Image <span class="text-danger">*</span></label>
            <input type="file" class="form-control" name="image" id="sideImage" accept="image/*" />
          </div>

          <!-- Image Preview -->
          <div id="imagePreviewContainer" class="mb-3" style="display: none;">
            <img id="imagePreview" src="" alt="Image Preview" style="width: 100%; height: 200px;" />
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
                    return data ? `<img src="${data}" style="height: 40px; width: 40px; border-radius: 50%;">` : 'No Image';
                }
            },
            { 'title': 'Name', 'data': 'name' },
            { 'title': 'Price', 'data': 'price' },
            {
                'title': 'Status',
                'data': 'status',
                render: (data) => 
                    data == 1 
                    ? `<i class="bi bi-check-circle-fill text-success" title="Active"></i>` 
                    : `<i class="bi bi-x-circle-fill text-danger" title="Inactive"></i>`
            },

            {
                title: 'Actions',
                data: 'id',
                render: function(data) {
                    return `
                        <button class="btn btn-info btn-sm" onclick="viewSide(${data})"><i class="bi bi-eye text-white"></i></button>
                        <button class="btn btn-warning btn-sm" onclick="sideDetail(${data}, 'edit')"><i class="bi bi-pencil text-white"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="deleteSide(${data})"><i class="bi bi-trash text-white"></i></button>
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
            let statusIcon = data.status == 1 
                ? `<i class="bi bi-check-circle-fill text-success"></i> Active` 
                : `<i class="bi bi-x-circle-fill text-danger"></i> Inactive`;

            let description = data.description ? data.description : "No description available";

            Swal.fire({
                title: `<p style="text-align:left">${data.name}</p>`, 
                html: `
                    <p style="text-align:left"><strong>Price:</strong> ${data.price}</p>
                    <p style="text-align:left"><strong>Status:</strong> ${statusIcon}</p>
                    <p style="text-align:left"><strong>Description:</strong> ${description}</p>
                    <img src="/storage/${data.image}" alt="Side Image" style="width: 100%; height: 200px; margin-top: 10px;">
                `,
                showCloseButton: true
            });
        }
    });
}


// Delete side item



// Modal form for creating or editing a side
function sideDetail(id, action) {
    $('#imagePreviewContainer').hide();  
    $('#sideId').val('');
    $('#sideName').val('');
    $('#sidePrice').val('');
    $('#sideDescription').val(''); 
    $('#sideModal').modal('show');  
   if(action === 'edit'){
    $.ajax({
            url: `/admin/sides/${id}`,
            type: 'GET',
            success: function(data) {
                $('#sideName').val(data?.name);
                $('#sidePrice').val(data?.price);
                $('#sideDescription').val(data?.description); 
                $('#sideStatus').prop('checked', data?.status == 1);
                $('#sideId').val(id);
                $('#sideModal').modal('show');
                if (data?.image) {
                    $('#imagePreviewContainer').show();
                    $('#imagePreview').attr('src', `/storage/${data.image}`);
                } else {
                    $('#imagePreviewContainer').hide();
                }
            }
        });
   }
}
$('#sideForm').submit(function (e) {
    e.preventDefault();

    let id = $('#sideId').val();
    let formData = new FormData(this);
    let url = id ? `/admin/sides/${id}` : `/admin/side-create`;

    // Reset previous validation states
    $('.form-control').removeClass('is-invalid is-valid'); // Remove previous validation classes
    $('.invalid-feedback').remove();

    // Append CSRF token
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    if (id) {
        formData.append('_method', 'PUT');
    }

    $.ajax({
        url: url,
        type: 'POST', // Always use POST, Laravel will handle method override
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            $('#sideModal').modal('hide');
            location.reload(); // Reload the page or update UI dynamically
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;

                // Loop through validation errors
                $.each(errors, function (key, messages) {
                    let inputField = $('[name="' + key + '"]');
                    inputField.addClass('is-invalid'); // Add error class

                    // Add Bootstrap error message
                    inputField.after(
                        `<div class="invalid-feedback">${messages[0]}</div>`
                    );
                });

                $.each(errors, function (key, messages) {
                    $('#sideFormErrors').append(`<p>${messages[0]}</p>`);
                });
            } else {
                console.error(xhr.responseText);
            }
        }
    });
});

// Add "is-valid" class when user fixes input
$('.form-control').on('input', function () {
    if ($(this).hasClass('is-invalid')) {
        $(this).removeClass('is-invalid')
    }
});




</script>

@endsection
