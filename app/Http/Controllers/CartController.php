<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('id_customer', Auth::id())->get(); 

        return view('frontend.cart', compact('cart'));
    }
    public function add(Request $request)
    {
        // Validasi ID produk yang akan ditambahkan
        $request->validate([
            'id_produk' => 'required|exists:product,id_produk'
        ]);
        // Cek apakah produk sudah ada di keranjang user
        $existingCart = Cart::where('id_produk', $request->id_produk)
                            ->where('id_customer', auth()->id())
                            ->first();

        if ($existingCart) {
            return redirect()->back()->with('success', 'Produk sudah ada di keranjang.');
        }

        // Tambahkan produk ke keranjang
        Cart::create([
            'id_customer' => auth()->id(),
            'id_produk' => $request->id_produk,
        ]);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }
}
