<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('nomor_hp', 'Nomor Hp:') !!}
    {!! Form::number('nomor_hp', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12 mb-3">
    {!! Form::label('img', 'Foto:') !!}
    <div class="custom-file">
        {!! Form::file('img', ['class' => 'form-control','required'=>'true']) !!}
    </div>
</div>
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('anggotas.index') }}" class="btn btn-light">Cancel</a>
</div>
