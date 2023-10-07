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

            </nav>
          </div>
        </header>
    </div>
    <!-- about section -->

    <section class="about_section mt-3">
        <div class="container">
            <a href="{{ route('homepage') }}" class="btn btn-warning">Kembali</a>
            <a href="{{ route('pemesanans.index') }}" class="btn btn-primary float-right">Pesanan</a>
            <h2>
                Pemesanan Dance
            </h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        @include('stisla-templates::common.errors')
                        <div class="section-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body ">
                                            {!! Form::open(['route' => 'pemesanans.store']) !!}
                                            <div class="row">
                                                {!! Form::hidden('id_admin', Auth::user()->id, ['class' =>
                                                'form-control']) !!}
                                                <div class="form-group col-sm-6">
                                                    {!! Form::label('id_genre', 'Genre:') !!}
                                                    <select class="form-control" id="id_genre" name="id_genre">
                                                        @foreach ($genre as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_genre }}
                                                            ({{ "Rp. " .  number_format($item->biaya, 0, ",", ".") }})
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    {!! Form::label('waktu_pemesanan', 'Waktu Acara:') !!}
                                                    {!! Form::date('waktu_pemesanan', null, ['class' =>
                                                    'form-control','id'=>'waktu_pemesanan']) !!}
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    {!! Form::label('nomor_hp', 'Nomor HP Yang Bisa Dihubungi:') !!}
                                                    {!! Form::number('nomor_hp', null, ['class' =>
                                                    'form-control','id'=>'nomor_hp']) !!}
                                                </div>
                                                @push('scripts')
                                                <script type="text/javascript">
                                                    $('#waktu_pemesanan').datetimepicker({
                                                        format: 'YYYY-MM-DD HH:mm:ss',
                                                        useCurrent: true,
                                                        sideBySide: true
                                                    })
                                                </script>
                                                @endpush
                                                <div class="form-group col-sm-12 col-lg-12">
                                                    {!! Form::label('lokasi', 'Lokasi:') !!}
                                                    {!! Form::textarea('lokasi', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <label class="form-label">Metode Pembayaran</label>
                                                    <div class="selectgroup w-100">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="metode_pembayaran"
                                                                value="Transafer" class="selectgroup-input" required
                                                                checked>
                                                            <span class="selectgroup-button" id="fillHarga">Hanya
                                                                Transfer </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                                    <a href="{{ route('pemesanans.index') }}"
                                                        class="btn btn-light">Cancel</a>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
