<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart'; // Sesuaikan dengan nama tabel Anda

    protected $fillable = ['id_customer', 'id_produk']; // Sesuaikan dengan kolom yang ada di tabel

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produk');
    }
}
