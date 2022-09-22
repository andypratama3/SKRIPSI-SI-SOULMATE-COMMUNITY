<!-- Id Genre Field -->
<div class="form-group">
    {!! Form::label('id_genre', 'Genre:') !!}
    <p>{{ $team->idGenre->nama_genre }}</p>
</div>

<!-- Nama Tim Field -->
<div class="form-group">
    {!! Form::label('nama_tim', 'Nama Tim:') !!}
    <p>{{ $team->nama_tim }}</p>
</div>

<div class="form-group">
    {!! Form::label('nama_tim', 'Anggota TIM:') !!}
   <div class="row">
        @foreach ($team->teamMembers as $item)
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="text-center">
                            <img src="{{  ($item->Anggota->img==null)?asset('no_image.jpg'):asset('storage/')."/".$item->Anggota->img  }}" alt="img" class="img-fluid w-100">
                        </div>
                        <div class="card-body px-0 ">
                            <div class="cardprice">
                                <span class="type--strikethrough number-font">{{ $item->Anggota->nama }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
   </div>
</div>