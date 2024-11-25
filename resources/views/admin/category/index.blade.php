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
                        <h3 class="card-title" style="display: inline;">Daftar Kategori</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row mb-3">
                            <!-- Button to Add Category placed below the header -->
                            <div class="col">
                                <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-sm">
                                    Tambah Kategori
                                </a>
                            </div>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($category->isEmpty())
                            <p class="text-center">Belum ada kategori yang ditambahkan.</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($category as $cat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cat->nama_kategori }}</td>
                                        <td>
                                            <a href="{{ route('admin.category.edit', $cat->id_kategori) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('admin.category.destroy', $cat->id_kategori) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kategori ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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