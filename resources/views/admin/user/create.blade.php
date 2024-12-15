@extends('admin.admin')

@section('content')
<br></br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Full-width column -->
            <div class="col-md-12">
                <!-- General form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah User</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- Form start -->
                    <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_customer">Nama User</label>
                                <input type="text" name="nama_customer" id="nama_customer" class="form-control" placeholder="Masukkan nama user" required>
                            </div>
                            <div class="form-group">
                                <label for="email_customer">Email</label>
                                <input type="email" name="email_customer" id="email_customer" class="form-control" placeholder="Masukkan email user" required>
                                @error('email_customer')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Masukkan ulang password" required>
                            </div>                            
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan no hp" required>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="foto" id="foto" class="form-control" accept=".jpg,.jpeg,.png" required>
                                        <label class="custom-file-label" for="foto">Pilih file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-control" required>
                                    <option value="admin">Admin</option>
                                    <option value="customer">Customer</option>
                                </select>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fileInput = document.getElementById('foto');
        const fileLabel = document.querySelector('.custom-file-label');

        fileInput.addEventListener('change', function () {
            const fileName = this.files[0].name;
            fileLabel.textContent = fileName;
        });
    });
</script>