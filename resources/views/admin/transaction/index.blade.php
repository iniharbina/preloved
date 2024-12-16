@extends('admin.admin')

@section('content')
<br></br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title" style="display: inline;">Data Transaksi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if ($transactions->isEmpty())
                            <p class="text-center">Belum ada transaksi yang ditambahkan.</p>
                        @else
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Nama Customer</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $trans)
                                        <tr>
                                            <td>{{ ($transactions->currentPage() - 1) * $transactions->perPage() + $loop->iteration }}</td>
                                            
                                            <!-- Nama Produk -->
                                            <td>
                                                <img src="{{ $trans->product ? asset('product/' . $trans->product->gambar) : '' }}" alt="{{ $trans->product ? $trans->product->nama_produk : 'No Image' }}" style="width: 50px; height: auto; margin-right: 10px;">
                                                {{ $trans->product ? $trans->product->nama_produk : 'Produk tidak ditemukan' }}
                                            </td>

                                            <!-- Nama Customer -->
                                            <td>
                                                {{ $trans->user ? $trans->user->nama_customer : 'User tidak ditemukan' }}
                                            </td>

                                            <!-- Harga Produk -->
                                            <td>Rp{{ number_format($trans->harga, 0, ',', '.') }}</td>
                                            
                                            <!-- Status -->
                                            <td>
                                                @if ($trans->status_order == 'Pending')
                                                    <span class="badge bg-warning text-dark">{{ $trans->status_order }}</span>
                                                @elseif ($trans->status_order == 'Berhasil')
                                                    <span class="badge bg-success">{{ $trans->status_order }}</span>
                                                @else
                                                    <span class="badge bg-danger">{{ $trans->status_order }}</span>
                                                @endif
                                            </td>
                                            
                                            <!-- Tanggal -->
                                            <td>
                                                @if ($trans->tanggal)
                                                    {{ \Carbon\Carbon::parse($trans->tanggal)->format('d M Y H:i') }}
                                                @else
                                                    Tanggal tidak tersedia
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end mt-3">
                                {{ $transactions->links('pagination::bootstrap-4') }}
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
