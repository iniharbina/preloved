@extends('admin.admin')

@section('content')
<br></br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Card for Category List -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="display: inline;">Daftar User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row mb-3">
                            <!-- Button to Add Category placed below the header -->
                            <div class="col">
                                <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-sm">
                                    Tambah User
                                </a>
                            </div>
                        </div>
                        @if ($user->isEmpty())
                            <p class="text-center">Belum ada user yang ditambahkan.</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama User</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Status</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($user as $usr)
                                    <tr>
                                        <td>{{ ($user->currentPage() - 1) * $user->perPage() + $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('user/' . $usr->foto) }}" alt="{{ $usr->nama_customer }}" style="width: 100px;">
                                        </td>
                                        <td>{{ $usr->nama_customer }}</td>
                                        <td>{{ $usr->email_customer }}</td>
                                        <td>{{ $usr->no_hp }}</td>
                                        <td>{{ $usr->status }}</td>
                                        <td>{{ ucfirst($usr->role) }}</td> 
                                        <td>
                                            <a href="{{ route('admin.user.edit', $usr->id_user) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('admin.user.destroy', $usr->id_user) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kategori ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end mt-3">
                                {{ $user->links('pagination::bootstrap-4') }}
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