<?php 
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan_Surat_Keluar.xls");
 ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Laporan Surat Keluar</h4>
						<p class="card-subtitle">Tanggal : {{ date("Y-m-d") }}</p>

						<table class="table" border="1">
							<thead>
								<td>NO</td>
								<td>Tanggal Buat Surat</td>
								<td>Pengirim</td>
								<td>No Surat</td>
								<td>Perihal</td>
								<td>Lampiran</td>
								<td>Jenis Surat</td>
								<td>Ditujukan(kepada)</td>
							</thead>
							<tbody>
								@foreach($data as $dat)
								<tr>
									<td>{{ $loop->index+1 }}</td>
									<td>{!! substr($dat->created_at,0,10) !!}</td>
									<td>{{ $dat->pengirim }}</td>
									<td>{{ $dat->no_surat }}</td>
									<td>{{ $dat->perihal }}</td>
									<td>{{ $dat->lampiran }}</td>
									<td>
										@if($dat->id_jenis == 6)
												Surat Keluar Umum
										@elseif($dat->id_jenis == 7)
												Surat Keputusan
										@elseif($dat->id_jenis == 8)
												Surat Masuk Kunjungan		
										@endif
									</td>
									<td>{{ $dat->ditujukan }}</td>
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