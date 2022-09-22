@extends('layouts.app')
@section('title')
    Anggota
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Anggotas</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('anggotas.create')}}" class="btn btn-primary form-btn">Anggota <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('anggotas.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

