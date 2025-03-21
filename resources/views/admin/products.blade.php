@extends('layouts.app')

@section('content')
<style>
    .select2-img {
    width: 30px;
    height: 30px;
    border-radius: 5px;
    margin-right: 5px;
}

.select2-img-selected {
    width: 20px;
    height: 20px;
    border-radius: 3px;
    margin-right: 3px;
}
</style>
<div class="d-flex justify-content-between mb-3">
    <button class="btn btn-primary btn-sm" onclick="productDetail(-1,'create')">Add New</button>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="productsTable">
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
<div class="modal fade" id="productModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="min-height: 80vh !important;">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="productForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                            <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label for="price" class="form-label">Sandwich Price</label>
                                <input type="number" step="any" class="form-control" id="sandwich_price" name="sandwich_price" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                        <div class="mb-3">
                                <label for="discount" class="form-label">Meal Price</label>
                                <input type="number" step="any" class="form-control" id="meal_price" name="meal_price" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" id="category" name="category_id">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2 d-flex align-items-center">
                         <div class="">
                         <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="has_sides"
                                        name="has_sides">
                                    <label class="form-check-label ms-2" for="has_sides">
                                        Add sides
                                    </label>
                                </div>
                         </div>
                        </div>           
                    </div>
                    <div class="row" id="sidesRow" style="display:none">
                    <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="sides" class="form-label">Sides</label>
                                <select class="form-select" id="sides" name="sides[]">
                                </select>
                            </div>
                        </div> 
                        <div class="col-sm-3">
                        <div class="mb-3"  id="number_of_free_sides">
                             <label for="img_1" class="form-label">Free Sides</label>
                             <input type="number" class="form-control" id="free_sides" name="number_of_free_sides" 
                                placeholder="Free Sides">
                         </div>
                        </div>
                    </div>

                   
                   
                 
                    <div class="row">
                        <div class="col-sm-4 ">
                         <div class="mb-3">
                             <label for="main_img" class="form-label">Product Image</label>
                             <input type="file" class="form-control" name="main_img[]" value=""
                                placeholder="Chose Image" required>
                         </div>
                         <div id="imagePreviewContainer" class="mb-3" style="display: none;">
                            <img id="imagePreview" src="" alt="Image Preview" style="width: 100%; height: 200px;" />
                        </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                             <label for="img_1" class="form-label">Slider One</label>
                             <input type="file" class="form-control" name="img_1[]" value=""
                                placeholder="Chose Image" required>
                         </div>
                        </div>
                        <div class="col-sm-4">
                         <div class="mb-3">
                             <label for="img_2" class="form-label">Slider Two</label>
                             <input type="file" class="form-control" name="img_2[]" value=""
                                placeholder="Chose Image" required>
                         </div>
                        </div>
                        <div class="col-sm-4">
                        <div class="mb-3">
                             <label for="img_3" class="form-label">Slider Three</label>
                             <input type="file" class="form-control" name="img_3[]" value=""
                                placeholder="Chose Image" required>
                         </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="stock"
                                        name="stock" checked>
                                    <label class="form-check-label" for="stock">
                                        Stock
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="send_notification"
                                        name="send_notification">
                                    <label class="form-check-label" for="send_notification">
                                        Send Notification
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="deal_of_the_day"
                                        name="deal_of_the_day">
                                    <label class="form-check-label" for="deal_of_the_day">
                                        Deal of the Day
                                    </label>
                                </div>
                            </div>
                        </div>
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
<!-- View Modal -->
<div class="modal fade" id="viewProductModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
        <div class="modal-content" style="min-height: 80vh !important;">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="row">
                    <div class="col-sm-6">
                       <p><strong>Name:</strong> <span id="productName"></span></p>
                       <p><strong>Status:</strong> <span id="productStatus"></span></p>
                       <p><strong>Sandwich Price: </strong> <span id="sandwichPrice"></span></p>
                       <p><strong>Meal Price: </strong> <span id="mealPrice"></span></p>
                       <p><strong>Category: </strong> <span id="productCategory"></span></p>
                    </div>
                    <div class="col-sm-6">
                        <span id="productImage">

                        </span>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                        <div id="demo" class="carousel slide" data-bs-ride="carousel">

                        <!-- Indicators/dots -->
                        <div class="carousel-indicators">
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                        </div>

                        <!-- The slideshow/carousel -->
                        <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img id="img1" src="" alt="Los Angeles" class="d-block" style="width:100%; height: 200px;">
                        </div>
                        <div class="carousel-item">
                            <img id="img2" src="" alt="Chicago" class="d-block" style="width:100%; height: 200px;">
                        </div>
                        <div class="carousel-item">
                            <img id="img3" src="" alt="New York" class="d-block" style="width:100%; height: 200px;">
                        </div>
                        </div>

                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Reset form modal on hide
    $('#productModal').on('hidden.bs.modal', function() {
        $('#productForm')[0].reset();
        $('#categoryErrors').addClass('d-none');
        $('#productId').val('');
    });

    // Initialize DataTable
    var table = $('#productsTable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        stateSave: true,
        ajax: {
            url: "/admin/productList",
            type: "GET",
            dataSrc: function(json) {
                return json.products;
            }
        },
        columns: [{
            title: 'Thumbnail',
            data: 'main_img',
            render: function(data) {
                return data ? `<img style="height:40px" src="{{ url('/') }}/storage/${data}" />` : '';
            }
        }, {
            title: 'Name',
            data: 'product_name',
            render: function(data) {
                return `<span class="text-dark">${data}</span>`;
            }
        }, 
        {
            title: 'Sandwich Price',
            data: 'sandwich_price',
            render: function(data) {
                return data ? `<span class="badge bg-warning">₱${data}</span>` : '';
            }
        }, 
        {
            title: 'Meal Price',
            data: 'meal_price',
            render: function(data) {
                return data ? `<span class="badge bg-primary">₱${data}</span>` : '';
            }
        }, 
        {
            title: 'Action',
            data: 'id',
            render: function(data, type, row) {
                return `<button class="btn btn-sm btn-primary " onclick="viewProduct(${data}, 'edit')"><i class="bi bi-eye text-white"></i></button>
                        <button class="btn btn-sm btn-success " onclick="productDetail(${data}, 'edit')"><i class="bi bi-pencil text-white"></i></button>
                        <button class="btn btn-sm btn-danger" onclick="deleteProduct(${data})"> <i class="bi bi-trash"></i> </button>`;
            }
        }]
    });

    $('#sides').select2({
    placeholder: 'Choose Sides',
    dropdownParent: $('#productModal'),
    width: '100%',
    multiple: true,
    allowClear: true,
    ajax: {
        url: '/admin/sideList',  // The route to fetch data
        dataType: 'json',
        delay: 250, // Delay for better performance
        data: function (params) {
            return {
                search: params.term // Search query
            };
        },
        processResults: function (data) {
            console.log('Fetched Data:', data);
            
            return {
                results: $.map(data?.data, function (item) {
                    return {
                        id: item?.id,
                        text: item?.name,  // Main text
                        image: '/storage/'+item?.image // Image URL from API
                    };
                })
            };
        },
        cache: true
    },
    templateResult: function (item) {
        if (!item.id) {
            return item.text; // Show only text for placeholder
        }
        
        var img = item.image ? `<img src="${item.image}" class="select2-img" />` : '';
        return $(`<span>${img} ${item.text}</span>`);
    },
    templateSelection: function (item) {
        var img = item.image ? `<img src="${item.image}" class="select2-img-selected" />` : '';
        return $(`<span>${img} ${item.text}</span>`);
    }
});

