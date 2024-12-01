<!DOCTYPE html>
<html lang="en">

<head>
    <title>TOKO PRELOVED</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{asset('img/apple-icon.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/templatemo.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
</head>

<body>
    <!-- Header -->
    @include('frontend.partials.navbar')
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./asset/img/banner_img_01.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Noviara</b> Preloved</h1>
                                <h3 class="h2">Welcome to Noviara Preloved</h3>
                                <p>
                                    Selamat datang di Noviara Preloved, destinasi Anda untuk menemukan fashion preloved berkualitas tinggi dengan harga terjangkau!
                                    Di sini, kami percaya bahwa setiap barang memiliki cerita dan potensi baru untuk dicintai.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="{{asset('img/baju1.jpg')}}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">About Us</h1>
                                <h3 class="h2">Why Choose Noviara Preloved?</h3>
                                <p>
                                    Noviara Preloved adalah toko online yang menawarkan koleksi fashion preloved berkualitas dengan harga terjangkau. Kami berkomitmen
                                    untuk mempromosikan gaya hidup berkelanjutan dengan menyediakan pakaian dan aksesori yang telah melewati seleksi ketat. Temukan berbagai
                                    gaya unik yang siap untuk dicintai kembali.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="{{asset('img/baju2.jpeg')}}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">How To Shop?</h1>
                                <h3 class="h2">Enjoy a Fun Shopping Experience </h3>
                                <p>
                                    Jelajahi Koleksi: Lihat berbagai kategori dan temukan item yang sesuai dengan gaya Anda.
                                </p>
                                <p>
                                    Tambahkan ke Keranjang: Setelah menemukan barang yang Anda sukai, cukup tambahkan ke keranjang belanja.
                                </p>
                                <p>
                                    Checkout: Ikuti langkah-langkah mudah untuk menyelesaikan pembelian Anda.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->

    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categories</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 p-5 mt-3 d-flex flex-column align-items-center">
                <img src="{{asset('img/baju3.jpeg')}}" class="rounded-circle img-fluid border" style="width: 300px; height: 300px; object-fit: cover;"></a>
                <h5 class="text-center mt-3 mb-3">Baju</h5>
            </div>
            <div class="col-12 col-md-6 p-5 mt-3 d-flex flex-column align-items-center">
                <img src="{{asset('img/baju4.jpg')}}" class="rounded-circle img-fluid border" style="width: 300px; height: 300px; object-fit: cover;"></a>
                <h5 class="text-center mt-3 mb-3">Celana</h5>
            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->

    <!-- Start Footer -->
    @include('frontend.partials.footer')
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/templatemo.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <!-- End Script -->
</body>

</html>
