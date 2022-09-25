@extends('layouts.app')
@section('title')
    Pemesanan Details 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Informasi Pemesanan</h1>
        <div class="section-header-breadcrumb">
            @if (Auth::user()->role == 1)
                @if ($pemesanan->status == 1)
                <a href="{{ route('pemesanans.terima',[$pemesanan->id]) }}" class="btn btn-success form-btn float-right">Terima</a>
                <a href="{{ route('pemesanans.tolak',[$pemesanan->id]) }}" class="btn btn-danger form-btn float-right">Tolak</a>
                @elseif($pemesanan->status == 2)
                <form action="{{ route('pemesanans.setTim',[$pemesanan->id]) }}" method="post" style="width: 300px;">
                    @csrf
                    <div class="d-flex justify-content-center">
                        <div class="form-group">
                            {!! Form::label('id_team', 'Team:') !!}
                            {!! Form::select('id_team',$team, null, ['class' => 'form-control']) !!}
                        </div>
                        <button class="btn btn-primary" type="submit" style="margin-top: 30px;margin-left: 10px;height: 50%;">Atur Tim</button>   
                    </div>
                    
                </form>
                @endif
            @else
                <a href="{{ route('pemesanans.index') }}" class="btn btn-primary form-btn float-right">Back</a>
            @endif
        </div>
      </div>
   @include('stisla-templates::common.errors')
    <div class="section-body">
        <div class="row">
            @if (Auth::user()->role == 1)
            <div class="col-md-6">
                <div class="card">
                    <h2 class="section-title">Informasi Pelanggan</h2>
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('genre', 'Nama:') !!}
                            <p>{{ $pemesanan->Pelanggan->name }}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('genre', 'Nomor HP:') !!}
                            <p>{{ $pemesanan->nomor_hp }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-md-6">
                <div class="card">
                    <h2 class="section-title">Informasi Pemesanan</h2>
                    <div class="card-body">
                            @include('pemesanans.show_fields')
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
