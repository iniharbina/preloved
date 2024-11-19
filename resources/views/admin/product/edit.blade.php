@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>

    <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_kategori">Category</label>
            <select name="id_kategori" id="id_kategori" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id_kategori }}" {{ $category->id_kategori == $product->id_kategori ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nama_produk">Product Name</label>
            <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="{{ $product->nama_produk }}" required>
        </div>

        <div class="form-group">
            <label for="harga">Price</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ $product->harga }}" required>
        </div>

        <div class="form-group">
            <label for="merk">Brand</label>
            <input type="text" name="merk" id="merk" class="form-control" value="{{ $product->merk }}" required>
        </div>

        <div class="form-group">
            <label for="stok">Stock</label>
            <input type="number" name="stok" id="stok" class="form-control" value="{{ $product->stok }}" required>
        </div>

        <div class="form-group">
            <label for="gambar">Image</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
            @if($product->gambar)
                <img src="{{ asset('storage/' . $product->gambar) }}" width="100" height="
