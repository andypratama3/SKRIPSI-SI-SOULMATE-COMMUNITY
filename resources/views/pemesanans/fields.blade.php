{!! Form::hidden('id_admin', Auth::user()->id, ['class' => 'form-control']) !!}
<div class="form-group col-sm-6">
    {!! Form::label('id_genre', 'Genre:') !!}
    {!! Form::select('id_genre',$genre, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('waktu_pemesanan', 'Waktu Pemesanan:') !!}
    {!! Form::date('waktu_pemesanan', null, ['class' => 'form-control','id'=>'waktu_pemesanan']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('nomor_hp', 'Nomor HP Yang Bisa Dihubungi:') !!}
    {!! Form::number('nomor_hp', null, ['class' => 'form-control','id'=>'nomor_hp']) !!}
</div>
@push('scripts')
    <script type="text/javascript">
        $('#waktu_pemesanan').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('lokasi', 'Lokasi:') !!}
    {!! Form::textarea('lokasi', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    <label class="form-label">Metode Pembayaran</label>
    <div class="selectgroup w-100">
      <label class="selectgroup-item">
        <input type="radio" name="metode_pembayaran" value="Transafer" class="selectgroup-input" required>
        <span class="selectgroup-button">Transfer</span>
      </label>
      <label class="selectgroup-item">
        <input type="radio" name="metode_pembayaran" value="Tunai" class="selectgroup-input" required>
        <span class="selectgroup-button">Tunai</span>
      </label>
    </div>
  </div>
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('pemesanans.index') }}" class="btn btn-light">Cancel</a>
</div>
