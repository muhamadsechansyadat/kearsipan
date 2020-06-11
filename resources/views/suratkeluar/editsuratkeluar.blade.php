@extends('layouts.template')

@section('title','Edit Surat Keluar')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4>Edit Surat Keluar</h4>
					</div>
					<div class="card-body">
						<form action="{{ url('surat-keluar/update/'.$data->id) }}" method="post" id="buatsurat" enctype="multipart/form-data">
							{{ csrf_field() }}
							{{ method_field('PUT')}}
							<div class="form-group">
								<p><b>Pengirim</b></p>
								<input type="text" name="pengirim" class="form-control" value="{{ $data->pengirim }}" required="Wajib Di Isi">
							</div>
							<div class="form-group">
								<p><b>NO Surat</b></p>
								<input type="text" name="no_surat" class="form-control" value="{{ $data->no_surat }}" readonly="">
							</div>
							<div class="form-group">
								<p><b>Perihal</b></p>
								<textarea name="perihal" id="" cols="30" rows="20" class="form-control" required="Wajib Di Isi">{{ $data->perihal }}</textarea>
							</div>
							<div class="form-group">
								<p><b>Lampiran</b></p>
								<input type="file" name="lampiran" class="form-control">
								<input type="text" class="form-control" disabled="" value="{{ public_path('files/'.$data->lampiran) }}">
								<a href="{{ url('surat-keluar/download'.'/'.$data->lampiran) }}" class="btn btn-primary">Download File</a>
							</div>
							<div class="form-group">
								<p><b>Jenis Surat</b></p>
								<select name="id_jenis" id="" class="form-control" required="Wajib Di Isi">
									<option value=""></option>
										<option value="6" @if($data->id_jenis=='6') selected @endif>Surat Keluar Umum</option>
										<option value="7" @if($data->id_jenis=='7') selected @endif >Surat Tugas</option>
										<option value="8" @if($data->id_jenis=='8') selected @endif >Surat Keputusan</option>
								</select>
							</div>
							<div class="form-group">
								<p><b>Ditujukan(Kepada)</b></p>
								<input type="text" class="form-control" name="ditujukan" value="{{ $data->ditujukan }}" required="Wajib Di Isi">
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