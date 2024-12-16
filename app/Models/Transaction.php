<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    protected $primaryKey = 'id_order';
    public $timestamps = false;

    public $fillable = [
        'id_order',
        'id_user',
        'id_produk',
        'harga',
        'status_order',
        'tanggal',
        'snap_token',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produk', 'id_produk');
    }

}