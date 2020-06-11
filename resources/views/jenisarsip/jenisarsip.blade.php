@extends('layouts.template')

@section('title','Jenis Arsip')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<!-- <div class="card-header">
						<h4>Data Surat</h4>
					</div> -->
					<div class="card-body">
						<a href="{{ url('jenis-arsip/view/create') }}" class="btn btn-primary float-right">Input Jenis Arsip</a>
						<h4 class="card-title">Data Surat</h4>
						<table class="table table-bordered table-striped table-hover" id="example">
							<thead>
								<tr>
									<td>NO</td>
									<td>ID Surat</td>
									<td>Nama Surat</td>
									<td>Aksi</td>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $field)
									<tr>
										<td>{{ $loop->index + 1 }}</td>
										<td>{{ $field->id }}</td>
										<td>{{ $field->jenis_surat }}</td>
										<td>
											<a href="{{ url('jenis-arsip/hapus/'.$field->id) }}" class="btn btn-danger" onclick="return confirm('Yakin?')"><i class="fa fa-trash"></i></a>
											<a href="{{ url('jenis-arsip/edit/'.$field->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>	
@endsection