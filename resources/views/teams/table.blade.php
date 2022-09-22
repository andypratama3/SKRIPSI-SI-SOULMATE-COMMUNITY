<div class="table-responsive">
    <table class="table" id="teams-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Genre</th>
                <th>Nama Tim</th>
                <th class=" text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($teams as $team)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $team->idGenre->nama_genre }}</td>
                <td>{{ $team->nama_tim }}</td>
                <td class=" text-center">
                    {!! Form::open(['route' => ['teams.destroy', $team->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('teams.show', [$team->id]) !!}" class='btn btn-info action-btn '><i class="fa fa-eye"></i></a>
                        <a href="{!! route('teams.edit', [$team->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
    $('#teams-table').DataTable();
</script>
@endsection