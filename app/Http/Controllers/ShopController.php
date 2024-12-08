<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function index(){
        $product = Product::paginate(10);
        $category = Category::all();
        return view('frontend.shop', compact('product', 'category'));
    }
    
    public function showShop(Request $request, $id_kategori = null) {
        if ($id_kategori) {
            // Filter produk berdasarkan kategori
            $product = Product::where('id_kategori', $id_kategori)->paginate(10);
        } else {
            // Jika tidak ada kategori, tampilkan semua produk
            $product = Product::paginate(10);
        }
    
        $category = Category::all();
    
        return view('frontend.shop', compact('product', 'category', 'id_kategori'));
    }
    
    

}
