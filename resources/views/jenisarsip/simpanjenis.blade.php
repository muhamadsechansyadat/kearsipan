@extends('layouts.template')

@section('title','Input Jenis Surat')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4>Input Jenis Surat</h4>
					</div>
					<div class="card-body">
						<form action="{{ url('jenis-arsip/simpan') }}" method="post">
							{{ csrf_field() }}
							<div class="form-group">
								<p><b>Jenis Surat</b></p>
								<input type="text" name="jenis_surat" class="form-control" required="Wajib Di Isi">
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