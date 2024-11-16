@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Daftar Produk</h2>
        <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($product->description, 80) }}</p>
                            <p class="card-text"><strong>Harga: </strong>Rp {{ number_format($product->price, 2) }}</p>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-info">Lihat Detail</a>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
