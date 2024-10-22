<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('pages.products.index', compact('products')); // Pastikan path view sesuai
    }

    public function create()
    {
        return view('pages.products.create'); // Pastikan path view sesuai
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product')); 
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            Storage::disk('public')->delete($product->image);

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath; // Update gambar ke produk
        }

        $product->update($request->only('name', 'description', 'price'));

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        // Hapus gambar produk sebelum dihapus dari database
        Storage::disk('public')->delete($product->image);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}
