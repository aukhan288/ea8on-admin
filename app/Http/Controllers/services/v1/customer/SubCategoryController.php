<?php

namespace App\Http\Controllers\services\v1\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    function SubCategoryList(Request $request, $category) {
        $subcategories = SubCategory::where('category_id', $category)->get();

        return response()->json([
            'data' => $subcategories,
            'status' => 'success'
        ]);
    }
}
