<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        // Mengambil transaksi dengan eager loading untuk produk dan user
        $transactions = Transaction::with(['product', 'user'])->paginate(10);

        // Mengirimkan data transaksi ke view admin
        return view('admin.transaction.index', compact('transactions'));
    }

}
