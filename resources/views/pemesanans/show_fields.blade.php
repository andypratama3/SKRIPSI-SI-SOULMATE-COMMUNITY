<div class="form-group">
    {!! Form::label('id_team', 'Team:') !!}
    <p>{{ ($pemesanan->id_team == null)?"Sedang Dicarikan!":$pemesanan->idTeam->nama_tim }}</p>
</div>
<div class="form-group">
    {!! Form::label('genre', 'Genre:') !!}
    <p>{{ $pemesanan->Genre->nama_genre }}</p>
</div>
<div class="form-group">
    {!! Form::label('genre', 'Metode Pembayaran:') !!}
    <p>{{ $pemesanan->metode_pembayaran }}</p>
</div>
<div class="form-group">
    {!! Form::label('waktu_pemesanan', 'Waktu Pemesanan:') !!}
    <p>{{ date("d F Y", strtotime($pemesanan->waktu_pemesanan)) }}</p>
</div>
<div class="form-group">
    {!! Form::label('lokasi', 'Lokasi:') !!}
    <p>{{ $pemesanan->lokasi }}</p>
</div>

