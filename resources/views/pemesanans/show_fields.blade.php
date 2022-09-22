<!-- Id Team Field -->
<div class="form-group">
    {!! Form::label('id_team', 'Team:') !!}
    <p>{{ $pemesanan->idTeam->nama_tim }}</p>
</div>

<!-- Waktu Pemesanan Field -->
<div class="form-group">
    {!! Form::label('waktu_pemesanan', 'Waktu Pemesanan:') !!}
    <p>{{ date("d F Y", strtotime($pemesanan->waktu_pemesanan)) }}</p>
</div>

<!-- Lokasi Field -->
<div class="form-group">
    {!! Form::label('lokasi', 'Lokasi:') !!}
    <p>{{ $pemesanan->lokasi }}</p>
</div>

