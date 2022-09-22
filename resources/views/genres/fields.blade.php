<!-- Nama Genre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_genre', 'Nama Genre:') !!}
    {!! Form::text('nama_genre', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('genres.index') }}" class="btn btn-light">Cancel</a>
</div>
