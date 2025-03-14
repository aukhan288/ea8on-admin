<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users');
    }

    // Fetch categories for AJAX (categoryList)
    public function userList()
    {
        $users = User::all();

        return response()->json(['users' => $users]);
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

            $fileUrl = url('/') . '/storage/' . $path;

            // Store the file URL in the database
            $category = Banner::create([
                'img' => $fileUrl,  // Adjust according to your needs
                'status' =>1   // Store the full URL to access the file
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
        $user = User::findOrFail($id);
        return response()->json(['user' => $user]);
    }

    // Update category
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('category_image')) {
            // Delete old image if exists
            if ($user->image) {
                Storage::disk('public')->delete($user->image); // Delete the old image
            }

            // Store the new image
            $imagePath = $request->file('category_image')->store('category_images', 'public');
            $user->image = storage/$imagePath;
        }

        // Update category name
        $user->img = $request->category_name;
        $user->save();

        return response()->json(['success' => true]);
    }

    // Delete category
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Delete associated image from storage
        if ($user->iimg) {
            Storage::disk('public')->delete($user->img); // Delete the image from storage
        }

        $user->delete();

        return response()->json(['success' => 'User deleted successfully!']);
    }
}
