@extends('admin.admin')

@section('content')

    <h1 class="ml-5">Daftar Produk</h1>
    <!-- Menampilkan Notifikasi -->
    @if(session('success'))
        <div class="alert alert-success mt-3" id="successAlert">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger mt-3" id="errorAlert">
            {{ session('error') }}
        </div>
    @endif

    <div class="card mx-auto" style="max-width: 1200px;">
        <div class="card-body">
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>
            <div class="table-responsive">
                <table id="productTable" class="table table-bordered table-hover">
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
                        @foreach ($product as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('storage/product/' . $product->gambar) }}" alt="{{ $product->nama_produk }}" width="100" height="100">
                            </td>
                            <td>{{ $product->category->nama_kategori ?? 'Kategori tidak ditemukan'}}</td>
                            <td>{{ $product->nama_produk }}</td>
                            <td>{{ $product->merk }}</td>
                            <td>{{ $product->harga }}</td>
                            <td>{{ $product->stok }}</td>
                            <td>
                                <a href="{{ route('admin.product.edit', $product) }}" class="btn btn-warning btn-custom">Edit</a>
                                <form id="deleteForm{{ $product->id_produk }}" action="{{ route('admin.product.destroy', $product) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-custom">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

    <!-- Styling untuk Notifikasi -->
    <style>
        .alert {
            width: 100%; /* Lebar notifikasi sama dengan tabel, dengan padding */
            margin: 0 auto;
            text-align: center;
            font-size: 16px;
        }
        .btn-custom {
        width: 100px; /* Atur lebar tombol sesuai kebutuhan */
        }
    </style>
@endpush

@push('scripts')
    <!-- DataTables -->
    <script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#productTable').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "paging": true,
                "searching": true,
                "ordering": true,
            });

            // Menutup notifikasi otomatis setelah 3 detik
            setTimeout(function() {
                $('#successAlert, #errorAlert').fadeOut('slow');
            }, 1000);  // Waktu 3 detik (3000 milidetik)
        });
    </script>
@endpush
