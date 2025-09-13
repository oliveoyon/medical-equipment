<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Slider;

class SliderController extends Controller
{
    // List sliders
    public function index() {
        $sliders = Slider::latest()->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    // Store new slider
    public function store(Request $request) {
        $request->validate([
            'title_h5' => 'nullable|string|max:255',
            'title_h1' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_url' => 'nullable|url|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'status' => 'nullable|boolean',
        ]);

        $imagePath = $request->file('image')->store('sliders','public');

        Slider::create([
            'title_h5' => $request->title_h5,
            'title_h1' => $request->title_h1,
            'description' => $request->description,
            'button_url' => $request->button_url,
            'image' => $imagePath,
            'status' => $request->status ?? true,
        ]);

        return response()->json(['success' => 'Slider added successfully!']);
    }

    // Update slider
    public function update(Request $request, $id) {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'title_h5' => 'nullable|string|max:255',
            'title_h1' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'status' => 'nullable|boolean',
        ]);

        $imagePath = $slider->image; // existing image
        if ($request->hasFile('image')) {
            // delete previous image
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('sliders','public');
        }

        $slider->update([
            'title_h5' => $request->title_h5,
            'title_h1' => $request->title_h1,
            'description' => $request->description,
            'button_url' => $request->button_url,
            'image' => $imagePath, // always exists
            'status' => $request->status ?? true,
        ]);

        return response()->json(['success' => 'Slider updated successfully!']);
    }

    // Delete slider
    public function destroy($id) {
        $slider = Slider::findOrFail($id);
        if ($slider->image && Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }
        $slider->delete();

        return response()->json(['success' => 'Slider deleted successfully!']);
    }
}
