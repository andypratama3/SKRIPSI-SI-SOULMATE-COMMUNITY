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
                @auth
                @if(Auth::User()->role == 1 && 2 )
                <a class="nav-link" href="{{ route('home') }}">Dashboard <span class="sr-only">(current)</span></a>
                @else
                <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                 <i class="fas fa-sign-out-alt"></i> Logout
             </a>
             <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                 {{ csrf_field() }}
             </form>
                @endif
                <a class="nav-link" href="{{ route('pemesanans.create') }}">Pesan <span class="sr-only">(current)</span></a>
                <a class="nav-link" href="{{ route('pemesanans.index') }}">Pesanan <span class="sr-only">(current)</span></a>
                @else
                <a class="nav-link" href="{{ route('login') }}">Login <span class="sr-only">(current)</span></a>
                @endauth
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <section class=" slider_section position-relative">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container slider_item-box">
              <div class="row pt-5">
                <div class="col-md-6">
                  <div class="slider-box-detail">
                    <h1>
                      Soulmate
                    </h1>
                    <p>
                        Sistem informasi penyedia layanan dance yang berlokasi di Samarinda!
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="slider_box-img">
                    <div class="slider_item_img-box">
                      <img src="{{ asset('AssetUser/images/dancer.png') }}" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>

    <!-- end slider section -->
  </div>

  <!-- about section -->

  <section class="about_section mt-3">
    <div class="container">
      <h2>
        Tentang Kami
      </h2>
      <div class="row">
        <div class="col-md-6">
          <div class="about-detail">
            <h3>
              Soulmate
            </h3>
            <p>
              Sistem informasi penyedia jasa dance yang berlokasi di Samarinda!
            </p>
            <div>
              <a href="">
                <div>
                  <span>
                    Read More
                  </span>
                  <span>
                    <img src="{{ asset('AssetUser/images/right.png') }}" alt="" style="width: 18px;">
                  </span>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="about-imge-box">
            <img src="{{ asset('AssetUser/images/about-img.jpg') }}" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->



  <!-- class section -->
  <section class="class_section py-5 my-5">
    <h2>
      Jenis Dance
    </h2>
    <div class="container  pb-5 ">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="mt-4 mx-auto mx-sm-0 mt-lg-0">
          <div class="class_img-box box-img-1">
            <a href="">
              Hip Hop Dance
            </a>
          </div>
        </div>
        <div class="mt-4 mx-auto mx-sm-0 mt-lg-0">
          <div class="class_img-box box-img-2">
            <a href="">
              Ballet Dance
            </a>
          </div>
        </div>
        <div class="mt-4 mx-auto mx-sm-0 mt-lg-0">
          <div class="class_img-box box-img-3">
            <a href="">
              Break Dance
            </a>
          </div>
        </div>
        <div class="mt-4 mx-auto mx-sm-0 mt-lg-0">
          <div class="class_img-box box-img-4">
            <a href="">
              Salsa Dance
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="class_section-btn">
      <a href="">
        <div>
          <span>
            Read More
          </span>
          <span>
            <img src="{{ asset('AssetUser/images/red-next.png') }}" alt="" style="width: 18px;">
          </span>
        </div>
      </a>
    </div>
  </section>

  <section class="container-fluid footer_section">
    <p>
      Copyright &copy; 2023
    </p>
  </section>
  <script type="text/javascript" src="{{ asset('AssetUser/js/jquery-3.4.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('AssetUser/js/bootstrap.js') }}"></script>

</body>

</html>
