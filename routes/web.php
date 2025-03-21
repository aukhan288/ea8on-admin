<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\DeliveryBoyController;
use App\Http\Controllers\admin\SideController;






Auth::routes();


Route::prefix('/admin')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index'); // Show all categories
    Route::get('/categoryList', [CategoryController::class, 'categoryList'])->name('categoryList'); // Fetch categories for AJAX
    Route::get('categories-list', [CategoryController::class, 'categories'])->name('categories.list');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store'); // Create category
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit'); // Edit category
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update'); // Update category
    Route::delete('/category/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy'); // Delete category

    Route::get('/sub-categories', [SubCategoryController::class, 'index'])->name('sub-category.index'); // Show all categories
    Route::get('/sub-categoryList', [SubCategoryController::class, 'categoryList'])->name('sub-categoryList'); // Fetch categories for AJAX
    Route::post('/sub-category/store', [SubCategoryController::class, 'store'])->name('sub-category.store'); // Create category
    Route::get('/sub-category/{id}/edit', [SubCategoryController::class, 'edit'])->name('sub-category.edit'); // Edit category
    Route::get('/sub-categories/{categories}', [SubCategoryController::class, 'SubCategories'])->name('sub-categories'); // Edit category
    Route::post('/sub-category/{id}/update', [SubCategoryController::class, 'update'])->name('sub-category.update'); // Update category
    Route::delete('/sub-category/{id}/destroy', [SubCategoryController::class, 'destroy'])->name('sub-category.destroy'); // Delete category

    Route::get('sides', [SideController::class, 'index'])->name('admin.sides.index');
    Route::get('sideList', [SideController::class, 'getSides']);
    Route::post('side-create', [SideController::class, 'store']);
    Route::get('sides/{id}', [SideController::class, 'show']);
    Route::put('sides/{id}', [SideController::class, 'update']);
    Route::delete('/sides/{id}', [SideController::class, 'destroy'])->name('sides.destroy');



    Route::get('products', [ProductController::class, 'index'])->name('product.index'); // Show all categories
    Route::get('productList', [ProductController::class, 'ProductList'])->name('productList'); // Fetch categories for AJAX
    Route::post('product-create', [ProductController::class, 'store'])->name('product.store'); // Create category
    Route::get('product/{id}', [ProductController::class, 'show']);
    Route::put('product/{id}', [ProductController::class, 'update']);
    Route::delete('product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    // Route::get('/sub-category/{id}/edit', [SubCategoryController::class, 'edit'])->name('sub-category.edit'); // Edit category
    // Route::post('/sub-category/{id}/update', [SubCategoryController::class, 'update'])->name('sub-category.update'); // Update category
    // Route::delete('/sub-category/{id}/destroy', [SubCategoryController::class, 'destroy'])->name('sub-category.destroy'); // Delete category
    
    Route::get('/banners', [BannerController::class, 'index'])->name('banner.index'); // Show all categories
    Route::get('/bannerList', [BannerController::class, 'bannerList'])->name('bannerList'); // Fetch categories for AJAX
    Route::post('/banner/store', [BannerController::class, 'store'])->name('banner.store'); // Create category
    Route::get('/banner/{id}', [BannerController::class, 'edit'])->name('banner.edit'); // Edit category
    Route::post('/banner/{id}', [BannerController::class, 'update'])->name('banner.update'); // Update category
    Route::delete('/banner/{id}', [BannerController::class, 'destroy'])->name('banner.destroy'); // Delete category
    
    Route::get('/customers', [UserController::class, 'index'])->name('user.index'); // Show all categories
    Route::get('/userList', [UserController::class, 'userList'])->name('userList'); // Fetch categories for AJAX
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store'); // Create category
    Route::get('/user/{id}', [UserController::class, 'edit'])->name('user.edit'); // Edit category
    Route::post('/user/{id}', [UserController::class, 'update'])->name('user.update'); // Update category
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy'); // Delete category
   
    Route::get('/delivery-boys', [DeliveryBoyController::class, 'index'])->name('delivery-boy.index'); // Show all categories
    Route::get('/delivery-boyList', [DeliveryBoyController::class, 'DeliveryBoyList'])->name('delivery-boyList'); // Fetch categories for AJAX
    Route::post('/delivery-boy/store', [DeliveryBoyController::class, 'store'])->name('delivery-boy.store'); // Create category
    Route::get('/delivery-boy/{id}', [DeliveryBoyController::class, 'edit'])->name('delivery-boy.edit'); // Edit category
    Route::post('/delivery-boy/{id}', [DeliveryBoyController::class, 'update'])->name('delivery-boy.update'); // Update category
    Route::delete('/delivery-boy/{id}', [DeliveryBoyController::class, 'destroy'])->name('delivery-boy.destroy'); // Delete category
    
});



// Route::get('/', [WebsiteController::class,'home']);
// Route::get('/menu', [WebsiteController::class,'menu']);
// Route::get('/about', [WebsiteController::class,'about']);
// Route::get('/checkout', [WebsiteController::class,'checkout']);

