<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Registrasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <style type="text/css">
    body{
      background: #F8F9FA;
    }
  </style>
</head>
<body>

<section class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="text-center mb-3">
              <a href="#!">
                <img src="{{ asset('img/logo contoh.png') }}" width="100">
              </a>
            </div>
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Registrasi dulu yaa</h2>
            <form method="POST" action="{{ route('register.post') }}">
              @csrf

              @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
              @endif

              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('nama_customer') is-invalid @enderror" name="nama_customer" id="nama_customer" placeholder="Nama" value="{{ old('nama_customer') }}" required>
                    <label for="nama" class="form-label">{{ __('Nama') }}</label>
                  </div>
                  @error('nama')
                    <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email_customer') is-invalid @enderror" name="email_customer" id="email_customer" placeholder="Email" value="{{ old('email_customer') }}" required>
                    <label for="email" class="form-label">{{ __('Alamat Email') }}</label>
                  </div>
                  @error('email')
                    <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="" placeholder="Password" required>
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                  </div>
                  @error('password')
                    <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" value="" placeholder="Konfirmasi Password" required>
                    <label for="password_confirmation" class="form-label">{{ __('Konfirmasi Password') }}</label>
                  </div>
                  @error('password_confirmation')
                    <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button class="btn btn-primary btn-lg" type="submit">{{ __('Daftar') }}</button>
                  </div>
                </div>
                <div class="col-12">
                  <p class="m-0 text-secondary text-center">Sudah punya akun? <a href="{{ route('login') }}" class="link-primary text-decoration-none">Masuk</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>
