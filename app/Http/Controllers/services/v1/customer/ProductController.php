<?php

namespace App\Http\Controllers\services\v1\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\FavoriteProduct;
use Illuminate\Support\Facades\DB;
use App\Notifications\FirebaseNotification;
use Illuminate\Support\Facades\Auth;



class ProductController extends Controller
{
    public function PrductDetails(Request $request, $product)
    {
        $product = Product::with(['sizes','flavours','ingredients','sides'])->findOrFail($product);    
        return response()->json([
            'data' => $product,
            'status' => 'success'
        ]);
    }
    
    public function ProductsByCategory(Request $request, $category, $subcategory = 0)
    {
        $products = Product::where('category_id', $category)
            ->when($subcategory != 0, function($query) use ($subcategory) {
                return $query->where('sub_category_id', $subcategory);
            })->get();
    
        return response()->json([
            'data' => $products,
            'status' => 'success'
        ]);
    }

    public function DealOfTheDayProductList(Request $request)
    {
        $products = Product::where('deal_of_the_day', 1)->get();
    
        return response()->json([
            'data' => $products,
            'status' => 'success'
        ]);
    }

    public function CartProducts(Request $request)
    {
        $products = Product::whereIn('id', $request->products)->get();
    
        return response()->json([
            'data' => $products,
            'status' => 'success'
        ]);
    }
    
    public function SearchProduct(Request $request)
    {
        $products = DB::table('products')
        ->where('product_name', 'like', '%' . $request->searchKeyword . '%')
        ->select('id', 'product_name', 'main_img')
        ->get();
    
        return response()->json([
            'data' => $products,
            'status' => 'success'
        ]);
    }

    public function AddToFavorite(Request $request, $product)
{
    // Get the authenticated user
    $user = User::find(6);
  
    // Prepare the notification message
    $message = [
        'title' => 'Product added',
        'body' => 'Product added to favorites',
    ];
    $user->notify(new FirebaseNotification($message));
    exit;
    $user->favorites()->detach($product->id);
    
    // Find the product by its ID
    $product = Product::find($product);

    // Check if the product exists
    if (!$product) {
        return response()->json([
            'status' => 'error',
            'message' => 'Product not found'
        ], 404);
    }

    // Check if the product is already in the user's favorites
    $isFavorite = $user->favorites()->where('product_id', $product->id)->exists();

    if ($isFavorite) {
        // If the product is already a favorite, remove it
        $user->favorites()->detach($product->id);
        $message = [
            'title' => 'Product removed',
            'body' => 'Product removed from favorites',
        ];
        $user->notify(new FirebaseNotification($message));

        return response()->json([
            'status' => 'success',
            'action' => 'removed',  // It was removed, not added
            'message' => 'Product removed from favorites successfully',
        ]);
    } else {
        // If the product is not a favorite, add it
        $user->favorites()->attach($product->id); // Add the product to the favorites
        $user->notify(new FirebaseNotification($message));

        return response()->json([
            'status' => 'success',
            'action' => 'added',  // It was added
            'message' => 'Product added to favorites successfully',
        ]);
    }
}

}
