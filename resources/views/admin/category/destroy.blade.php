@extends('admin.admin')

@section('content')
<br></br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Card for Show Category -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Detail Kategori</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <p>{{ $category->nama_kategori }}</p>
                        </div>

                        <!-- Delete Button -->
                        <form action="{{ route('admin.category.destroy', $category->id_kategori) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kategori ini?')">Hapus Kategori</button>
                        </form>

                        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection
