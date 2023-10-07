<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SOULMATE</title>
    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('AssetUser/css/bootstrap.css') }}" />

    <!-- fonts style -->
    <link href="//fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700|Roboto:300,400,700&display=swap"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('AssetUser/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('AssetUser/css/responsive.css') }}" rel="stylesheet" />
</head>

<body>

    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
          <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
              <a class="navbar-brand" href="#">
                SOULMATE
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mr-2">
                  <li class="nav-item active">
                        <a class="nav-link" href="{{ route('homepage') }}">Dashboard <span class="sr-only">(current)</span></a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </header>
    </div>

    <!-- about section -->

    <section class="about_section mt-3">
        @if (Auth::user()->role == 1)
        <section class="section">
            <div class="section-header">
                <a href="{{ route('pemesanans.create') }}" class="btn btn-primary">Kembali</a>
                <h1>Pemesanans</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        @include('pemesanans.table')
                    </div>
                </div>
            </div>
        </section>
        @else
        <section class="section">
            <div class="section-header">
                <h1>Pemesananmu</h1>
                <div class="section-header-breadcrumb">
                    <a href="{{ route('homepage')}}" class="btn btn-danger form-btn">Kembali <i
                        class="fas fa-arrow-left "></i></a>
                    <a href="{{ route('pemesanans.create')}}" class="btn btn-primary form-btn">Pesan <i
                            class="fas fa-plus"></i></a>
                </div>
            </div>
            <div class="section-body mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="pemesanans-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Genre</th>
                                        <th>Waktu Pemesanan</th>
                                        <th>Lokasi</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pemesanans as $pemesanan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pemesanan->Genre->nama_genre }}</td>
                                        <td>{{ date("d F Y", strtotime($pemesanan->waktu_pemesanan)) }}</td>
                                        <td>{{ $pemesanan->lokasi }}</td>
                                        <td>
                                            @if ($pemesanan->status == 1)
                                            <span class="badge badge-warning">Menunggu Di Verifikasi</span>
                                            @elseif ($pemesanan->status == 2)
                                            <span class="badge badge-primary">Pencarian Tim Dance</span>
                                            @elseif ($pemesanan->status == 3)
                                            <span class="badge badge-success">Selesai</span>
                                            @elseif ($pemesanan->status == 0)
                                            <span class="badge badge-warning">Belum Dibayar</span>
                                            @else
                                            <span class="badge badge-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td class=" text-center">
                                            <div class='btn-group'>
                                                <a href="{!! route('pemesanans.show', [$pemesanan->id]) !!}"
                                                    class='btn btn-info action-btn '><i class="fa fa-eye"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @section('js')
                        <script>
                            $('#pemesanans-table').DataTable();
                        </script>
                        @endsection
                    </div>
                </div>
            </div>
        </section>
        @endif
    </section>
    <!-- end about section -->





    <section class="container-fluid footer_section">
        <p>
            Copyright &copy; 2023
        </p>
    </section>
    <script type="text/javascript" src="{{ asset('AssetUser/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('AssetUser/js/bootstrap.js') }}"></script>

</body>

</html>
