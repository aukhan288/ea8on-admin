<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Side;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SideController extends Controller
{
    // Display the sides index page
    public function index()
    {
        return view('admin.sides');
    }

    // Get the list of sides (AJAX endpoint)
    public function getSides(Request $request)
    {
        $sides = Side::all();

        // Return the data in a format suitable for DataTable (JSON)
        return response()->json([
            'data' => $sides
        ]);
    }

    // Show the details of a single side
    public function show($id)
    {
        $side = Side::findOrFail($id);
        return response()->json($side);
    }

    // Store a new side (Create)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $side = new Side();
        $side->name = $validated['name'];
        $side->price = $validated['price'];

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/sides');
            $side->image = str_replace('public/', '', $imagePath); // Store relative path for storage
        }

        $side->save();

        return response()->json([
            'message' => 'Side created successfully.',
            'side' => $side
        ]);
    }

    // Update an existing side
    public function update(Request $request, $id)
    {
        $side = Side::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $side->name = $validated['name'];
        $side->price = $validated['price'];

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($side->image) {
                Storage::delete('public/' . $side->image);
            }

            $imagePath = $request->file('image')->store('public/sides');
            $side->image = str_replace('public/', '', $imagePath); // Store relative path for storage
        }

        $side->save();

        return response()->json([
            'message' => 'Side updated successfully.',
            'side' => $side
        ]);
    }

    // Delete a side
    public function destroy($id)
    {
        $side = Side::findOrFail($id);

        // Delete the image file if exists
        if ($side->image) {
            Storage::delete('public/' . $side->image);
        }

        $side->delete();

        return response()->json([
            'message' => 'Side deleted successfully.'
        ]);
    }
}
