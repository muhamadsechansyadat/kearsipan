@extends('layouts.template')

@section('title','Edit Surat')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4>Edit Surat</h4>
					</div>
					<div class="card-body">
						<form action="{{ url('surat-masuk/update/'.$data->id) }}" method="post" id="buatsurat" enctype="multipart/form-data">
							{{ csrf_field() }}
							{{ method_field('PUT')}}
							<div class="form-group">
								<p><b>Pengirim</b></p>
								<input type="text" name="pengirim" class="form-control" value="{{ $data->pengirim }}" required="Wajib Di Isi">
							</div>
							<div class="form-group">
								<p><b>NO Surat</b></p>
								<input type="text" name="no_surat" class="form-control" value="{{ $data->no_surat }}" required="Wajib Di Isi">
							</div>
							<div class="form-group">
								<p><b>Tanggal Surat</b></p>
								<input type="date" name="tgl_surat" class="form-control" value="{!! substr($data->tgl_surat,0,10) !!}" required="Wajib Di Isi">
							</div>
							<div class="form-group">
								<p><b>Perihal</b></p>
								<textarea name="perihal" id="" cols="30" rows="20" class="form-control" required="Wajib Di Isi">{{ $data->perihal }}</textarea>
							</div>
							<div class="form-group">
								<p><b>Lampiran</b></p>
								<input type="file" name="lampiran" class="form-control">
								<input type="text" class="form-control" disabled="" value="{{ public_path('files/'.$data->lampiran) }}">
								<a href="{{ url('surat-masuk/download'.'/'.$data->lampiran) }}" class="btn btn-primary">Download File</a>
							</div>
							<div class="form-group">
								<p><b>Jenis Surat</b></p>
								<select name="id_jenis" id="" class="form-control" required="Wajib Di Isi">
									<option value=""></option>
										<option value="1" @if($data->id_jenis=='1') selected @endif>Surat Masuk Umum</option>
										<option value="2" @if($data->id_jenis=='2') selected @endif >Surat Masuk Kedinasan</option>
										<option value="3" @if($data->id_jenis=='3') selected @endif >Surat Masuk Kunjungan</option>
										<option value="4" @if($data->id_jenis=='4') selected @endif>Surat Masuk Pramuka</option>
										<option value="5" @if($data->id_jenis=='5') selected @endif>Surat Masuk Lingkungan</option>
								</select>
							</div>
							<div class="form-group">
								<input type="submit" value="Simpan" class="btn btn-lg btn-primary" required>
							</div>
						</form>
					</div>
				</div>	
			</div>
		</div>
	</div>
@endsection