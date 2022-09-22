<div class="table-responsive">
    <table class="table" id="genres-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Genre</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($genres as $genre)
            <tr>
                <td>{{ $loop->iteration }}</td>
                       <td>{{ $genre->nama_genre }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['genres.destroy', $genre->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('genres.show', [$genre->id]) !!}" class='btn btn-primary action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('genres.edit', [$genre->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
    $('#genres-table').DataTable();
</script>
@endsection