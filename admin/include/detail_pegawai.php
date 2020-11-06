<?php
if (isset($_GET['data'])) {
	$nip = $_GET['data'];
	//get data pegawai
	$sql_m = "select `m`.`nama`, `j`.`jobdesk`, `m`.`foto` from `pegawai` `m` inner join `jobdesk` `j` on `m`.`kode_pegawai` = `j`.`kode_pegawai` where `m`.`nip` = '$nip'";
	$query_m = mysqli_query($koneksi, $sql_m);
	while ($data_m = mysqli_fetch_row($query_m)) {
		$nama = $data_m[0];
		$jobdesk = $data_m[1];
		$foto = $data_m[2];
	}
}
?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h3>
					<i class="fas fa-user-tie"></i> Detail Data Pegawai
				</h3>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item">
						<a href="#">Home</a>
					</li>
					<li class="breadcrumb-item">
						<a href="index.php?include=pegawai">Data Pegawai</a>
					</li>
					<li class="breadcrumb-item active">Detail Data Pegawai</li>
				</ol>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
	<div class="card">
		<div class="card-header">
			<div class="card-tools">
				<a href="index.php?include=pegawai" class="btn btn-sm btn-warning float-right">
					<i class="fas fa-arrow-alt-circle-left"></i> Kembali
				</a>
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td colspan="2">
							<i class="fas fa-user-circle"></i>
							<strong>Profil Pegawai</strong>
						</td>
					</tr>
					<tr>
						<td width="20%">
							<strong>NIP</strong>
						</td>
						<td width="80%">
							<?php echo $nip; ?>
						</td>
					</tr>
					<tr>
						<td width="20%">
							<strong>Nama</strong>
						</td>
						<td width="80%">
							<?php echo $nama; ?>
						</td>
					</tr>
					<tr>
						<td width="20%">
							<strong>Jobdesk</strong>
						</td>
						<td width="80%">
							<?php echo $jobdesk; ?>
						</td>
					</tr>
					<tr>
						<td>
							<strong>Foto Pegawai<strong>
						</td>
						<td>
							<img src="foto/<?php echo $foto; ?>" class="img-fluid" width="200px;">
						</td>
					</tr>
					<tr>
						<td>
							<strong>Bidang Keahlian<strong>
						</td>
						<td>
							<ul>
								<?php
								//get Bidang Keahlian
								$sql_h = "select `h`.`bidang_keahlian` from `keahlian` `hm` inner join `bidang_keahlian` `h` on `h`.`total_portofolio` = `hm`.`total_portofolio` where `hm`.`nip`='$nip'";
								$query_h = mysqli_query($koneksi, $sql_h);
								while ($data_h = mysqli_fetch_row($query_h)) {
									$bidang_keahlian = $data_h[0];
								?>
									<li>
										<?php echo $bidang_keahlian; ?>
									</li>
								<?php } ?>
							</ul>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- /.card-body -->
		<div class="card-footer clearfix">&nbsp;</div>
	</div>
	<!-- /.card -->
</section>