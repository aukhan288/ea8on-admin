<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\services\v1\customer\HomeController;
use App\Http\Controllers\services\v1\customer\CategoryController;
use App\Http\Controllers\services\v1\customer\SubCategoryController;
use App\Http\Controllers\services\v1\customer\ProductController;
use App\Http\Controllers\services\v1\customer\UserNotificationController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Group the routes under the 'services/v1/customer' prefix
Route::prefix('services/v1/customer/')->group(function () {
    Route::post('signup', [UserController::class, 'signup']);
    Route::post('login', [UserController::class, 'login']);
    Route::post('verify_signup_otp', [UserController::class, 'VerifySignupOtp']);
    Route::get('banners', [HomeController::class, 'HomePageBanners']);
    Route::get('categories', [CategoryController::class, 'categoryList']);
    Route::get('sub-Category/{category}', [SubCategoryController::class, 'SubCategoryList']);
    Route::get('products', [ProductController::class, 'Products']);
    Route::get('productsByCategory/{category}/{subcategory?}', [ProductController::class, 'ProductsByCategory']);
    Route::get('dealOfTheDayProductList', [ProductController::class, 'DealOfTheDayProductList']);
    Route::get('prductDetails/{product}', [ProductController::class, 'PrductDetails']);
    Route::get('addToFavorite/{product}', [ProductController::class, 'AddToFavorite']);
    Route::post('cartProducts', [ProductController::class, 'CartProducts']);
    Route::post('searchProduct', [ProductController::class, 'SearchProduct']);
    Route::get('notifications', [UserNotificationController::class, 'NotificationList'])->middleware('auth:sanctum');
});

