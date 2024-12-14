@extends('admin.admin')

@section('content')
<br></br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit User</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.user.update', $user->id_user) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_customer">Nama User</label>
                                    <input type="text" name="nama_customer" id="nama_customer" class="form-control" value="{{ old('nama_customer', $user->nama_customer) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email_customer">Email</label>
                                    <input type="email" name="email_customer" id="email_customer" class="form-control" value="{{ old('email_customer', $user->email_customer) }}" required>
                                    @error('email_customer')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password Baru (Opsional)</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password baru jika ingin mengubah">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Password Baru</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Masukkan ulang password baru">
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No HP</label>
                                    <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp', $user->no_hp) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="foto" id="foto" class="form-control" accept=".jpg,.jpeg,.png">
                                            <label class="custom-file-label" for="foto">Pilih file</label>
                                        </div>
                                    </div>
                                    @if($user->foto)
                                        <img src="{{ asset('user/' . $user->foto) }}" width="100" height="100" class="mt-2">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="aktif" {{ $user->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="non-aktif" {{ $user->status == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" id="role" class="form-control" required>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
                                    </select>
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
        const fileInput = document.getElementById('foto');
        const fileLabel = document.querySelector('.custom-file-label');

        fileInput.addEventListener('change', function () {
            const fileName = this.files[0].name;
            fileLabel.textContent = fileName;
        });
    });
</script>