$('#category').select2({
    placeholder: 'Choose Category',
    dropdownParent: $('#productModal'), // Ensures proper dropdown behavior inside modal
    width: '100%',
    allowClear: true,
    ajax: {
        url: '/admin/categoryList',  // The route to fetch categories
        dataType: 'json',
        delay: 250, // Delay for better performance
        data: function (params) {
            return {
                search: params.term // Search query for filtering
            };
        },
        processResults: function (data) {
            console.log('Fetched Categories:', data);
            
            return {
                results: $.map(data?.categories, function (item) {
                    return {
                        id: item?.id,
                        text: item?.category_name, // Category name from the database
                        image: '/storage/' + item?.category_img // Category image URL (optional)
                    };
                })
            };
        },
        cache: true
    },
    templateResult: function (item) {
        if (!item.id) {
            return item.text; // Show only text for placeholder
        }

        var img = item.image ? `<img src="${item.image}" class="select2-img" />` : '';
        return $(`<span>${img} ${item.text}</span>`);
    },
    templateSelection: function (item) {
        var img = item.image ? `<img src="${item.image}" class="select2-img-selected" />` : '';
        return $(`<span>${img} ${item.text}</span>`);
    }
});

});

$('#has_sides').on('change', function() {
    if ($(this).prop('checked')) {  // Check if the checkbox is checked
        $('#sidesRow').show();  // Show the element if checked number has_sides
    } else {
        $('#sidesRow').hide();  // Hide the element if unchecked
    }
});


// category_id
// deal_of_the_day
// description
// id
// img_1
// img_2
// img_3
// main_img
// meal_price
// product_name
// sandwich_price
// send_notification
// status
// stock

