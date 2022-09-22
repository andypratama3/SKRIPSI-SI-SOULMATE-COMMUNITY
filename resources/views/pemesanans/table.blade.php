<div class="table-responsive">
    <table class="table" id="pemesanans-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Team</th>
                <th>Waktu Pemesanan</th>
                <th>Lokasi</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pemesanans as $pemesanan)
            <tr>
                       <td>{{ $loop->iteration }}</td>
            <td>{{ $pemesanan->idTeam->nama_tim }}</td>
            <td>{{ date("d F Y", strtotime($pemesanan->waktu_pemesanan)) }}</td>
            <td>{{ $pemesanan->lokasi }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['pemesanans.destroy', $pemesanan->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('pemesanans.show', [$pemesanan->id]) !!}" class='btn btn-info action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('pemesanans.edit', [$pemesanan->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
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