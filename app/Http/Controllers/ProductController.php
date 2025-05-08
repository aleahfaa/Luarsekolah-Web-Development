<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Contoh di ProductController.php
    public function cleaningProducts(Request $request)
    {
        $search = $request->input('search');

        $products = Product::where('category', 'Cleaning Products')
            ->when($search, function($query) use ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%$search%")
                      ->orWhere('description', 'like', "%$search%");
                });
            })
            ->get();

        return view('cleaning-products', compact('products'));
    }

    public function fashionProducts(Request $request)
    {
        $search = $request->input('search');
        
        $products = Product::where('category', 'Fashion')
            ->when($search, function($query) use ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%$search%")
                      ->orWhere('description', 'like', "%$search%");
                });
            })
            ->get();

        return view('fashion', compact('products'));
    }

    public function homeGoods(Request $request)
    {
        $search = $request->input('search');
        
        $products = Product::where('category', 'Home Goods')
            ->when($search, function($query) use ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%$search%")
                      ->orWhere('description', 'like', "%$search%");
                });
            })
            ->get();

        return view('home-goods', compact('products'));
    }


    // admin

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }


    public function create(Request $request)
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string',
            'category' => 'required|string',
            'price' => 'required|decimal:2',
            'store' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/products'), $imageName);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'price' => $request->price,
            'store' => $request->store,
            'image_path' => 'images/products/' . $imageName,
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product) abort(404, "product not found");
        return view('admin.products.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string',
            'price' => 'required|decimal:2',
            'category' => 'required|string',
            'store' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'price','category', 'store']);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/products'), $imageName);
            $data['image_path'] = 'images/products/' . $imageName;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
