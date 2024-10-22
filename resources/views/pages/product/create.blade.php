@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Tambah Produk Baru</h2>
        <div class="card shadow-sm p-4">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Produk</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
