<div class="table-responsive">
    <table class="table" id="pemesanans-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelangan</th>
                <th>Team</th>
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
                <td>{{ $pemesanan->Pelanggan->name }}</td>
                <td>{{ ($pemesanan->id_team == null)?"Sedang Dicarikan!":$pemesanan->idTeam->nama_tim }}</td>
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
                        {!! Form::open(['route' => ['pemesanans.destroy', $pemesanan->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            @if ($pemesanan->status == 1)
                                <a href="{!! route('dashboard.pemesanan.show', [$pemesanan->id]) !!}" class='btn btn-info action-btn '><i class="fas fa-eye"></i> </a>
                                {{-- <a href="{!! route('pemesanans.show', [$pemesanan->id]) !!}" class='btn btn-info action-btn '><i class="fas fa-check"></i> </a> --}}
                                {!! Form::button('<i class="fas fa-times"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Batalkan Pemesanan ini?")']) !!}

                            @elseif($pemesanan->status == 2 )
                                <a href="{!! route('dashboard.pemesanan.show', [$pemesanan->id]) !!}" class='btn btn-info action-btn '><i class="fas fa-check"></i> </a>
                            @else
                                <a href="{!! route('dashboard.pemesanan.show', [$pemesanan->id]) !!}" class='btn btn-info action-btn '><i class="fas fa-eye"></i> </a>
                            @endif

                        </div>
                        {!! Form::close() !!}
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
