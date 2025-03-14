<?php

namespace App\Http\Controllers\services\v1\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function categoryList(){
        $categories = Category::get();

        return response()->json([
            'data' => $categories,
            'status' => 'success'
        ]);
    }
}
