@extends('layouts.template')

@section('title','Surat Keluar')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						
					</div>
					<div class="card-body">
						<a href="{{ url('surat-keluar/autocode/simpan') }}" class="btn btn-primary float-right">Buat Surat</a>
						<h4 class="card-title">Data Surat Keluar</h4>
						<table class="table table-bordered table-striped table-hover" id="example">
							<thead>
								<tr>
									<!-- <td>NO</td> -->
									<td>ID Surat</td>
									<td>Tanggal Buat Surat</td>
									<td>Pengirim</td>
									<td>NO Surat</td>
									<td>Perihal</td>
									<td>Ditujukan(kepada)</td>
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
										<td>{{ $field->perihal }}</td>
										<td>{{ $field->ditujukan }}</td>
										<td>
											@if($field->id_jenis == 6)
												Surat Keluar Umum
											@elseif($field->id_jenis == 7)
												Surat Tugas
											@elseif($field->id_jenis == 8)
												Surat Keputusan			
											@endif

										</td>
										<td>
											<a href="{{ url('surat-keluar/hapus/'.$field->id) }}" class="btn btn-danger" onclick="return confirm('Yakin?')"><i class="fa fa-trash"></i></a>
											<a href="{{ url('surat-keluar/edit/'.$field->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
											@if(Auth::user()->level == 1)
											<a href="{{ url('surat-keluar/show1/'.$field->id) }}" class="btn btn-info mt-1"><i class="fa fa-eye"></i></a>
											@else
											<a href="{{ url('surat-keluar/show2/'.$field->id) }}" class="btn btn-info mt-1"><i class="fa fa-eye"></i></a>
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