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
                <div class="card">
                    <h2 class="section-title">Informasi Pemesanan</h2>
                    <div class="card-body">
                        @include('pemesanans.show_fields')
                    </div>
                </div>
            </div>
            @else
                <div class="col-md-6">
                    <div class="card">
                        <h2 class="section-title">Informasi Pemesanan</h2>
                        <div class="card-body">
                            @include('pemesanans.show_fields')
                        </div>
                    </div>
                </div>
            @endif
         
            <div class="col-md-6">
                <div class="card">
                    <h2 class="section-title">Informasi Pembayaran 
                        @if ($pemesanan->status == 0)
                            <span style="font-size:10px;padding:5px" class="badge badge-warning">Belum Dibayar</span>
                        @else
                            <span style="font-size:10px;padding:5px" class="badge badge-success">Sudah Dibayar</span>
                        @endif
                    </h2>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                {!! Form::label('genre', 'Total Transfer') !!}
                                <p><b>{{ "Rp. " .  number_format($pemesanan->Genre->biaya, 0, ",", ".") }}</b></p>
                            </div>
                            
                            @if ($pemesanan->status == 0)
                                @if (Auth::user()->role == 1)
                                @else
                                <div class="form-group">
                                    {!! Form::label('genre', 'Mandiri') !!}
                                    <p>Firti - 8162975639128 </p>
                                </div>
                                <form action="{{ route('pemesanans.uploadBukti',$pemesanan->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        {!! Form::label('genre', 'Bukti TF') !!}
                                        <input type="file" name="bukti" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Upload</button>
                                    </div>
                                </form>
                                @endif
                
                               
                            @else
                                <div class="form-group">
                                    {!! Form::label('genre', 'Bukti TF') !!}
                                    <img src="{{ asset('bukti') }}/{{ $pemesanan->bukti }}" class="img-fluid" alt="Responsive image">
                                </div>
                            @endif
    
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
