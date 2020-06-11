@extends('layouts.template')

@section('title','Edit Jenis Surat')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Edit Jenis Surat</h4>
						<form action="{{ url('jenis-arsip/update/'.$data->id) }}" method="post">
							{{ csrf_field() }}
							{{ method_field('PUT')}}
							<div class="form-group">
								<label for="">Jenis Surat</label>
								<input type="text" name="jenis_surat" class="form-control" required value="{{ $data->jenis_surat }}" required="Wajib Di Isi">
							</div>
							<input type="submit" class="btn btn-primary" value="Update">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection	