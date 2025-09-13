<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::latest()->get();
        return view('admin.sizes.index', compact('sizes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:sizes,name',
        ]);

        Size::create(['name' => $request->name]);

        return response()->json(['success' => 'Size added successfully.']);
    }

    public function edit(Size $size)
    {
        return response()->json($size);
    }

    public function update(Request $request, Size $size)
    {
        $request->validate([
            'name' => 'required|string|unique:sizes,name,' . $size->id,
        ]);

        $size->update(['name' => $request->name]);

        return response()->json(['success' => 'Size updated successfully.']);
    }

    public function destroy(Size $size)
    {
        $size->delete();
        return response()->json(['success' => 'Size deleted successfully.']);
    }
}
