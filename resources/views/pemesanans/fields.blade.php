{!! Form::hidden('id_admin', Auth::user()->id, ['class' => 'form-control']) !!}
<div class="form-group col-sm-6">
    {!! Form::label('id_team', 'Team:') !!}
    {!! Form::select('id_team',$team, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('waktu_pemesanan', 'Waktu Pemesanan:') !!}
    {!! Form::date('waktu_pemesanan', null, ['class' => 'form-control','id'=>'waktu_pemesanan']) !!}
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

<!-- Lokasi Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('lokasi', 'Lokasi:') !!}
    {!! Form::textarea('lokasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('pemesanans.index') }}" class="btn btn-light">Cancel</a>
</div>
