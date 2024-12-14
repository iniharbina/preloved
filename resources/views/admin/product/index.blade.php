@extends('admin.admin')

@section('content')
<br></br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Card for Product List -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="display: inline;">Daftar Produk</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row mb-3">
                            <!-- Button to Add Product placed below the header -->
                            <div class="col">
                                <a href="{{ route('admin.product.create') }}" class="btn btn-primary btn-sm">
                                    Tambah Produk
                                </a>
                            </div>
                        </div>
                        @if ($product->isEmpty())
                            <p class="text-center">Belum ada produk yang ditambahkan.</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Kategori</th>
                                        <th>Nama Produk</th>
                                        <th>Merk</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($product as $prod)
                                    <tr>
                                        <td>{{ ($product->currentPage() - 1) * $product->perPage() + $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('product/' . $prod->gambar) }}" alt="{{ $prod->nama_produk }}" style="width: 100px;">
                                        </td>
                                        <td>{{ $prod->category->nama_kategori ?? 'Kategori tidak ditemukan' }}</td>
                                        <td>{{ $prod->nama_produk }}</td>
                                        <td>{{ $prod->merk }}</td>
                                        <td>{{ $prod->harga }}</td>
                                        <td>{{ $prod->stok }}</td>
                                        <td>
                                            <a href="{{ route('admin.product.edit', $prod->id_produk) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('admin.product.destroy', $prod->id_produk) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                                            </form>
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
