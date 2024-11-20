@extends('admin.admin')

@section('content')
<br></br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- full-width column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Produk</h3>
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
                                            <img src="{{ asset('storage/' . $product->gambar) }}" width="100" height="100" class="mt-2">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
