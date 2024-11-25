@extends('admin.admin')

@section('content')
<h1 class="ml-5">Edit Produk</h1>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- full-width column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="float-right">
                            <button onclick="location.href='{{ route('admin.product.index') }}'" class="btn btn-dark btn-sm">
                                <i class="fas fa-reply mr-2"></i>Kembali
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.product.update', $product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <!-- Left Column -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id_kategori">Kategori</label>
                                        <select name="id_kategori" id="id_kategori" class="form-control">
                                            @foreach ($category as $category)
                                                <option value="{{ $category->id_kategori }}" {{ $product->id_kategori == $category->id_kategori ? 'selected' : '' }}>{{ $category->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_produk">Nama Produk</label>
                                        <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="{{ $product->nama_produk }}" placeholder="Masukkan nama produk" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="number" name="harga" id="harga" class="form-control" value="{{ $product->harga }}" placeholder="Masukkan harga produk" required>
                                    </div>
                                </div>
                                <!-- Right Column -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="merk">Merk</label>
                                        <input type="text" name="merk" id="merk" class="form-control" value="{{ $product->merk }}" placeholder="Masukkan merk produk" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="stok">Stok</label>
                                        <input type="number" name="stok" id="stok" class="form-control" value="{{ $product->stok }}" placeholder="Masukkan jumlah stok" required>
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
                                            <img src="{{ asset('storage/product/' . $product->gambar) }}" width="100" height="100" class="mt-2">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-left">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
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
