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

    public function notification(Request $request)
    {
        // Buat instance Notification dari Midtrans
        $notification = new \Midtrans\Notification();

        // Cari transaksi berdasarkan order_id
        $transaction = Transaction::where('id_order', $notification->order_id)->first();

        if ($transaction) {
            // Ambil status dari notifikasi Midtrans
            $transactionStatus = $notification->transaction_status;

            // Update status transaksi di database
            if ($transactionStatus == 'settlement') {
                $transaction->status_order = 'Berhasil';
            } elseif ($transactionStatus == 'pending') {
                $transaction->status_order = 'Pending';
            } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
                $transaction->status_order = 'Gagal';
            }

            $transaction->save(); // Simpan perubahan ke database
        }

        return response()->json(['message' => 'Notification processed successfully']);
    }

}