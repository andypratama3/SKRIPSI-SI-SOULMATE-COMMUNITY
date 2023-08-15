<!-- Id Genre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_genre', 'Genre:') !!}
    {!! Form::select('id_genre',$genre, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('nama_tim', 'Nama Tim:') !!}
    {!! Form::text('nama_tim', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('nama_tim', 'Pilih Anggota Tim:') !!}
    <div class="custom-controls-stacked">
        @foreach ($anggota as $item)
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="anggotaTim[]" value="{{ $item->id }}" >
                <span class="custom-control-label">{{ $item->nama }}</span>
            </label>
        @endforeach
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('teams.index') }}" class="btn btn-light">Cancel</a>
</div>
