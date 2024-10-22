@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Produk</h2>
        <div class="card shadow-sm p-4">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Produk</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
