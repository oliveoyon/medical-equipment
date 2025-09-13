<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class CategoryController extends Controller
{
    // List categories
    public function index() {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    // Store new category
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        $iconPath = $request->file('icon') ? $request->file('icon')->store('categories','public') : null;

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'icon' => $iconPath,
        ]);

        return response()->json(['success' => 'Category added successfully!']);
    }

    // Update category
    public function update(Request $request, $id) {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        $iconPath = $category->icon;
        if ($request->hasFile('icon')) {
            if ($iconPath && Storage::disk('public')->exists($iconPath)) {
                Storage::disk('public')->delete($iconPath);
            }
            $iconPath = $request->file('icon')->store('categories','public');
        }

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'icon' => $iconPath,
        ]);

        return response()->json(['success' => 'Category updated successfully!']);
    }

    // Delete category
    public function destroy($id) {
        $category = Category::findOrFail($id);
        if ($category->icon && Storage::disk('public')->exists($category->icon)) {
            Storage::disk('public')->delete($category->icon);
        }
        $category->delete();

        return response()->json(['success' => 'Category deleted successfully!']);
    }
}
