<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $primaryKey = 'id_produk';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'id_produk',
        'id_kategori',
        'nama_produk',
        'harga',
        'merk',
        'stok',
        'gambar'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_kategori');
    }
}
