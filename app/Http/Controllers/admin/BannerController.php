<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        return view('admin.banners');
    }

    // Fetch categories for AJAX (categoryList)
    public function bannerList()
    {
        $banners = Banner::all();
        return response()->json(['banners' => $banners]);
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
    
                // Store the file in the public disk
                $path = $attachment->store($folder, 'public');
                
                // Generate the file URL
                $fileUrl = 'storage/' . $path;
                // Store the file URL in the database
                $category = Banner::create([
                    'banner_img' => $fileUrl,  // Use the file URL if uploaded
                    'status' => 1
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
    
     
    
        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'No file uploaded',
            'file_path' => null  // No file URL since no file was uploaded
        ]);
    }
    

    // Edit category
    public function edit($id)
    {
        $category = Banner::findOrFail($id);
        return response()->json(['category' => $category]);
    }

    // Update category
    public function update(Request $request, $id)
    {
        $category = Banner::findOrFail($id);

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
        $banner->img = $request->category_name;
        $banner->save();

        return response()->json(['success' => true]);
    }

    // Delete category
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        // Delete associated image from storage
        if ($banner->iimg) {
            Storage::disk('public')->delete($banner->img); // Delete the image from storage
        }

        $banner->delete();

        return response()->json(['success' => 'Banner deleted successfully!']);
    }
}
