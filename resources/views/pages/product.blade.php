@extends('layout')

@section('content')
    <div class="container">
        <h3>{{ $product->name }}</h3>
        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid">
        <p>{{ $product->description }}</p>
        <p>Harga: Rp {{ number_format($product->price, 2) }}</p>
        <a href="{{ url('/category') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
