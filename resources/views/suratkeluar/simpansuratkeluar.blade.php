@extends('layouts.template')

@section('title','Simpan Surat Keluar')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4>Buat Surat</h4>
					</div>
					<div class="card-body">
						<form action="{{ url('surat-keluar/simpan') }}" method="post" id="buatsurat" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="form-group">
								<p><b>Pengirim</b></p>
								<input type="text" name="pengirim" class="form-control" required="Wajib Di Isi">
							</div>
							<div class="form-group">
								<p><b>NO Surat</b></p>
								<input type="text" name="no_surat" class="form-control" value="{{ $no_surat }}" readonly="">
							</div>
							<div class="form-group">
								<p><b>Perihal</b></p>
								<textarea name="perihal" id="" cols="30" rows="10" class="form-control" required="Wajib Di Isi"></textarea>
							</div>
							<div class="form-group">
								<p><b>Lampiran</b></p>
								<input type="file" name="lampiran" class="form-control" required="Wajib Di Isi">
							</div>
							<div class="form-group">
								<p><b>Jenis Surat</b></p>
								<select name="id_jenis" id="" class="form-control" required="Wajib Di Isi">
									@foreach(\App\Jenisarsip::where('id',6)->get() as $field)
										<option value=""></option>
										<option value="{{ $field->id }}">{{ $field->jenis_surat }}</option>
									@endforeach	
									@foreach(\App\Jenisarsip::where('id',7)->get() as $field)
										<option value="{{ $field->id }}">{{ $field->jenis_surat }}</option>
									@endforeach
									@foreach(\App\Jenisarsip::where('id',8)->get() as $field)
										<option value="{{ $field->id }}">{{ $field->jenis_surat }}</option>
									@endforeach
									<!-- <option value="2">Surat Masuk Kedinasan</option>
									<option value="3">Surat Masuk Kunjungan</option>
									<option value="4">Surat Masuk Pramuka</option>
									<option value="5">Surat Masuk Lingkungan</option> -->
								</select>
							</div>
							<div class="form-group">
								<p><b>DiTujukan(Kepada)</b></p>
								<input type="text" class="form-control" name="ditujukan" required="Wajib Di Isi">	
							</div>
							<div class="form-group">
								<input type="submit" value="simpan" class="btn btn-lg btn-primary" required>
							</div>
						</form>
					</div>
				</div>	
			</div>
		</div>
	</div>
@endsection