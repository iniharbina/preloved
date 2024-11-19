@extends('admin.admin')

@section('content')
    <h1>Create Product</h1>

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="id_kategori">Kategori</label>
            <select name="id_kategori" id="id_kategori" class="form-control">
                @foreach ($category as $category)
                    <option value="{{ $category->id_kategori }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="merk">Merk</label>
            <input type="text" name="merk" id="merk" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Tambah Produk</button>
    </form>
@endsection
