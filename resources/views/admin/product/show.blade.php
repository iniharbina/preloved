@extends('admin.admin')

@section('content')
    <div class="container">
        <h3>Detail Produk: {{ $product->name }}</h3>
        <div class="card mb-3">
            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <p class="card-text">Harga: Rp {{ number_format($product->price, 2) }}</p>
                <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
                <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
