@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Dashboard</h3>
    </div>
    @if (Auth::user()->role == 1)
        <div class="section-body">
            <div class="row">
                <div class="col-4">
                    <div class="card text-center">
                        <div class="card-body"> <span>Total Anggota</span>
                        <h1 class=" mb-1 mt-1 font-weight-bold">{{ COUNT($anggota) }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-center">
                        <div class="card-body"> <span>Total Tim</span>
                        <h1 class=" mb-1 mt-1 font-weight-bold">{{ COUNT($team) }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-center">
                        <div class="card-body"> <span>Total Pemesanan</span>
                        <h1 class=" mb-1 mt-1 font-weight-bold">{{ COUNT($pemesanan) }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="section-body">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="hero text-white hero-bg-image hero-bg-parallax" style="background-image: url('{{ asset('andre-benz-1214056-unsplash.jpg') }}');">
                        <div class="hero-inner">
                            <h2>Selamat Datang</h2>
                            <p class="lead">Di Soulmate Community, tempat kamu untuk melakukan pemesanan jasa dance.</p>
                            <div class="mt-4">
                                <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Pesan Sekarang!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
</section>
@endsection
