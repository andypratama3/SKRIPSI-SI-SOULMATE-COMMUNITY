@extends('layouts.app')
@section('title')
    Create Pemesanan 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">Pemesanan Baru</h3>
            <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                <a href="{{ route('pemesanans.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="content">
            @include('stisla-templates::common.errors')
            <div class="section-body">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="card">
                           <div class="card-body ">
                                {!! Form::open(['route' => 'pemesanans.store']) !!}
                                    <div class="row">
                                        {!! Form::hidden('id_admin', Auth::user()->id, ['class' => 'form-control']) !!}
                                            <div class="form-group col-sm-6">
                                                {!! Form::label('id_genre', 'Genre:') !!}
                                                <select class="form-control"  id="id_genre" name="id_genre">
                                                    @foreach ($genre as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_genre }} ({{ "Rp. " .  number_format($item->biaya, 0, ",", ".") }})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                {!! Form::label('waktu_pemesanan', 'Waktu Acara:') !!}
                                                {!! Form::date('waktu_pemesanan', null, ['class' => 'form-control','id'=>'waktu_pemesanan']) !!}
                                            </div>
                                            <div class="form-group col-sm-12">
                                                {!! Form::label('nomor_hp', 'Nomor HP Yang Bisa Dihubungi:') !!}
                                                {!! Form::number('nomor_hp', null, ['class' => 'form-control','id'=>'nomor_hp']) !!}
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
                                                        <input type="radio" name="metode_pembayaran" value="Transafer" class="selectgroup-input" required checked>
                                                        <span class="selectgroup-button" id="fillHarga">Hanya Transfer </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                                <a href="{{ route('pemesanans.index') }}" class="btn btn-light">Cancel</a>
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
@endsection
