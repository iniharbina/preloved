<!DOCTYPE html>
<html lang="en">

<head>
    <title>Noviara Preloved - Checkout</title>
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
        <div class="row">
            <div class="col-md-12">
                <h1>Transaksi</h1>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transactions as $trans)
                                        <tr>
                                            <td>{{ $trans->product ? $trans->product->nama_produk : 'Produk tidak ditemukan' }}</td>
                                            <td>Rp{{ number_format($trans->product ? $trans->product->harga : 0, 0, ',', '.') }}</td>
                                            <td>
                                                @if ($trans->status_order == 'Pending')
                                                    <span class="badge bg-warning text-dark">{{ $trans->status_order }}</span>
                                                @elseif ($trans->status_order == 'Berhasil')
                                                    <span class="badge bg-success">{{ $trans->status_order }}</span>
                                                @else
                                                    <span class="badge bg-danger">{{ $trans->status_order }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($trans['status_order'] == 'Pending')
                                                    <form action="{{ route('checkout-process') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $trans['id_order'] }}">
                                                        <input type="hidden" name="id_produk" value="{{ $trans->product->id_produk }}">
                                                        <input type="hidden" name="harga" value="{{ $trans->product->harga }}">
                                                    </form>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($trans->tanggal)
                                                    {{ \Carbon\Carbon::parse($trans->tanggal)->format('d M Y H:i') }}
                                                @else
                                                    Tanggal tidak tersedia
                                                @endif
                                            </td>                                            
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada transaksi</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
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