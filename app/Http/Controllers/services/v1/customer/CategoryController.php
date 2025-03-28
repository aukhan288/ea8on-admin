<?php

namespace App\Http\Controllers\services\v1\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function categoryList()
    {
        $categories = Category::all()->map(function ($category) {
            $category->category_img = $category->category_img ? Storage::url($category->category_img) : null;
            $category->category_img_2 = $category->category_img_2 ? Storage::url($category->category_img_2) : null;
            $category->category_img_3 = $category->category_img_3 ? Storage::url($category->category_img_3) : null;
            return $category;
        });

        return response()->json([
            'data' => $categories,
            'status' => 'success'
        ]);
    }
}
