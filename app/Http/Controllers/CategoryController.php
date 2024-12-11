<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all(); // Ambil semua kategori
        return view('admin.category.index', compact('category')); // Pastikan path view sesuai
    }

    public function create()
    {
        $product = Product::all(); // Ambil semua produk (jika perlu dihubungkan)
        return view('admin.category.create', compact('product'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|max:10',
        ]);

        // Simpan kategori baru
        Category::create($validatedData);

        return redirect()->route('admin.category.index')->with('success', 'Category berhasil ditambahkan!');
    }

    public function show($id_kategori)
    {
        $category = Category::where('id_kategori', $id_kategori)->first();

        if (!$category) {
            abort(404, 'Kategori tidak ditemukan');
        }

        $product = Product::where('id_kategori', $id_kategori)->paginate(5);

        return view('admin.category.show', compact('category', 'product'));
    }

    public function edit(Category $category)
    {
        $product = Product::all(); // Ambil semua produk (jika diperlukan)
        return view('admin.category.edit', compact('category', 'product'));
    }

    public function update(Request $request, $id_kategori)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|max:255',
        ]);

        // Update data kategori
        $category = Category::findOrFail($id_kategori);

        $category->update([
            'nama_kategori' => $validatedData['nama_kategori'],
        ]);
    

        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
