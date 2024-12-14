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
    <!-- Header -->
    @include('frontend.partials.navbar')
    <!-- Close Header -->
    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Categories</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <!-- Link All untuk menampilkan semua produk -->
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="{{ route('shop.index') }}">
                            All
                        </a>
                    </li>
                    @foreach($category as $cat)
                        <li class="pb-3">
                            <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="{{ route('shop.category', ['id_kategori' => $cat->id_kategori]) }}">
                                {{ $cat->nama_kategori }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    @foreach ($product as $prod)
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <!-- Gambar produk -->
                                   <img class="card-img rounded-0 img-fluid" src="{{ url('product/' . $prod->gambar) }}" alt="{{ $prod->nama_produk }}">
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <li><a class="btn btn-success text-white mt-2" href="{{ route('shop.single', $prod->id_produk) }}"><i class="far fa-eye"></i></a></li>
                                            <li>
                                                <a class="btn btn-success text-white mt-2" href="{{ route('cart.add', ['id_produk' => $prod->id_produk]) }}">
                                                    <i class="fas fa-cart-plus"></i>
                                                </a>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="#" class="h3 text-decoration-none">{{ $prod->nama_produk }}</a>
                                    <p class="text-center mb-0">Rp{{ number_format($prod->harga, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div> <
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