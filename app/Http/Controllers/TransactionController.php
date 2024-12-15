<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        // Mengambil transaksi dengan eager loading relasi produk
        $transactions = Transaction::with('product')->where('id_user', Auth::user()->id_user)->get();
        
        return view('frontend.transaction', compact('transactions'));
    }

    // app/Models/Transaction.php

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produk', 'id_produk');
    }

}