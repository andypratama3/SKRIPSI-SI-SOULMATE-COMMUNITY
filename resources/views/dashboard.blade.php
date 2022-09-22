@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Dashboard</h3>
    </div>
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
</section>
@endsection
