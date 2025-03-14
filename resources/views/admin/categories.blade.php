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
            <table class="table table-striped" id="storesTable">
              <thead>
                <tr>
                  <th>Thumbnail</th>
                  <th>Name</th>
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
        <form id="categoryForm" action="" enctype="multipart/form-data">
          @csrf
          <input type="hidden" id="categoryId" name="id">
          
          <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>


      

          <div class="mb-3">
          <label for="thumbnail" class="form-label">Thumbnail</label>
          <!-- Hidden file input field -->
          <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*" style="display: none;" onchange="previewImage()">
          
          <!-- Div for the image preview -->
          <div id="imagePreview" style="margin-top: 10px; cursor: pointer;">
            <p>Click here to select a file.</p> <!-- Optional: Instruction text -->
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
  document.getElementById('imagePreview').addEventListener('click', function() {
    document.getElementById('thumbnail').click();
  });
    var table = $('#storesTable').DataTable({
  responsive: true,
  processing: true,
  serverSide: true,
  stateSave: true,
  ajax: {
    url: "/admin/categoryList",
    type: "GET",
    dataSrc: function(json) {
      console.log(json); // Log the response to check the structure
      return json.categories; // Ensure 'categories' is the key returned by the server
    }
  },
  columns: [
    {
      title: 'Thumbnail',
      data: 'category_img', // Assuming 'category_img' is the key in each category object
      render: function(data, type, row) {
        // Check if 'category_img' is present, and use a fallback if not
        return data ? 
          `<img style="height:40px; width:40px; border-radius:100px" src="{{ url('/') }}/${data}" alt="Category Thumbnail">` : 
          '<span>No Image</span>'; // Return a default if no image is available
      }
    },
    { title: 'Name', data: 'category_name' },
    {
      title: 'Actions',
      data: null,
      render: function(data) {
        return `
          <div class="btn-group" role="group">
              <button type="button" class="btn btn-sm btn-warning" onclick="editCategory(${data?.id})"><i class="bi bi-pencil"></i></button>
              <button type="button" class="btn btn-sm btn-danger" onclick="deleteCategory(${data?.id})"><i class="bi bi-trash"></i></button>
         </div>`;
      }
    }
  ],
  pageLength: 10,
  lengthMenu: [5, 10, 25, 50],
  pagingType: "simple_numbers"
});


  $('#categoryForm').on('submit', function(event) {
    event.preventDefault();
    var id = $('#categoryId').val();
    var url = id ? `/admin/category/${id}` : '/admin/category/store';
    var method = id ? 'PUT' : 'POST';

    $.ajax({
      url: url,
      type: method,
      data: new FormData(this),
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
    $('#categoryForm')[0].reset();
    $('#categoryErrors').addClass('d-none');
    $('#categoryId').val('');
  });
});

function editCategory(id) {
  $.get(`/admin/category/${id}/edit`, function(data) {
    $('#modalTitleId').text('Edit Category');
    $('#categoryId').val(data.id);
    $('#name').val(data?.category?.category_name);
    $('#description').val(data.description);
    $('#parent_id').val(data.parent_id); // Set parent category
    $('#thumbnail').val(''); // Reset file input
    $('#imagePreview').html('');
    $('#imagePreview').append(`<img src='${'http://ea8on.test:8080/'+data?.category?.category_img}' style="max-width: 200px" class="card" />`);
    $('#storeModal').modal('show');
  });
}

function deleteCategory(id) {
  if (confirm('Are you sure you want to delete this category?')) {
    $.ajax({
      url: `/admin/category/${id}`,
      type: 'DELETE',
      success: function(response) {
        $('#storesTable').DataTable().ajax.reload();
      },
      error: function(xhr) {
        alert('Error deleting category');
      }
    });
  }
}
  // Function to preview the image when a file is selected
  function previewImage() {
    const file = document.getElementById('thumbnail').files[0];
    const reader = new FileReader();

    reader.onloadend = function() {
      const preview = document.getElementById('imagePreview');
      preview.innerHTML = ''; // Clear any previous previews
      const img = document.createElement('img');
      img.src = reader.result;
      img.style.maxWidth = '200px'; // Set image size
      img.style.marginTop = '10px';
      preview.appendChild(img);
    };

    if (file) {
      reader.readAsDataURL(file); // Read the file as a data URL
    }
  }

</script>
@endsection