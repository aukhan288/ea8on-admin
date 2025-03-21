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
            'sides', 
            'category:id,category_name,category_img'
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
        
        $request->validate([
            'name' => 'required|string|max:255',
            'sandwich_price' => 'required|numeric',
            'meal_price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'main_img.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Validate main image
            'img_1.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Validate additional images
            'img_2.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'img_3.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
        ]);
    
        // Create new product
        $product = new Product();
        $product->product_name = $request->name;
        $product->sandwich_price = $request->sandwich_price;
        $product->meal_price = $request->meal_price;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->stock = $request->out_of_stock ?? 0;
        $product->send_notification = $request->send_notification ?? 0;
        $product->deal_of_the_day = $request->deal_of_the_day ?? 0;
        $product->has_sides = $request->has_sides ?? 0;
       
        
        // Store Main Image
        if ($request->hasFile('main_img')) {
            $product->main_img  = $request->file('main_img')[0]->store('images/products', 'public');
        }
        if ($request->hasFile('img_1')) {
            $product->img_1 = $request->file('img_1')[0]->store('images/products', 'public');
        }
        if ($request->hasFile('img_2')) {
            $product->img_2 = $request->file('img_2')[0]->store('images/products', 'public');
        }
        if ($request->hasFile('img_3')) {
            $product->img_3 = $request->file('img_3')[0]->store('images/products', 'public');
        }
        $product->save();

     
        if ($product->has_sides) {
            $product->sides()->sync(request('sides')); // Sync sides from request
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

        $request->validate([
            'name' => 'required|string|max:255',
            'sandwich_price' => 'required|numeric',
            'meal_price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'main_img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'img_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'img_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'img_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
        ]);

        // Update product details
        $product->product_name = $request->name;
        $product->sandwich_price = $request->sandwich_price;
        $product->meal_price = $request->meal_price;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->stock = $request->out_of_stock ?? 0;
        $product->send_notification = $request->send_notification ?? 0;
        $product->deal_of_the_day = $request->deal_of_the_day ?? 0;
        $product->has_sides = $request->has_sides ?? 0;

        // Handle images
        if ($request->hasFile('main_img')) {
            Storage::disk('public')->delete($product->main_img); // Delete old image
            $product->main_img = $request->file('main_img')->store('images/products', 'public');
        }
        if ($request->hasFile('img_1')) {
            Storage::disk('public')->delete($product->img_1);
            $product->img_1 = $request->file('img_1')->store('images/products', 'public');
        }
        if ($request->hasFile('img_2')) {
            Storage::disk('public')->delete($product->img_2);
            $product->img_2 = $request->file('img_2')->store('images/products', 'public');
        }
        if ($request->hasFile('img_3')) {
            Storage::disk('public')->delete($product->img_3);
            $product->img_3 = $request->file('img_3')->store('images/products', 'public');
        }

        $product->save();

        // Sync product sides if applicable
        if ($product->has_sides) {
            $product->sides()->sync($request->sides ?? []);
        } else {
            $product->sides()->detach();
        }

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
