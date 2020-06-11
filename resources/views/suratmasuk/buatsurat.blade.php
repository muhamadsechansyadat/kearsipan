@extends('layouts.template')

@section('title','Surat Masuk')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4>Buat Surat</h4>
					</div>
					<div class="card-body">
						<form action="{{ url('surat-masuk/simpan') }}" method="post" id="buatsurat" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="form-group">
								<p><b>Pengirim</b></p>
								<input type="text" name="pengirim" class="form-control" required="Wajib Di Isi">
							</div>
							<div class="form-group">
								<p><b>NO Surat</b></p>
								<input type="text" name="no_surat" class="form-control" required="Wajib Di Isi">
							</div>
							<div class="form-group">
								<p><b>Tanggal Surat</b></p>
								<input type="date" name="tgl_surat" class="form-control" required="Wajib Di Isi">
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
									@foreach(\App\Jenisarsip::where('id',1)->get() as $field)
										<option value=""></option>
										<option value="{{ $field->id }}">{{ $field->jenis_surat }}</option>
									@endforeach	
									@foreach(\App\Jenisarsip::where('id',2)->get() as $field)
										<option value="{{ $field->id }}">{{ $field->jenis_surat }}</option>
									@endforeach
									@foreach(\App\Jenisarsip::where('id',3)->get() as $field)
										<option value="{{ $field->id }}">{{ $field->jenis_surat }}</option>
									@endforeach
									@foreach(\App\Jenisarsip::where('id',4)->get() as $field)
										<option value="{{ $field->id }}">{{ $field->jenis_surat }}</option>
									@endforeach
									@foreach(\App\Jenisarsip::where('id',5)->get() as $field)
										<option value="{{ $field->id }}">{{ $field->jenis_surat }}</option>
									@endforeach
									<!-- <option value="2">Surat Masuk Kedinasan</option>
									<option value="3">Surat Masuk Kunjungan</option>
									<option value="4">Surat Masuk Pramuka</option>
									<option value="5">Surat Masuk Lingkungan</option> -->
								</select>
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
	<!-- <script>
		var form = document.getElementById('buatsurat');
		var request = new XMLHttpRequest();

		form.addEventListener('submit', function(e){
			e.preventDefault();
			var formdata = new FormData(form);

			request.open('post', '/buatsurat');
			request.addEventListener("load", transferComplete);
			request.send(formdata);
		});

		function transferComplete(data){
			console.log(data.currentTarget.response);
		}
	</script> -->
@endsection