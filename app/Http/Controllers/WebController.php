<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'subcategory', 'images']) // eager load images too
            ->inRandomOrder()
            ->take(25)
            ->get();
        // dd($products);
        return view('web.home', compact('products'));
    }


    public function aboutUs()
    {
        return view('web.about-us');
    }

    public function profile()
    {
        return view('web.company-profile');
    }
    public function certification()
    {
        return view('web.certification');
    }
    public function whyChose()
    {
        return view('web.why-choose');
    }

    public function partners()
    {
        return view('web.partners');
    }
    public function contacts()
    {
        return view('web.contacts');
    }
    public function projects()
    {
        return view('web.projects');
    }
    public function services()
    {
        return view('web.services');
    }

    public function test()
    {
        return view('web.test');
    }

    public function category()
    {
        $categories = Category::all();
        return view('web.category', compact('categories'));
    }

    public function byCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $catID = $category->id;
        $catName = $category->name;

        $products = Product::with(['category', 'subcategory', 'images'])
            ->where('category_id', $catID)
            ->get();

        // dd($products);

        return view('web.sub-category', compact('products', 'catID', 'catName'));
    }

    public function bySubCategory($slug)
    {
        $subcategory = Subcategory::where('slug', $slug)->firstOrFail();
        $catID = $subcategory->category_id;
        $category = Category::where('id', $catID)->firstOrFail();
        $subcatID = $subcategory->id;

        $catName = $category->name;
        $subcatName = $subcategory->name;

        $products = Product::with(['category', 'subcategory', 'images'])
            ->where('subcategory_id', $subcatID)
            ->get();

        // Pass both subcategory and products to the view
        return view('web.sub-category', compact('products', 'catID', 'subcatID', 'catName', 'subcatName'));
    }

    public function detail($slug)
    {
        $slug = $slug;
        $product = Product::with(['category', 'subcategory', 'images', 'documents', 'brand'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Fetch related products (same subcategory)
        $relatedProducts = Product::with(['category', 'subcategory', 'images', 'documents'])
            ->where('subcategory_id', $product->subcategory_id) // same subcategory
            ->where('id', '!=', $product->id) // exclude the current product
            ->take(10) // limit to 10 related products (adjust as needed)
            ->get();
        return view('web.product-details', compact('product', 'relatedProducts'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'category' => 'nullable|string',
            'query' => 'nullable|string|max:255',
        ]);

        $products = Product::query();

        if ($request->filled('category')) {
            if (str_starts_with($request->category, 'sub_')) {
                // Subcategory selected
                $subId = str_replace('sub_', '', $request->category);
                $products->where('subcategory_id', $subId);
            } else {
                // Category selected
                $products->where('category_id', $request->category);
            }
        }

        if ($request->filled('query')) {
            $products->where('name', 'like', '%' . $request->input('query') . '%');
        }

        $results = $products->get();

        dd($results);

        return view('web.search.results', compact('results'));
    }
}
