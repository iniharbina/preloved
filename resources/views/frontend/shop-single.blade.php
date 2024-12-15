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
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <img class="card-img img-fluid" 
                                     src="{{ asset('product/' . $product->gambar) }}" 
                                     alt="{{ $product->nama_produk }}">
                            </div>
                        </div>
                    </div>                                       
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{ $product->nama_produk }}</h1>  <!-- Menampilkan nama produk -->
                            <p class="h3 py-2">Rp{{ number_format($product->harga, 0, ',', '.') }}</p>  <!-- Menampilkan harga produk -->
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Brand:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{ $product->merk }}</strong></p>  <!-- Menampilkan merk produk -->
                                </li>
                            </ul>

                            <div class="d-flex justify-content-start gap-3 mt-4">
                                <!-- Tombol WhatsApp -->
                                <a href="https://wa.me/6283831913249?text={{ urlencode('Saya ingin melakukan checkout untuk produk ' . $product->nama_produk . ' dengan harga Rp' . number_format($product->harga, 0, ',', '.')) }}" 
                                   class="btn btn-success d-flex align-items-center" role="button" style="width: 150px; justify-content: center;">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" style="width: 24px; height: 24px; margin-right: 10px;">
                                    WhatsApp
                                </a>
                
                                <!-- Form Checkout -->
                                <form action="{{ route('checkout-process') }}" method="GET">
                                    @csrf
                                    <input type="hidden" name="id_order" value="{{ rand() }}">
                                    <input type="hidden" name="id_produk" value="{{ $product->id_produk }}">
                                    <input type="hidden" name="harga" value="{{ $product->harga }}">
                
                                    <button type="submit" class="btn btn-success d-flex align-items-center" style="width: 150px; justify-content: center;">
                                        Checkout
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

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

    <!-- Start Slider Script -->
    <script src="assets/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <!-- End Slider Script -->

</body>

</html>