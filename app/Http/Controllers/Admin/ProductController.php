<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductDocument;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Color;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category','subcategory','brand','images','documents'])->get();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view('admin.products.index', compact('products','categories','subcategories','brands','sizes','colors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'category_id'=>'required',
            'brand_id'=>'nullable',
            'sizes'=>'nullable|array',
            'colors'=>'nullable|array',
            'images.*'=>'nullable|image|max:2048',
            'documents.*'=>'nullable|mimes:pdf|max:5120',
        ]);

        DB::beginTransaction();
        try {
            $product = Product::create([
                'name'=>$request->name,
                'slug'=>Str::slug($request->name),
                'category_id'=>$request->category_id,
                'subcategory_id'=>$request->subcategory_id,
                'brand_id'=>$request->brand_id,
                'model'=>$request->model,
                'sizes'=>$request->sizes ? json_encode($request->sizes) : null,
                'colors'=>$request->colors ? json_encode($request->colors) : null,
                'description'=>$request->description,
                'specifications'=>$request->specifications,
                'status'=>$request->status ?? true,
            ]);

            // Upload images
            if($request->hasFile('images')){
                foreach($request->file('images') as $img){
                    $path = $img->store('products/images','public');
                    ProductImage::create(['product_id'=>$product->id,'image'=>$path]);
                }
            }

            // Upload documents
            if($request->hasFile('documents')){
                foreach($request->file('documents') as $doc){
                    $path = $doc->store('products/documents','public');
                    ProductDocument::create([
                        'product_id'=>$product->id,
                        'file'=>$path,
                        'title'=>$doc->getClientOriginalName()
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success'=>'Product added successfully.']);
        } catch(\Exception $e){
            DB::rollback();
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'category_id'=>'required',
            'brand_id'=>'nullable',
            'sizes'=>'nullable|array',
            'colors'=>'nullable|array',
            'images.*'=>'nullable|image|max:2048',
            'documents.*'=>'nullable|mimes:pdf|max:5120',
        ]);

        DB::beginTransaction();
        try {
            $product->update([
                'name'=>$request->name,
                'slug'=>Str::slug($request->name),
                'category_id'=>$request->category_id,
                'subcategory_id'=>$request->subcategory_id,
                'brand_id'=>$request->brand_id,
                'model'=>$request->model,
                'sizes'=>$request->sizes ? json_encode($request->sizes) : null,
                'colors'=>$request->colors ? json_encode($request->colors) : null,
                'description'=>$request->description,
                'specifications'=>$request->specifications,
                'status'=>$request->status ?? true,
            ]);

            // Upload new images
            if($request->hasFile('images')){
                foreach($request->file('images') as $img){
                    $path = $img->store('products/images','public');
                    ProductImage::create(['product_id'=>$product->id,'image'=>$path]);
                }
            }

            // Upload new documents
            if($request->hasFile('documents')){
                foreach($request->file('documents') as $doc){
                    $path = $doc->store('products/documents','public');
                    ProductDocument::create([
                        'product_id'=>$product->id,
                        'file'=>$path,
                        'title'=>$doc->getClientOriginalName()
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success'=>'Product updated successfully.']);
        } catch(\Exception $e){
            DB::rollback();
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }

    public function destroy(Product $product)
    {
        DB::beginTransaction();
        try {
            foreach($product->images as $image){
                Storage::disk('public')->delete($image->image);
                $image->delete();
            }
            foreach($product->documents as $doc){
                Storage::disk('public')->delete($doc->file);
                $doc->delete();
            }

            $product->delete();
            DB::commit();
            return response()->json(['success'=>'Product deleted successfully.']);
        } catch(\Exception $e){
            DB::rollback();
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }
}
