<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:colors,name']);
        $color = Color::create($request->only('name','hex'));
        return response()->json(['success' => 'Color added successfully', 'color' => $color]);
    }

    public function update(Request $request, $id)
    {
        $color = Color::findOrFail($id);
        $request->validate(['name' => 'required|unique:colors,name,'.$id]);
        $color->update($request->only('name','hex'));
        return response()->json(['success' => 'Color updated successfully', 'color' => $color]);
    }

    public function destroy($id)
    {
        Color::findOrFail($id)->delete();
        return response()->json(['success' => 'Color deleted successfully']);
    }
}
