<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    // Display list of subcategories
    public function index()
    {
        $subcategories = Subcategory::with('category')->get();
        $categories = \App\Models\Category::all();
        return view('admin.subcategories.index', compact('subcategories', 'categories'));
    }

    // Store new subcategory
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        $subcategory = Subcategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);

        return response()->json(['success' => 'Subcategory added successfully!']);
    }

    // Update existing subcategory
    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        $subcategory->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);

        return response()->json(['success' => 'Subcategory updated successfully!']);
    }

    // Delete a subcategory
    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();

        return response()->json(['success' => 'Subcategory deleted successfully!']);
    }
}
