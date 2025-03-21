@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <button class="btn btn-primary btn-sm" onclick="categoryDetail(-1, 'create')">Add New</button>

</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-sm table-bordered" id="categoriesTable">
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Store Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitleId">Add New Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="categoryForm" action="" enctype="multipart/form-data">
          @csrf
          <input type="hidden" id="categoryId" name="id">
          
          <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Category Name">
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" placeholder="Enter description..." style="max-height: 75px; resize: none;"></textarea>
          </div>
          
          <div class="row">
            <div class="col-sm-4 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="status" name="status">
                <label class="form-check-label" for="status">Active</label>
              </div> 
            </div>

       
          </div>
          
        <!-- Category Image Upload (single image) -->
        <!-- Category Image Input and Preview -->
<div class="mb-3">
  <label for="category_img" class="form-label">Category Image</label>
  <input type="file" class="form-control" id="category_img" name="category_img" accept="image/*" onchange="previewImage('category_img')">
  <div id="category_img_preview" style="margin-top: 10px; cursor: pointer;">
    <p>Click here to select a file.</p>
  </div>
</div>

<!-- Additional Image Inputs and Previews -->
<div class="row mb-3">
  <div class="col-4">
    <label for="category_img_1" class="form-label">Image 1</label>
    <input type="file" class="form-control" id="category_img_1" name="category_img_1" accept="image/*" onchange="previewImage('category_img_1')">
    <div id="category_img_1_preview" style="margin-top: 10px;"></div>
  </div>
  <div class="col-4">
    <label for="category_img_2" class="form-label">Image 2</label>
    <input type="file" class="form-control" id="category_img_2" name="category_img_2" accept="image/*" onchange="previewImage('category_img_2')">
    <div id="category_img_2_preview" style="margin-top: 10px;"></div>
  </div>
  <div class="col-4">
    <label for="category_img_3" class="form-label">Image 3</label>
    <input type="file" class="form-control" id="category_img_3" name="category_img_3" accept="image/*" onchange="previewImage('category_img_3')">
    <div id="category_img_3_preview" style="margin-top: 10px;"></div>
  </div>
</div>



  

          
          
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
  var table = $('#categoriesTable').DataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    stateSave: true,
    ajax: {
        url: "/admin/categories-list", 
        type: "GET",
        data: function(d) {
            d.search = d.search.value;  // Send search value
            d.start = d.start;  // Pagination start index
            d.length = d.length;  // Number of records per page
            d.order = d.order[0];  // Sorting column info
        },
        dataSrc: function(json) {
            console.log(json); 
            return json.data; // Ensure 'data' matches server response
        }
    },
    columns: [
        {
            title: 'Thumbnail',
            data: 'category_img',
            render: function(data) {
                return data 
                    ? `<img style="height:40px; width:40px; border-radius:100px" src="/storage/${data}" alt="Category Thumbnail">`
                    : '<span>No Image</span>';
            }
        },
        { title: 'Name', data: 'category_name' },
        {
            title: 'Status',
            data: 'status',
            render: (data) => 
                data == 1 
                ? `<i class="bi bi-check-circle-fill text-success" title="Active"></i>` 
                : `<i class="bi bi-x-circle-fill text-danger" title="Inactive"></i>`
        },
        {
            title: 'Actions',
            data: null,
            render: function(data) {
                return `
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-sm btn-warning" onclick="categoryDetail(${data.id}, 'edit')"><i class="bi bi-pencil"></i></button>
                        <button type="button" class="btn btn-sm btn-danger" onclick="deleteCategory(${data.id})"><i class="bi bi-trash"></i></button>
                    </div>`;
            }
        }
    ],
    pageLength: 10,
    lengthMenu: [5, 10, 25, 50],
    pagingType: "simple_numbers",
    order: [[1, 'asc']],
});


})
$('#categoryForm').submit(function (e) {
    e.preventDefault();
    let id = $('#categoryId').val(); // Get the category ID (if it's an update)
    let formData = new FormData(this); // Prepare form data, including images

    // Dynamically set the URL based on edit or create
    var url = id ? `/admin/category/${id}` : '/admin/category/store'; 
    var method = 'POST'; // Always use POST to ensure FormData works correctly

    if (id) {
        formData.append('_method', 'PUT'); // Laravel will interpret this as a PUT request
    }

    // Reset previous validation states
    $('.form-control').removeClass('is-invalid is-valid');
    $('.invalid-feedback').remove();

    // Get CSRF token
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: url,
        type: method, // Always use POST
        data: formData,
        processData: false,  // Don't process FormData
        contentType: false,  // Let the browser set content type
        headers: {
            'X-CSRF-TOKEN': csrfToken  // CSRF token in header
        },
        success: function (response) {
            $('#categoryModal').modal('hide'); // Hide modal on success
            $('#categoriesTable').DataTable().ajax.reload(); // Reload table dynamically
            
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                // Handle Laravel validation errors
                let errors = xhr.responseJSON.errors;
                $.each(errors, function (key, messages) {
                    let inputField = $('[name="' + key + '"]');
                    inputField.addClass('is-invalid');
                    inputField.after(`<div class="invalid-feedback">${messages[0]}</div>`);
                });
            } else {
                console.error(xhr.responseText); // Log any other errors
            }
        }
    });
});


function categoryDetail(id, action) {
    $('#categoryModal').modal('show');
    $('#categoryId').val('');
    $('#name').val('');
    $('#description').val('');
    $('#status').prop('checked', false);
    $('#category_img').val('');
    $('#category_img_1').val('');
    $('#category_img_2').val('');
    $('#category_img_3').val('');

    if (action === 'edit') {
        $.ajax({
            url: `/admin/category/${id}/edit`,
            type: 'GET',
            success: function(data) {
                console.log(data);
                // Assuming the data contains category details in the 'category' property
                $('#categoryId').val(data?.category?.id);
                $('#name').val(data?.category?.category_name);
                $('#description').val(data?.category?.description);
                $('#status').prop('checked', data?.category?.status);
                // Optionally, you can populate the images if necessary
                // $('#category_img').val(data.category.category_img); // if you need to display images
            },
            error: function(xhr) {
                console.error('Failed to fetch category details:', xhr.responseText);
            }
        });
    }
}


function previewImage(inputId) {
    var inputElement = $('#' + inputId);
    if (!inputElement[0].files.length) {
        $('#' + inputId + '_preview').html('<p>No image selected</p>');
        return;
    }

    // Clear previous previews
    $('#' + inputId + '_preview').html('');
    $.each(inputElement[0].files, function(index, file) {
        var reader = new FileReader();
        reader.onloadend = function() {
            var img = $('<img>', {
                src: reader.result,
                style: 'max-width: 200px; margin-top: 10px; margin-right: 10px;',
                class: 'card'
            });
            $('#' + inputId + '_preview').append(img);
        };
        reader.readAsDataURL(file);
    });
}
function deleteCategory(id) {
    if (confirm('Are you sure you want to delete this category?')) {
        $.ajax({
            url: `/admin/category/${id}`,
            type: 'DELETE',
            success: function(response) {
                $('#storesTable').DataTable().ajax.reload(); // Reload the table dynamically
            },
            error: function(xhr) {
                alert('Error deleting category');
            }
        });
    }
}


</script>
@endsection