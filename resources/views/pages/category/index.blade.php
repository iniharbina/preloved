@extends('layout')

@section('content')
<div class="container text-center mt-5">
    <h1>Kategori Produk</h1>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <img src="{{ asset('img/bajulk1.jpg') }}" class="card-img-top" alt="Laki-laki" style="height: 400px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Laki-laki</h5>
                    <p class="card-text">Temukan berbagai produk fashion untuk pria, mulai dari pakaian hingga aksesoris.</p>
                    <a href="{{ route('category.male') }}" class="btn btn-primary">Lihat Produk</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <img src="{{ asset('img/bajupr1.jpg') }}" class="card-img-top" alt="Perempuan" style="height: 400px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Perempuan</h5>
                    <p class="card-text">Temukan koleksi fashion untuk wanita, termasuk gaun dan aksesori.</p>
                    <a href="{{ route('category.female') }}" class="btn btn-primary">Lihat Produk</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