function productDetail(id, action) {
    $('#productModal').modal('show');
    $('#name').val('');
    $('#sandwich_price').val(0);
    $('#meal_price').val(0);
    $('#description').val('');
    $('#stock').prop('checked',true);
    $('#has_sides').prop('checked',false);
    $('#send_notification').prop('checked',true);
    $('#deal_of_the_day').prop('checked',true);

    if (action === 'edit') {
        $.ajax({
            url: `/admin/product/${id}`,
            type: 'GET',
            success: function(response) {
                let product = response?.data;

                $('#name').val(product?.product_name);
                $('#sandwich_price').val(product?.sandwich_price);
                $('#meal_price').val(product?.meal_price);
                $('#description').val(product?.description);
                $('#stock').prop('checked',product?.stock);
                $('#send_notification').prop('checked',product?.send_notification);
                $('#deal_of_the_day').prop('checked',product?.deal_of_the_day);
                $('#has_sides').prop('checked',product?.has_sides);
                
                if (product?.has_sides) {
                    $('#has_sides').prop('checked', true);
                    $('#sidesRow').slideDown(); // Smoothly show the row
                    $('#free_sides').val(product?.number_of_free_sides ?? 0); 
                } else {
                    $('#has_sides').prop('checked', false);
                    $('#sidesRow').slideUp(); // Smoothly hide the row
                    $('#free_sides').val(''); // Clear the input field
                }

                if (product?.category_id) {
    $.ajax({
        url: '/admin/categoryList', // API Endpoint
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log('Fetched Categories:', response); 

            let categoryList = response?.categories?.map(item => ({
                id: item.id,
                text: item.category_name,
                image: '/storage/' + item?.category_img // Image URL
            })) || [];

            // Initialize Select2 with custom template for images
            $('#category').select2({
                placeholder: 'Choose Category',
                dropdownParent: $('#productModal'),
                width: '100%',
                allowClear: true,
                data: categoryList,
                templateResult: function(item) {
                    if (!item.id) {
                        return item.text; // Show only text for placeholder
                    }

                    var img = item.image ? `<img src="${item.image}" class="select2-img" style="width: 30px; height: 30px; margin-right: 10px; border-radius: 50%;" />` : '';
                    return $(`<span>${img} ${item.text}</span>`);
                },
                templateSelection: function(item) {
                    var img = item.image ? `<img src="${item.image}" class="select2-img-selected" style="width: 20px; height: 20px; margin-right: 5px; border-radius: 50%;" />` : '';
                    return $(`<span>${img} ${item.text}</span>`);
                }
            });

            // Set selected category (if applicable)
            $('#category').val(product.category_id).trigger('change.select2');
        },
        error: function(xhr) {
            console.error('Error fetching categories:', xhr.responseText);
        }
    });
}

            },
            error: function(xhr) {
                console.error('Error fetching product details:', xhr.responseText);
            }
        });
    }
}

$('#productForm').submit(function (e) {
        e.preventDefault();

        let id = $('#productId').val();
        let formData = new FormData(this);
        let url = id ? `/admin/product/${id}` : `/admin/product-create`;

        // Reset validation messages
        $('.form-control').removeClass('is-invalid is-valid');
        $('.invalid-feedback').remove();

        // Append CSRF token
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        if (id) {
            formData.append('_method', 'PUT');
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#productModal').modal('hide');
                location.reload(); // Reload data dynamically if needed
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;

                    $.each(errors, function (key, messages) {
                        let inputField = $('[name="' + key + '"]');
                        inputField.addClass('is-invalid');
                        inputField.after(`<div class="invalid-feedback">${messages[0]}</div>`);
                    });
                } else {
                    console.error(xhr.responseText);
                }
            }
        });
    });




    function deleteProduct(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        
        if (result.value) {
            $.ajax({
                url: `/admin/product/${id}`,
                type: "DELETE",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content")
                },
                success: function (response) {
                    $('#productsTable').DataTable().ajax.reload(null, false);
                    Swal.fire({
                        title: "Deleted!",
                        text: "Product has been deleted.",
                        icon: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });
                    
                    // Remove product row dynamically
                    $(`#productRow-${id}`).fadeOut(500, function () {
                        $(this).remove();
                    });
                },
                error: function (xhr) {
                    Swal.fire({
                        title: "Error!",
                        text: "Something went wrong.",
                        icon: "error"
                    });
                    console.error(xhr.responseText);
                }
            });
        }
    });
}

function viewProduct(id){
    $('#viewProductModal').modal('show');

    $.ajax({
            url: `/admin/product/${id}`,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response); // Log response to see the data
                $('#productName').text(response?.data?.product_name);
                $('#productStatus').html(`${response?.data?.status?'Active <i class="bi bi-check-circle-fill text-success"></i>':'In-Active <i class="bi bi-x-circle-fill text-danger"></i>'}`);
                $('#sandwichPrice').text(response?.data?.sandwich_price);
                $('#mealPrice').text(response?.data?.meal_price);
                $('#productImage').html(`<img class="card" src='{{url('/')}}/storage/${response?.data?.main_img}' style="hieght:100px; width:100px" />`);
                $('#productCategory').html(response?.data?.category?.category_name);
                $('#img1').attr('src', `{{url('/')}}/storage/${response?.data?.img_1}`);
                $('#img2').attr('src', `{{url('/')}}/storage/${response?.data?.img_2}`);
                $('#img3').attr('src', `{{url('/')}}/storage/${response?.data?.img_3}`);

            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Error fetching product!");
            }
        });
}

</script>


@endsection