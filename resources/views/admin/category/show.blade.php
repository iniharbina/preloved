@extends('admin.admin')

@section('content')
    <br></br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Card untuk Menampilkan Produk Berdasarkan Kategori -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="display: inline;">Produk Kategori: {{ $category->nama_kategori }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if ($product->isEmpty())
                                <p class="text-center">Belum ada produk di kategori ini.</p>
                            @else
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Gambar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($product as $item)
                                        <tr>
                                            <td>{{ ($product->currentPage() - 1) * $product->perPage() + $loop->iteration }}</td>
                                            <td>{{ $item->nama_produk }}</td>
                                            <td>{{ $item->harga }}</td>
                                            <td>
                                                <img src="{{ asset('product/' . $item->gambar) }}" alt="{{ $item->nama_produk }}" style="width: 100px;">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end mt-3">
                                    {{ $product->links('pagination::bootstrap-4') }}
                                </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
