@extends('layouts.template')

@section('title','Surat Masuk')

@section('content')
	<!-- <h2 class="section-title">Functionality Card</h2>
            <p class="section-lead">
              You can provide functionality on the card.
            </p> -->

            <div class="row">
              <div class="col-12 col-sm-8 col-lg-8">
                <div class="card">
                  <div class="card-header">
                    <h4>{!! substr($data->created_at,0,10) !!}</h4>
                    <h4>from {{ $data->pengirim }}</h4>
                    <div class="card-header-action">
                      <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                    </div>
                  </div>
                  <div class="collapse show" id="mycard-collapse">
                    <div class="card-body">
                      <p>NO Surat : {{ $data->no_surat }}</p>
                      <p>Tanggal Surat : {!! substr($data->tgl_surat,0,10) !!}</p>
                      <p>Perihal : {{ $data->perihal }}</p>
                      <p>Jenis Surat : @if($data->id_jenis == 1)
												Surat Masuk Umum
											@elseif($data->id_jenis == 2)
												Surat Masuk Kedinasan
											@elseif($data->id_jenis == 3)
												Surat Masuk Kunjungan
											@elseif($data->id_jenis == 4)
												Surat Masuk Pramuka
											@elseif($data->id_jenis == 5)
												Surat Masuk Lingkungan			
											@endif
                      </p>
                    </div>
                    <div class="card-footer">
                      Lampiran : {{ $data->lampiran }}
                      <a href="{{ url('surat-masuk/download'.'/'.$data->lampiran) }}" class="btn btn-primary">Download File</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection