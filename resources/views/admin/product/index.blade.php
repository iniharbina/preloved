@extends('admin.admin')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Produk</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <div class="card mx-auto" style="max-width: 1200px;">
        <div class="card-body">
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>
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
                        @foreach ($product as $prod)
                        <tr>
                            <td>{{ ($product->currentPage() - 1) * $product->perPage() + $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('product/' . $prod->gambar) }}" alt="{{ $prod->nama_produk }}" style="width: 100px;">
                            </td>
                            <td>{{ $prod->category->nama_kategori ?? 'Kategori tidak ditemukan'}}</td>
                            <td>{{ $prod->nama_produk }}</td>
                            <td>{{ $prod->merk }}</td>
                            <td>{{ $prod->harga }}</td>
                            <td>{{ $prod->stok }}</td>
                            <td>
                                <a href="{{ route('admin.product.edit', $prod) }}" class="btn btn-warning btn-custom">Edit</a>
                                <form id="deleteForm{{ $prod->id_produk }}" action="{{ route('admin.product.destroy', $prod) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-custom">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-3">
                    {{ $product->links('pagination::bootstrap-4') }}
                </div>
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
        .pagination {
        font-size: 12px !important;
        padding: 5px !important;
        }
        .pagination .page-item .page-link {
            padding: 3px 8px !important;
            font-size: 12px !important;
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
                "paging": false,
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
