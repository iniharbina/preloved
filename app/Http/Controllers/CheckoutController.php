<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Carbon\Carbon;


class CheckoutController extends Controller
{


    public function process(Request $request)
{
    // Validasi input
    $request->validate([
        'id_produk' => 'required|integer|exists:product,id_produk',
        'harga' => 'required|numeric',
    ]);

    // Generate ID unik untuk order
    $uniqueId = time();

    // Buat transaksi di database
    $transaction = Transaction::create([
        'id_user' => Auth::user()->id_user,
        'id_order' => $uniqueId,
        'id_produk' => $request->id_produk,
        'harga' => $request->harga,
        'status_order' => 'Pending',
        'tanggal' => Carbon::now(),
    ]);

    // Konfigurasi Midtrans
    \Midtrans\Config::$serverKey = config('midtrans.serverKey');
    \Midtrans\Config::$isProduction = false;
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    // Parameter untuk Midtrans
    $params = array(
        'transaction_details' => array(
            'order_id' => $uniqueId,
            'gross_amount' => $request->harga,
        ),
        'customer_details' => array(
            'nama_customer' => Auth::user()->nama_customer,
            'email' => Auth::user()->email_customer,
        ),
    );

    // Generate Snap Token
    $snapToken = \Midtrans\Snap::getSnapToken($params);

    // Simpan Snap Token di database
    $transaction->snap_token = $snapToken;
    $transaction->save();

    // Redirect ke halaman checkout
    return redirect()->route('checkout', $transaction->id_order);
}

    public function checkout(Transaction $transaction)
    {
        $transaction->load('product');
        $product = Product::find($transaction->id_produk);

        return view('frontend.checkout',  compact('transaction', 'product'));
    }

    public function success(Transaction $transaction)
    {
        $transaction->status_order = 'Berhasil';
        $transaction->save();

        return view('frontend.success');
    }
}