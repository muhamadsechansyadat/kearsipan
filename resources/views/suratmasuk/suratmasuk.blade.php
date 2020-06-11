@extends('layouts.template')

@section('title','Surat Masuk')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						
					</div>
					<div class="card-body">
						<a href="{{ url('surat-masuk/view/create') }}" class="btn btn-primary float-right">Buat Surat</a>
						<h4 class="card-title">Data Surat Masuk</h4>
						<table class="table table-bordered table-striped table-hover" id="example">
							<thead>
								<tr>
									<!-- <td>NO</td> -->
									<td>ID Surat</td>
									<td>Tanggal Buat Surat</td>
									<td>Pengirim</td>
									<td>NO Surat</td>
									<td>Tgl Surat</td>
									<td>Perihal</td>
									<td>Jenis</td>
									<td>Aksi</td>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $field)
									<tr>
										<!-- <td>{{ $loop->index + 1 }}</td> -->
										<td>{{ $field->id }}</td>
										<td>{!! substr($field->created_at,0,10) !!}</td>
										<td>{{ $field->pengirim }}</td>
										<td>{{ $field->no_surat }}</td>
										<td>{!! substr($field->tgl_surat,0,10) !!}</td>
										<td>{{ $field->perihal }}</td>
										<td>
											@if($field->id_jenis == 1)
												Surat Masuk Umum
											@elseif($field->id_jenis == 2)
												Surat Masuk Kedinasan
											@elseif($field->id_jenis == 3)
												Surat Masuk Kunjungan
											@elseif($field->id_jenis == 4)
												Surat Masuk Pramuka
											@elseif($field->id_jenis == 5)
												Surat Masuk Lingkungan			
											@endif

										</td>
										<td>
											<a href="{{ url('surat-masuk/hapus/'.$field->id) }}" class="btn btn-danger" onclick="return confirm('Yakin?')"><i class="fa fa-trash"></i></a>
											<a href="{{ url('surat-masuk/edit/'.$field->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
											@if(Auth::user()->level == '1')
											<a href="{{ url('surat-masuk/show1/'.$field->id) }}" class="btn btn-info mt-1"><i class="fa fa-eye"></i></a>
											@else
											<a href="{{ url('surat-masuk/show2/'.$field->id) }}" class="btn btn-info mt-1"><i class="fa fa-eye"></i></a>
											@endif
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