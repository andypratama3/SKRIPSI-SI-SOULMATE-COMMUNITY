@extends('layouts.app')
@section('title')
    Pemesanans 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pemesanans</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('pemesanans.create')}}" class="btn btn-primary form-btn">Pemesanan <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('pemesanans.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

