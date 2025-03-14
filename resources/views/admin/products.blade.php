@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#productModal"
        data-action="create">Add New</button>
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
                  
                    

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="productDetail-tab" data-bs-toggle="tab"
                                data-bs-target="#productDetail" type="button" role="tab" aria-controls="productDetail"
                                aria-selected="true">Product Detail</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="productDetail" role="tabpanel"
                            aria-labelledby="productDetail-tab">
                            <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                        <div class="mb-3">
                                <label for="discount" class="form-label">Discount</label>
                                <input type="text" class="form-control" id="discount" name="discount" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" id="category" name="category_id" required>
                                    <option value="" selected>Choose Category</option>
                                    @foreach ($categories as $category )
                                    <option value="{{ $category?->id }}">{{ $category?->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="sub_category" class="form-label">Sub Category</label>
                                <select class="form-select" id="sub_category" name="sub_category_id">
                                    <option value="" selected>Choose Sub Category</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="unit" class="form-label">Unit <small>(Gms, kg, ltr, ml, pcs)</small></label>
                                <input type="text" class="form-control" id="unit" name="unit" required>
                            </div>
                        </div>
                    </div>

                   

                 
                    <div class="row">
                        <div class="col-sm-3">
                         <div class="mb-3">
                             <label for="main_img" class="form-label">Product Image</label>
                             <input type="file" class="form-control" name="main_img[]" value=""
                                placeholder="Chose Image" required>
                         </div>
                        </div>
                        <div class="col-sm-3">
                        <div class="mb-3">
                             <label for="img_1" class="form-label">Slider One</label>
                             <input type="file" class="form-control" name="img_1[]" value=""
                                placeholder="Chose Image" required>
                         </div>
                        </div>
                        <div class="col-sm-3">
                         <div class="mb-3">
                             <label for="img_2" class="form-label">Slider Two</label>
                             <input type="file" class="form-control" name="imag_2[]" value=""
                                placeholder="Chose Image" required>
                         </div>
                        </div>
                        <div class="col-sm-3">
                        <div class="mb-3">
                             <label for="img_3" class="form-label">Slider Three</label>
                             <input type="file" class="form-control" name="img_3[]" value=""
                                placeholder="Chose Image" required>
                         </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                         <div class="mb-3">
                         <div class="form-check d-flex">
                                    <input class="form-check-input" type="checkbox" value="1" id="sidesInToGoWith"
                                        name="sidesInToGoWith">
                                    <label class="form-check-label ms-2" for="sidesInToGoWith">
                                        Add sides in To Go With
                                    </label>
                                </div>
                         </div>
                        </div>
                        <div class="col-sm-3">
                        <div class="mb-3" style="display:none" id="numberSidesInToGoWith">
                             <label for="img_1" class="form-label">Number of Sides</label>
                             <input type="number" class="form-control" name="numberSidesInToGoWith[]" value=""
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
                                    <input class="form-check-input" type="checkbox" value="1" id="out_of_stock"
                                        name="out_of_stock">
                                    <label class="form-check-label" for="out_of_stock">
                                        Out Of Stock
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
                                    <input class="form-check-input" type="checkbox" value="1" id="publish"
                                        name="publish">
                                    <label class="form-check-label" for="publish">
                                        Publish
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
    // Add ingredient row
    // $('#add-ingredient').on('click', function() {
    //     const ingredientRow = `
    //         <div class="ingredient-row mb-3 row">
    //            <div class="col-sm-3">
    //                <div class="mb-3">
    //                    <label for="ingredient_image" class="form-label">Image</label>
    //                    <input type="file" class="form-control" name="ingredient_image[]" required>
    //                </div>
    //            </div>
    //            <div class="col-sm-2">
    //                <div class="mb-3">
    //                    <label for="ingredient_name" class="form-label">Name</label>
    //                    <input type="text" class="form-control" name="ingredient_name[]" placeholder="Name" required>
    //                </div>
    //            </div>
    //            <div class="col-sm-2">
    //                <div class="mb-3">
    //                    <label for="ingredient_price" class="form-label">Price</label>
    //                    <input type="number" class="form-control" name="ingredient_price[]" placeholder="0.00" required>
    //                </div>
    //            </div>
    //            <div class="col-sm-1">
    //                <div class="mb-3">
    //                    <label for="ingredient_unit" class="form-label">Unit</label>
    //                    <input type="text" class="form-control" name="ingredient_unit[]" required>
    //                </div>
    //            </div>
    //            <div class="col-sm-2">
    //                <button type="button" class="btn btn-danger remove-ingredient" style="margin-top: 28px;">
    //                    <i class="bi bi-trash"></i>
    //                </button>
    //            </div>
    //         </div>
    //     `;
    //     $('#ingredients-list').append(ingredientRow);
    // });

    // // Remove ingredient row
    // $('#ingredients-list').on('click', '.remove-ingredient', function() {
    //     $(this).closest('.ingredient-row').remove();
    // });

    // // Add side row
    // $('#add-side').on('click', function() {
    //     const sideRow = `
    //         <div class="side-row mb-3 row">
    //             <div class="col-sm-3">
    //                 <div class="mb-3">
    //                     <label for="side_image" class="form-label">Image</label>
    //                     <input type="file" class="form-control" name="side_image[]" required>
    //                 </div>
    //             </div>
    //             <div class="col-sm-2">
    //                 <div class="mb-3">
    //                     <label for="side_name" class="form-label">Name</label>
    //                     <input type="text" class="form-control" name="side_name[]" placeholder="Name" required>
    //                 </div>
    //             </div>
    //             <div class="col-sm-2">
    //                 <div class="mb-3">
    //                     <label for="side_price" class="form-label">Price</label>
    //                     <input type="number" class="form-control" name="side_price[]" placeholder="0.00" required>
    //                 </div>
    //             </div>
    //             <div class="col-sm-1">
    //                 <div class="mb-3">
    //                     <label for="side_unit" class="form-label">Unit</label>
    //                     <input type="text" class="form-control" name="side_unit[]" required>
    //                 </div>
    //             </div>
    //             <div class="col-sm-2">
    //                 <button type="button" class="btn btn-danger remove-side" style="margin-top: 28px;">
    //                     <i class="bi bi-trash"></i>
    //                 </button>
    //             </div>
    //         </div>
    //     `;
    //     $('#sides-list').append(sideRow);
    // });

    // // Remove side row
    // $(document).on('click', '.remove-side', function() {
    //     $(this).closest('.side-row').remove();
    // });

    // // Add size row
    // $('#add-size').on('click', function() {
    //     const sizeRow = `
    //         <div class="size-row mb-3 row">
    //             <div class="col-sm-2">
    //                 <div class="mb-3">
    //                     <label for="size_name" class="form-label">Name</label>
    //                     <input type="text" class="form-control size_name" name="size_name[]" placeholder="Name" required>
    //                 </div>
    //             </div>
    //             <div class="col-sm-2">
    //                 <div class="mb-3">
    //                     <label for="size_price" class="form-label">Price</label>
    //                     <input type="number" class="form-control size_price" name="size_price[]" placeholder="0.00" required>
    //                 </div>
    //             </div>
    //             <div class="col-sm-3">
    //                 <button type="button" class="btn btn-danger remove-size" style="margin-top: 28px;">
    //                     <i class="bi bi-trash"></i>
    //                 </button>
    //             </div>
    //         </div>
    //     `;
    //     $('#sizes-list').append(sizeRow);
    // });

    // // Remove size row
    // $(document).on('click', '.remove-size', function() {
    //     $(this).closest('.size-row').remove();
    // });

    // // Add flavour row
    // $('#add-flavour').on('click', function() {
    //     const flavourRow = `
    //         <div class="flavour-row mb-3 row">
    //             <div class="col-sm-2">
    //                 <div class="mb-3">
    //                     <label for="flavour_name" class="form-label">Name</label>
    //                     <input type="text" class="form-control" name="flavour_name[]" placeholder="Name" required>
    //                 </div>
    //             </div>
    //             <div class="col-sm-2">
    //                 <div class="mb-3">
    //                     <label for="flavour_price" class="form-label">Price</label>
    //                     <input type="number" class="form-control" name="flavour_price[]" placeholder="0.00" required>
    //                 </div>
    //             </div>
    //             <div class="col-sm-3">
    //                 <button type="button" class="btn btn-danger remove-flavour" style="margin-top: 28px;">
    //                     <i class="bi bi-trash"></i>
    //                 </button>
    //             </div>
    //         </div>
    //     `;
    //     $('#flavours-list').append(flavourRow);
    // });

    // // Remove flavour row
    // $(document).on('click', '.remove-flavour', function() {
    //     $(this).closest('.flavour-row').remove();
    // });

    // Handle form submission
    $('#productForm').on('submit', function(event) {
        event.preventDefault();

        // Prepare dynamic data (sizes, flavours, sides, ingredients)
        var sizeData = [];
        $('#sizes-list .size-row').each(function() {
            var sizeName = $(this).find('.size_name').val();
            var sizePrice = $(this).find('.size_price').val();
            sizeData.push({ name: sizeName, price: sizePrice });
        });

        var ingredientData = [];
        $('#ingredients-list .ingredient-row').each(function() {
            var ingredientName = $(this).find('input[name="ingredient_name[]"]').val();
            var ingredientPrice = $(this).find('input[name="ingredient_price[]"]').val();
            var ingredientImage = $(this).find('input[name="ingredient_image[]"]')[0].files[0];
            var ingredientUnit = $(this).find('input[name="ingredient_unit[]"]').val();
            ingredientData.push({
                name: ingredientName,
                price: ingredientPrice,
                image: ingredientImage,
                unit: ingredientUnit
            });
        });

        var sideData = [];
        $('#sides-list .side-row').each(function() {
            console.log('##################',this);
            
            var sideName = $(this).find('input[name="side_name[]"]').val();
            var sidePrice = $(this).find('input[name="side_price[]"]').val();
            var sideImage = $(this).find('input[name="side_image[]"]')[0].files[0];
            var sideUnit = $(this).find('input[name="side_unit[]"]').val();
            sideData.push({
                name: sideName,
                price: sidePrice,
                image: sideImage,
                unit: sideUnit
            });
        });
        var toGoWithData = [];
        $('#toGoWith-list .toGoWith-row').each(function() {
            console.log('##################',this);
            
            var toGoWithName = $(this).find('input[name="toGoWith_name[]"]').val();
            var toGoWithPrice = $(this).find('input[name="toGoWith_price[]"]').val();
            var toGoWithImage = $(this).find('input[name="toGoWith_image[]"]')[0].files[0];
            var toGoWithUnit = $(this).find('input[name="toGoWith_unit[]"]').val();
            sideData.push({
                name: toGoWithName,
                price: toGoWithPrice,
                image: toGoWithImage,
                unit: toGoWithUnit
            });
        });

        var flavourData = [];
        $('#flavours-list .flavour-row').each(function() {
            var flavourName = $(this).find('input[name="flavour_name[]"]').val();
            var flavourPrice = $(this).find('input[name="flavour_price[]"]').val();
            flavourData.push({ name: flavourName, price: flavourPrice });
        });

        var formData = new FormData(this);
        formData.append("sizeData", JSON.stringify(sizeData));
        formData.append("ingredientData", JSON.stringify(ingredientData));
        formData.append("sideData", JSON.stringify(sideData));
        formData.append("flavourData", JSON.stringify(flavourData));
        formData.append("toGoWithData", JSON.stringify(toGoWithData));

        var id = $('#productId').val();
        var url = id ? `/public/admin/product/${id}` : '/public/admin/product';
        var method = id ? 'PUT' : 'POST';

        $.ajax({
            url: url,
            type: method,
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#productModal').modal('hide');
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

    // Reset form modal on hide
    $('#productModal').on('hidden.bs.modal', function() {
        $('#productForm')[0].reset();
        $('#categoryErrors').addClass('d-none');
        $('#productId').val('');
    });

    // Handle category change and sub-category population
    $('#category').change(function() {
        if ($(this).val()) {
            $('#sub_category').empty();
            $('#sub_category').append(`<option value="" selected>Select Sub Category</option>`);
            $.ajax({
                url: '/public/admin/sub-categories/' + $(this).val(),
                method: 'GET',
                success: function(data) {
                    data?.categories?.map(item => {
                        $('#sub_category').append(`<option value="${item?.id}">${item?.name}</option>`);
                    });
                },
                error: function(error) {
                    console.log('Error fetching category data:', error);
                }
            });
        } else {
            console.log("No category selected");
        }
    });

    // Initialize DataTable
    var table = $('#productsTable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        stateSave: true,
        ajax: {
            url: "/public/admin/productList",
            type: "GET",
            dataSrc: function(json) {
                return json.products;
            }
        },
        columns: [{
            title: 'Thumbnail',
            data: 'main_img',
            render: function(data) {
                return data ? `<img style="height:40px" src="{{ url('/') }}/${data}" />` : '';
            }
        }, {
            title: 'Name',
            data: 'product_name',
            render: function(data) {
                return `<span class="text-dark">${data}</span>`;
            }
        }, {
            title: 'Price',
            data: 'price',
            render: function(data) {
                return data ? `<span class="badge bg-primary">₱${data}</span>` : '';
            }
        }, {
            title: 'Action',
            data: 'id',
            render: function(data, type, row) {
                return `<button class="btn btn-sm btn-success" data-id="${data}" onclick="editProduct(${data})"><i class="bi bi-pencil"></i></button>`;
            }
        }]
    });

});
$('#sidesInToGoWith').on('change', function() {
    if ($(this).prop('checked')) {  // Check if the checkbox is checked
        $('#numberSidesInToGoWith').show();  // Show the element if checked numberSidesInToGoWith
    } else {
        $('#numberSidesInToGoWith').hide();  // Hide the element if unchecked
    }
});

</script>


@endsection