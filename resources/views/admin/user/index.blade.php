@extends('admin.admin')

@section('content')

    
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
