<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $primaryKey = 'id_kategori';

    protected $fillable = ['nama_kategori', 'id_kategori']; 

    public function product()
    {
        return $this->hasMany(Product::class, 'id_kategori');
    }
    public $timestamps = false;
}
