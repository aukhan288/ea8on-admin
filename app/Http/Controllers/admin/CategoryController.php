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




public function store(Request $request)
{
    // Check if a file is uploaded
    if ($request->hasFile('thumbnail')) {
        // Get the uploaded file
        $attachment = $request->file('thumbnail');

        // Check if the file is valid
        if ($attachment->isValid()) {
            // Define the folder where files will be stored
            $folder = 'images';

        
            $path = $attachment->store($folder, 'public');

            $fileUrl = 'storage/' . $path;

            // Store the file URL in the database
            $category = Category::create([
                'category_name' => $request->name,  // Adjust according to your needs
                'category_img' => $fileUrl  // Store the full URL to access the file
            ]);
            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'File uploaded successfully',
                'file_path' => Storage::url($path)  // The URL to access the file
            ]);
        } else {
            return response()->json(['success' => false, 'message' => 'File is not valid']);
        }
    }

    // If no file is uploaded or the file is invalid
    return response()->json(['success' => false, 'message' => 'No file uploaded or file is invalid.']);
}

    // Edit category
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return response()->json(['category' => $category]);
    }

    // Update category
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('category_image')) {
            // Delete old image if exists
            if ($category->image) {
                Storage::disk('public')->delete($category->image); // Delete the old image
            }

            // Store the new image
            $imagePath = $request->file('category_image')->store('category_images', 'public');
            $category->image = storage/$imagePath;
        }

        // Update category name
        $category->name = $request->category_name;
        $category->save();

        return response()->json(['success' => true]);
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
