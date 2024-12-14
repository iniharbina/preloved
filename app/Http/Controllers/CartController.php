<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('id_customer', Auth::id())->get(); // Mengambil item keranjang untuk user yang sedang login

        return view('frontend.cart', compact('cart'));
    }
    public function addToCart(Request $request)
    {
        // Validasi ID produk yang akan ditambahkan
        $request->validate([
            'product_id' => 'required|exists:products,id_produk'
        ]);

        // Menambahkan produk ke keranjang
        Cart::create([
            'id_customer' => Auth::id(), // Asumsi customer sudah login
            'id_product' => $request->product_id
        ]);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }
}
