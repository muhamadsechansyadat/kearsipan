<?php 
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan_Surat_Masuk.xls");
 ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Laporan Surat Masuk</h4>
						<p class="card-subtitle">Tanggal : {{ date("Y-m-d") }}</p>

						<table class="table" border="1">
							<thead>
								<td>NO</td>
								<td>Tanggal Buat Surat</td>
								<td>Pengirim</td>
								<td>No Surat</td>
								<td>Tanggal Surat</td>
								<td>Perihal</td>
								<td>Lampiran</td>
								<td>Jenis Surat</td>
							</thead>
							<tbody>
								@foreach($data as $dat)
								<tr>
									<td>{{ $loop->index+1 }}</td>
									<td>{!! substr($dat->created_at,0,10) !!}</td>
									<td>{{ $dat->pengirim }}</td>
									<td>{{ $dat->no_surat }}</td>
									<td>{!! substr($dat->tgl_surat,0,10) !!}</td>
									<td>{{ $dat->perihal }}</td>
									<td>{{ $dat->lampiran }}</td>
									<td>
										@if($dat->id_jenis == 1)
												Surat Masuk Umum
										@elseif($dat->id_jenis == 2)
												Surat Masuk Kedinasan
										@elseif($dat->id_jenis == 3)
												Surat Masuk Kunjungan
										@elseif($dat->id_jenis == 4)
												Surat Masuk Pramuka
										@elseif($dat->id_jenis == 5)
												Surat Masuk Lingkungan			
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
<?php 
	echo "<script>document.location.href='arsip/index'</script>";
 ?>