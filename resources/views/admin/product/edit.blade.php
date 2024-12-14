@extends('admin.admin')

@section('content')
<br></br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Produk</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product.update', $product->id_produk) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_kategori">Kategori</label>
                                    <select name="id_kategori" id="id_kategori" class="form-control">
                                        @foreach ($category as $category)
                                            <option value="{{ $category->id_kategori }}" {{ $product->id_kategori == $category->id_kategori ? 'selected' : '' }}>
                                                {{ $category->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="{{ old('nama_produk', $product->nama_produk) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga', $product->harga) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="merk">Merk</label>
                                    <input type="text" name="merk" id="merk" class="form-control" value="{{ old('merk', $product->merk) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="number" name="stok" id="stok" class="form-control" value="{{ old('stok', $product->stok) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="gambar" id="gambar" class="form-control" accept=".jpg,.jpeg,.png">
                                            <label class="custom-file-label" for="gambar">Pilih file</label>
                                        </div>
                                    </div>
                                    @if($product->gambar)
                                        <img src="{{ asset('product/' . $product->gambar) }}" width="100" height="100" class="mt-2">
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fileInput = document.getElementById('gambar');
        const fileLabel = document.querySelector('.custom-file-label');

        fileInput.addEventListener('change', function () {
            const fileName = this.files[0].name;
            fileLabel.textContent = fileName;
        });
    });
</script>
