<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    // Index ------------------------------------------------------------------
    public function index()
    {
        $products = Product::latest()->paginate(10);

        return view('products/index', compact('products'));
    }

    // Create ------------------------------------------------------------------
    public function create(): View
    {
        return view('products.create');
    }

    // Store ------------------------------------------------------------------
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        //upload
        $image = $request->file('image');
        $image->storeAs('public/images', $image->hashName());

        Product::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('products.index')->with(['success' => 'Product added successfully.']);
    }

    // View ------------------------------------------------------------------
    public function show(string $id): View
    {
        $product = Product::findOrFail($id);

        return view('products/show', compact('product'));
    }

    // Edit ------------------------------------------------------------------
    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);

        return view('products/edit', compact('product'));
    }

    // Update ------------------------------------------------------------------
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::delete('public/images/' . $product->image);

            $image = $request->file('image');
            $image->storeAs('public/images', $image->hashName());

            $product->image = $image->hashName();
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();

        return redirect()->route('products.index')->with(['success' => 'Product updated successfully.']);
    }

    // Delete All ------------------------------------------------------------------
    public function deleteAll(): RedirectResponse
    {
        // Ambil semua gambar produk
        $images = Product::pluck('image');

        // Hapus setiap gambar dari penyimpanan
        foreach ($images as $image) {
            Storage::delete('public/images/' . $image);
        }

        // Potong tabel produk
        Product::truncate();

        return redirect()->route('products.index')->with(['success' => 'All products and images deleted successfully.']);
    }

    // Delete ------------------------------------------------------------------
    public function destroy(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);

        // Delete the product image from storage
        Storage::delete('public/images/' . $product->image);

        // Delete the product from the database
        $product->delete();

        return redirect()->route('products.index')->with(['success' => 'Product deleted successfully.']);
    }
}
