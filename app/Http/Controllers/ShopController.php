<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function index(){
        $product = Product::all();
        return view('shop', compact('product'));
    }
}
