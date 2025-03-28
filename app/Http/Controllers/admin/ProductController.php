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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
    
    public function show($id)
    {
        $product = Product::with([
            // 'sides', 
            'category:id,category_name,category_img',
            'flavours'
        ])->find($id);
    
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $product
        ], 200);
    }
    
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'sandwich_price' => 'required|numeric',
            'meal_price' => 'nullable|numeric',
            'category_id' => 'required|exists:categories,id',
            // 'main_img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // 'img_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // 'img_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // 'img_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
            'sides' => 'nullable|array',
            'sides.*' => 'exists:sides,id',
            'flavours' => 'nullable|array',
            'flavours.*' => 'string|max:255',
            'price' => 'nullable|array',
            'price.*' => 'numeric|min:0',
            'stock' => 'nullable|array',
            'stock.*' => 'integer|min:0',
        ]);
    
        // Create new product
        $product = Product::create([
            'product_name' => $request->name,
            'sandwich_price' => $request->sandwich_price,
            'meal_price' => $request->meal_price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'stock' => $request->has('stock') ? 1 : 0, // ✅ FIXED
            'send_notification' => $request->send_notification ?? 0,
            'deal_of_the_day' => $request->deal_of_the_day ?? 0,
            'has_sides' => $request->has_sides ?? 0,
            'has_flavours' => $request->has_flavours ?? 0,
        ]);
    
        // Handle images
        $imageFields = ['main_img', 'img_1', 'img_2', 'img_3'];
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $product->$field = $request->file($field)->store('images/products', 'public');
            }
        }
        $product->save();
    
        // Sync sides
        if ($product->has_sides && $request->has('sides')) {
            $product->sides()->sync($request->sides);
        }
    
        // Store flavours with prices & stock
        if ($product->has_flavours && $request->has('flavours') && $request->has('price') && $request->has('stock')) {
            foreach ($request->flavours as $index => $flavour) {
                ProductFlavour::create([  // ✅ Explicit model usage
                    'product_id' => $product->id, // ✅ Associate flavour with product
                    'title' => $flavour,
                    'price' => $request->price[$index] ?? 0,
                    'stock' => $request->stock[$index] ?? 0,
                ]);
            }
        }
    
        return response()->json([
            'message' => 'Product saved successfully',
            'product' => $product
        ], 201);
    }
    
    
    


    public function update(Request $request, $id)
{
    $product = Product::find($id);

    if (!$product) {
        return response()->json([
            'success' => false,
            'message' => 'Product not found'
        ], 404);
    }

    // ✅ Update product details, only if provided
    if ($request->filled('name')) $product->product_name = $request->name;
    if ($request->filled('sandwich_price')) $product->sandwich_price = $request->sandwich_price;
    if ($request->filled('meal_price')) $product->meal_price = $request->meal_price;
    if ($request->filled('description')) $product->description = $request->description;

    $product->category_id = $request->category_id;
    $product->stock = $request->out_of_stock ?? 0;
    $product->send_notification = $request->send_notification ?? 0;
    $product->deal_of_the_day = $request->deal_of_the_day ?? 0;
    $product->has_sides = $request->has_sides ?? 0;
    // ✅ Handle images safely
    $imageFields = ['main_img', 'img_1', 'img_2', 'img_3'];
    foreach ($imageFields as $field) {

        
        
        if ($request[$field]) {
            // if (!empty($product->$field)) {
            //     Storage::disk('public')->delete($product->$field);
            // }
            
            $product[$field] = $request[$field][0]->store('images/products', 'public');
        }
    }

    $product->save();

    // ✅ Sync sides efficiently
    $product->sides()->sync($request->has_sides ? ($request->sides ?? []) : []);

    return response()->json([
        'success' => true,
        'message' => 'Product updated successfully',
        'product' => $product
    ], 200);
}

    

    
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }

        // Remove relations in pivot table
        $product->sides()->detach();

        // Delete the product
        $product->delete();

        return response()->json(['success' => 'Product deleted successfully.']);
    }

    

}
