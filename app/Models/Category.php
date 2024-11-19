<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $primaryKey = 'id_kategori';
    protected $fillable = [
        'nama_kategori'
    ]; 
    public function products()
    {
        return $this->hasMany(Product::class, 'id_kategori');
    }
}