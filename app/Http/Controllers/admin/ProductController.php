<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Ingredient;
use App\Models\ProductSize;
use App\Models\ProductFlavour;
use App\Models\ProductSide;

class ProductController extends Controller
{
    public function index()
    {
        $categories=Category::get(['id', 'category_name']);
        return view('admin.products', compact('categories'));
    }

    public function ProductList()
    {
        $products = Product::get();
        return response()->json(['products' => $products]);
    }

    public function store(Request $request)
    {
        // Handle file upload for the main image (thumbnail)
        if ($request->hasFile('main_img')) {
            $thumbnailPath = $request->file('main_img')[0]->store('thumbnails', 'public');
        } else {
            $thumbnailPath = null;
        }
    
        // Create the product instance and save it
        $product = new Product();
        $product->product_name = $request->input('name');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->sub_category_id = $request->input('sub_category_id');
        $product->main_img = "storage/".$thumbnailPath;
        $product->description = $request->input('description');
        $product->stock = $request->input('out_of_stock') ?? false;
        $product->send_notification = $request->input('send_notification') ?? false;
        $product->publish = $request->input('publish') ?? false;
        $product->deal_of_the_day = $request->input('deal_of_the_day') ?? false;
    
        // Save the product to the database
        $product->save();
    
        // Save the size data if provided
        if ($request->has('sizeData')) {
            $sizeData = json_decode($request->input('sizeData'), true);
            foreach ($sizeData as $size) {
                ProductSize::create([
                    'product_id' => $product->id,
                    'title' => $size["name"],
                    'price' => $size["price"],
                    'stock' => 1, // Adjust this according to your requirements
                ]);
            }
        }
    
        // Save the ingredient data if provided
        if ($request->has('ingredientData')) {
            $ingredientData = json_decode($request->input('ingredientData'), true);
            foreach ($ingredientData as $ingredient) {
                // Handle file upload for ingredient image if available
                $ingredientImagePath = null;
                if (isset($ingredient['image']) && $ingredient['image']) {
                    $ingredientImagePath = $ingredient['image']->store('ingredients', 'public');
                }
    
                Ingredient::create([
                    'product_id' => $product->id,
                    'name' => $ingredient['name'], // Ensure this field is always present
                    'price' => $ingredient['price'],
                    'unit' => $ingredient['unit'],
                    'image' => $ingredientImagePath,
                ]);
            }
        }
    
        // Save the side data if provided
        if ($request->has('sideData')) {
            $sideData = json_decode($request->input('sideData'), true);
            foreach ($sideData as $side) {
                // Handle file upload for side image
                $sideImagePath = null;
                if (isset($side['image']) && $side['image']) {
                    $sideImagePath = $side['image']->store('sides', 'public');
                }
    
                ProductSide::create([
                    'product_id' => $product->id,
                    'name' => $side["name"],
                    'price' => $side["price"],
                    'unit' => $side["unit"],
                    'image' => $sideImagePath,
                ]);
            }
        }
    
        // Save the flavour data if provided
        if ($request->has('flavourData')) {
            $flavourData = json_decode($request->input('flavourData'), true);
            foreach ($flavourData as $flavour) {
                ProductFlavour::create([
                    'product_id' => $product->id,
                    'name' => $flavour["name"],
                    'price' => $flavour["price"],
                ]);
            }
        }
    
        // Return a successful response
        return response()->json(['message' => 'Product saved successfully', 'product' => $product], 201);
    }
    
    
}
