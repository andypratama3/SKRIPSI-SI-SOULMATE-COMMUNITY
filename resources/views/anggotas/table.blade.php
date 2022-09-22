<div class="table-responsive">
    <table class="table" id="anggotas-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
        <th>Nomor Hp</th>
        <th>Alamat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($anggotas as $anggota)
            <tr>
                <td>{{ $loop->iteration }}</td>
                       <td>{{ $anggota->nama }}</td>
            <td>{{ $anggota->nomor_hp }}</td>
            <td>{{ $anggota->alamat }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['anggotas.destroy', $anggota->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('anggotas.show', [$anggota->id]) !!}" class='btn btn-info action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('anggotas.edit', [$anggota->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
    $('#anggotas-table').DataTable();
</script>
@endsection