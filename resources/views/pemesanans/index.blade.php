@extends('layouts.app')
@section('title')
    Pemesanans 
@endsection
@section('content')
    @if (Auth::user()->role == 1)
        <section class="section">
            <div class="section-header">
                <h1>Pemesanans</h1>
            </div>
            <div class="section-body">
                <div class="card">
                        <div class="card-body">
                            @include('pemesanans.table')
                        </div>
                </div>
            </div>
        </section>
    @else
        <section class="section">
            <div class="section-header">
                <h1>Pemesananmu</h1>
                <div class="section-header-breadcrumb">
                    <a href="{{ route('pemesanans.create')}}" class="btn btn-primary form-btn">Pemesanan <i class="fas fa-plus"></i></a>
                </div>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="pemesanans-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Genre</th>
                                        <th>Waktu Pemesanan</th>
                                        <th>Lokasi</th>
                                        <th>Status</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pemesanans as $pemesanan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pemesanan->Genre->nama_genre }}</td>
                                        <td>{{ date("d F Y", strtotime($pemesanan->waktu_pemesanan)) }}</td>
                                        <td>{{ $pemesanan->lokasi }}</td>
                                        <td>
                                            @if ($pemesanan->status == 1)
                                                <span class="badge badge-warning">Menunggu Di Verifikasi</span>
                                            @elseif ($pemesanan->status == 2)
                                                <span class="badge badge-primary">Pencarian Tim Dance</span>
                                            @elseif ($pemesanan->status == 3)
                                                <span class="badge badge-success">Selesai</span>
                                            @elseif ($pemesanan->status == 0)
                                                <span class="badge badge-warning">Belum Dibayar</span>
                                            @else
                                                <span class="badge badge-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td class=" text-center">
                                            <div class='btn-group'>
                                                <a href="{!! route('pemesanans.show', [$pemesanan->id]) !!}" class='btn btn-info action-btn '><i class="fa fa-eye"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @section('js')
                        <script>
                            $('#pemesanans-table').DataTable();
                        </script>
                        @endsection
                    </div>
                </div>
            </div>
        </section>
    @endif

    
@endsection

