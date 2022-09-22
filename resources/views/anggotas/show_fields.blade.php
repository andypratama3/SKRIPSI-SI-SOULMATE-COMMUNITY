<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $anggota->nama }}</p>
</div>

<!-- Nomor Hp Field -->
<div class="form-group">
    {!! Form::label('nomor_hp', 'Nomor Hp:') !!}
    <p>{{ $anggota->nomor_hp }}</p>
</div>

<!-- Alamat Field -->
<div class="form-group">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{{ $anggota->alamat }}</p>
</div>

<div class="form-group">
    <div class="text-center">
        <img src="{{ ($anggota->img==null)?asset('no_image.jpg'):asset('storage/')."/".$anggota->img   }}" alt="img" class="img-fluid w-50" >
    </div>
</div>