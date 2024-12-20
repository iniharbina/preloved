<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with('category')->paginate(5);
        return view('admin.product.index', compact('product')); // Pastikan path view sesuai
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.product.create', compact('category')); // Pastikan path view sesuai
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_kategori' => 'required|integer|max:11',
            'nama_produk' => 'required|max:30',
            'harga' => 'required|integer',
            'merk' => 'required|string|max:15',
            'stok' => 'required|integer',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $gambar = $request->file('gambar');
        $gambarNama = $gambar->getClientOriginalName();
        $gambar->move(public_path('product'), $gambarNama);

        Product::create([
            'id_produk' => $request->id_produk,
            'id_kategori' => $request->id_kategori,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'merk' => $request->merk,
            'stok' => $request->stok,
            'gambar' => $gambarNama // Simpan path gambar
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show(Product $product)
    {
        return view('admin.product.show', compact('product')); 
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::all();

        return view('admin.product.edit', compact('product', 'category'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_kategori' => 'required|integer|max:11',
            'nama_produk' => 'required|max:30',
            'harga' => 'required|integer',
            'merk' => 'required|string|max:15',
            'stok' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048' // Gambar bersifat opsional pada update
        ]);
    
        $product = Product::findOrFail($id);

        $gambarNama = $product->gambar;
    
        // Jika gambar baru diupload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($product->gambar && Storage::exists('public/product/' . $product->gambar)) {
                // Menghapus gambar lama dari storage
                Storage::delete('public/product/' . $product->gambar);
            }

            $gambar = $request->file('gambar');
            $gambarNama = $gambar->getClientOriginalName();
            $path = $gambar->storeAs('product', $gambarNama, 'public');  // Menyimpan gambar
        }
    
        // Update data produk
        $product->update([
            'id_kategori' => $validatedData['id_kategori'],
            'nama_produk' => $validatedData['nama_produk'],
            'harga' => $validatedData['harga'],
            'merk' => $validatedData['merk'],
            'stok' => $validatedData['stok'],
            'gambar' => $gambarNama, // Jika gambar tidak diubah, tetap menggunakan nama gambar lama
        ]);
    
        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return redirect()->route('admin.product.index')->with('success', 'Produk berhasil dihapus.');
        } else {
            return redirect()->route('admin.product.index')->with('error', 'Produk tidak ditemukan.');
        }
    }
}
