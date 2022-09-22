@extends('layouts.app')
@section('title')
    Genres 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Genre</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('genres.create')}}" class="btn btn-primary form-btn">Genre <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('genres.table')
            </div>
       </div>
   </div>
</section>
@endsection

