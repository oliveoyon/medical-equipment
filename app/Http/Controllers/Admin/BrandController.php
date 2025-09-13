<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brands.index', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:brands,name',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('brands', 'public');
        }

        Brand::create([
            'name' => $request->name,
            'logo' => $logoPath
        ]);

        return response()->json(['success' => 'Brand added successfully.']);
    }

    public function edit(Brand $brand)
    {
        return response()->json($brand);
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $brand->id,
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // Update name
        $brand->name = $request->name;

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($brand->logo && Storage::disk('public')->exists($brand->logo)) {
                Storage::disk('public')->delete($brand->logo);
            }

            // Store new logo
            $path = $request->file('logo')->store('brands', 'public');
            $brand->logo = $path;
        }

        $brand->save();

        return response()->json(['success' => 'Brand updated successfully!']);
    }


    public function destroy(Brand $brand)
    {
        // Delete the logo file if exists
        if ($brand->logo && Storage::disk('public')->exists($brand->logo)) {
            Storage::disk('public')->delete($brand->logo);
        }

        // Delete the brand record
        $brand->delete();

        return response()->json(['success' => 'Brand deleted successfully.']);
    }
}
