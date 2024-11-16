@extends('layout')

@section('content')
    <div class="container">
        <h3 align="center">Kategori Perempuan</h3>
        <div class="row">
            @foreach($products as $product)
                @if($product->category == 'perempuan')
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
