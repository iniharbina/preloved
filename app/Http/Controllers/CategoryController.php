<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product; // Pastikan ini ada
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Mengambil semua produk dari database
        return view('pages.category.index', compact('products')); // Mengirim produk ke view
    }

    public function showMaleCategory()
    {
        $products = Product::where('category_id', 1)->get(); // Ambil produk untuk kategori laki-laki
        return view('pages.products.index', compact('products'));
    }

    public function showFemaleCategory()
    {
        $products = Product::where('category_id', 2)->get(); // Ambil produk untuk kategori perempuan
        return view('pages.products.index', compact('products'));
    }
}
