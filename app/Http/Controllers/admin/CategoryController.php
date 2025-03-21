<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories');
    }

    // Fetch categories for AJAX (categoryList)
    public function categoryList()
    {
        $categories = Category::all();
        return response()->json(['categories' => $categories]);
    }

    public function categories(Request $request)
    {
        $query = Category::query();
    
        // Search Filtering
        if ($request->has('search') && !empty($request->input('search')['value'])) {
            $search = $request->input('search')['value'];
            $query->where('category_name', 'LIKE', "%{$search}%");
        }
    
        // Sorting
        $columnIndex = $request->input('order.0.column'); // Column index
        $columnName = $request->input("columns.$columnIndex.data"); // Column name
        $columnSortOrder = $request->input('order.0.dir', 'desc'); // Sort order
    
        if ($columnName) {
            $query->orderBy($columnName, $columnSortOrder);
        } else {
            $query->orderBy('id', 'desc'); // Default sorting
        }
    
        // **Fixing Pagination Issue**
        $limit = $request->input('length', 10);  // Number of records per page (default: 10)
        $offset = $request->input('start', 0); // Offset (default: 0)
    
        $totalRecords = $query->count(); // Total records count
        $categories = $query->skip($offset)->take($limit)->get(); // Paginated results
    
        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords,
            "data" => $categories
        ]);
    }



    public function store(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'category_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_img_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_img_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_img_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);
    
        // Prepare data for insertion into the database
        $data = [
            'category_name' => $request->name,
            'description' => $request->description,
            'status' => $request->status=="on" ? 1 : 0, // Default to 0 (inactive) if not checked
        ];
    
        // Process the category image upload (main image)
        if ($request->hasFile('category_img') && $request->file('category_img')->isValid()) {
            $data['category_img'] = $request->file('category_img')->store('categories', 'public');
        }
    
        // Process other image uploads (category_img_1, category_img_2, category_img_3)
        foreach (['category_img_1', 'category_img_2', 'category_img_3'] as $imageField) {
            if ($request->hasFile($imageField) && $request->file($imageField)->isValid()) {
                $data[$imageField] = $request->file($imageField)->store('categories', 'public');
            }
        }
    
        // Store the category in the database
        $category = Category::create($data);
    
        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Category created successfully',
            'category' => $category
        ]);
    }

    // Edit category
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $category->category_img= Storage::url($category->category_img);
        $category->category_img_1=Storage::url($category->category_img_1);
        $category->category_img_2=Storage::url($category->category_img_2);
        $category->category_img_3=Storage::url($category->category_img_3);
        return response()->json(['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        
        // Find the category or fail if not found
        $category = Category::findOrFail($id);
    
        // Prepare data for updating in the database
        $data = [
            'category_name' => $request->name,
            'description' => $request->description,
            'status' => $request->boolean('status'), // Use Laravel's built-in method to handle boolean values
        ];
    
        // Process category image upload (if any)
        if ($request->hasFile('category_img') && $request->file('category_img')->isValid()) {
            // Delete old image if it exists
            if ($category->category_img && Storage::disk('public')->exists($category->category_img)) {
                Storage::disk('public')->delete($category->category_img);
            }
    
            // Store the new image
            $data['category_img'] = $request->file('category_img')->store('categories', 'public');
        }
    
        // Process other image uploads (category_img_1, category_img_2, category_img_3)
        foreach (['category_img_1', 'category_img_2', 'category_img_3'] as $imageField) {
            if ($request->hasFile($imageField) && $request->file($imageField)->isValid()) {
                // Delete old image if it exists
                if ($category->{$imageField} && Storage::disk('public')->exists($category->{$imageField})) {
                    Storage::disk('public')->delete($category->{$imageField});
                }
    
                // Store the new image
                $data[$imageField] = $request->file($imageField)->store('categories', 'public');
            }
        }
    
        // Update the category data in the database
        $category->update($data);
    
        // Return the updated category in the response
        return response()->json([
            'message' => 'Category updated successfully.',
            'category' => $category  // Return the updated category object
        ]);
    }
    

    



    // Delete category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Delete associated image from storage
        if ($category->image) {
            Storage::disk('public')->delete($category->image); // Delete the image from storage
        }

        $category->delete();

        return response()->json(['success' => 'Category deleted successfully!']);
    }
}
