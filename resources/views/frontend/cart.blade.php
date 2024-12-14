<!DOCTYPE html>
<html lang="en">

<head>
    <title>Noviara Preloved - Product Listing Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{asset('img/apple-icon.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/templatemo.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    @include('frontend.partials.navbar')

    <div class="container my-5">
        <div class="bg-white rounded shadow p-4">
            <h2 class="text-center fw-bold mb-4">Keranjang Belanja Anda</h2>

            <!-- Pesan sukses jika ada -->
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                </div>
            @endif

            <!-- Jika keranjang kosong -->
            @if($cart->isEmpty())
                <div class="text-center py-5">
                    <p class="fs-5">Keranjang Anda kosong. Yuk, mulai belanja sekarang!</p>
                    <a href="{{ route('shop.index') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-shopping-cart me-2"></i> Mulai Belanja
                    </a>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/' . $item->product->image) }}" 
                                                 alt="produk" 
                                                 class="img-thumbnail" 
                                                 style="width: 80px; height: 80px;">
                                            <span class="ms-3">{{ $item->product->nama_produk }}</span>
                                        </div>
                                    </td>
                                    <td>Rp{{ number_format($item->product->harga, 0, ',', '.') }}</td>
                                    <td>
                                        <form action="{{ route('cart.remove', $item->id_cart) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt me-1"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Tombol checkout -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('shop.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali Belanja
                    </a>
                    <a href="{{ route('checkout.index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-right me-2"></i> Lanjutkan ke Checkout
                    </a>
                </div>
            @endif
        </div>
    </div>
    <!-- End Content -->

    <!-- Start Footer -->
    @include('frontend.partials.footer')
    <!-- End Footer -->
    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>