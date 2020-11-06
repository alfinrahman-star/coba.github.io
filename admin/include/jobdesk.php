<?php
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
	if ($_GET['aksi'] == 'hapus') {
		$kode_pegawai = $_GET['data'];
		//hapus jobdesk
		$sql_dh = "delete from `jobdesk` 
			where `kode_pegawai` = '$kode_pegawai'";
		mysqli_query($koneksi, $sql_dh);
	}
}
?>
<link rel="stylesheet" href="css/css.css">
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h3>
					<i class="nav-icon fas fa-address-card"></i> Jobdesk
				</h3>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item">
						<a href="#">Home</a>
					</li>
					<li class="breadcrumb-item active">Jobdesk</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
	<div class="card">
		<div class="card-header">
			<div class="col-md-12">
			<div class="card-tools">
				<a href="index.php?include=tambah_jobdesk" class="btn btn-sm btn-info float-right">
					<i class="fas fa-plus"></i> Tambah Jobdesk
				</a>
			</div>
				<form method="post" action="index.php?include=jobdesk">
					<div class="row">
						<div class="col-md-4 bottom-10">
							<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" id="kata_kunci" name="katakunci">
						</div>
						<div class="col-md-5 bottom-10">
							<button type="submit" class="btn btn-primary">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
					<!-- .row -->
				</form>
			
			</div>
			
	</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="col-sm-12">
				<?php if (!empty($_GET['notif'])) { ?>
					<?php if ($_GET['notif'] == "tambahberhasil") { ?>
						<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>
					<?php } else if ($_GET['notif'] == "editberhasil") { ?>
						<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
					<?php } ?>
				<?php } ?>
			</div>
			<br>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th width="80%">Jobdesk</th>
						<th width="15%">
							<center>Aksi</center>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$batas = 2;
					if (!isset($_GET['halaman'])) {
						$posisi = 0;
						$halaman = 1;
					} else {
						$halaman = $_GET['halaman'];
						$posisi = ($halaman - 1) * $batas;
					}
					//menampilkan data hobi
					$sql_h = "SELECT `kode_pegawai`, `jobdesk` FROM `jobdesk`";
					if (isset($_POST["katakunci"])) {
						$katakunci_jobdesk = $_POST["katakunci"];
						$_SESSION['katakunci_jobdesk'] = $katakunci_jobdesk;
						$sql_h .= " where `jobdesk` LIKE '%$katakunci_jobdesk%'";
					}
					$sql_h .= " order by `jobdesk` limit $posisi, $batas ";
					$query_h = mysqli_query($koneksi, $sql_h);
					$no = $posisi + 1;
					while ($data_h = mysqli_fetch_row($query_h)) {
						$kode_pegawai = $data_h[0];
						$jobdesk = $data_h[1];
					?>
						<tr>
							<td>
								<?php echo $no; ?>
							</td>
							<td>
								<?php echo $jobdesk; ?>
							</td>
							<td class="text-center">
								<a href="index.php?include=edit_jobdesk&data=<?php echo $kode_pegawai; ?>" class="btn btn-xs btn-info">
									<i class="fas fa-edit"></i>
									Edit
								</a>
								<a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $jobdesk; ?>?')) window.location.href = 'index.php?include=jobdesk&aksi=hapus&data=<?php echo $kode_pegawai; ?>'" class="btn btn-xs btn-warning">
									<i class="fas fa-trash"></i>
									Hapus
								</a>
							</td>
						</tr>
					<?php
						$no++;
					} ?>

					<?php
					//hitung jumlah semua data 
					$sql_jum = "SELECT `kode_pegawai`, `jobdesk` FROM `jobdesk`";
					if (isset($_POST["katakunci"])) {
						$katakunci_jobdesk = $_POST["katakunci"];
						$sql_jum .= " where `jobdesk` LIKE '%$katakunci_jobdesk%'";
					}
					$sql_jum .= " order by `kode_pegawai`";
					$query_jum = mysqli_query($koneksi, $sql_jum);
					$jum_data = mysqli_num_rows($query_jum);
					$jum_halaman = ceil($jum_data / $batas);
					?>
				</tbody>
			</table>
		</div>
		<!-- /.card-body -->
		<div class="card-footer clearfix">
			<ul class="pagination pagination-sm m-0 float-right">
				<?php
				if ($jum_halaman == 0) {
					//tidak ada halaman
				} else if ($jum_halaman == 1) {
					echo "<li class='page-item'><a class='page-link'>1</a></li>";
				} else {
					$sebelum = $halaman - 1;
					$setelah = $halaman + 1;
					if ($halaman != 1) {
						echo "<li class='page-item'><a class='page-link' href='index.php?include=jobdesk&halaman=1'>First</a></li>";
						echo "<li class='page-item'><a class='page-link' href='index.php?include=jobdesk&halaman=$sebelum'>«</a></li>";
					}
					//menampilkan angka halaman
					for ($i = 1; $i <= $jum_halaman; $i++) {
						if ($i != $halaman) {
							echo "<li class='page-item'><a class='page-link' href='index.php?include=jobdesk&halaman=$i'>$i</a></li>";
						} else {
							echo "<li class='page-item'><a class='page-link'>$i</a></li>";
						}
					}
					if ($halaman != $jum_halaman) {
						echo "<li class='page-item'><a class='page-link'  href='index.php?include=jobdesk&halaman=$setelah'>»</a></li>";
						echo "<li class='page-item'><a class='page-link' href='index.php?include=jobdesk&halaman=$jum_halaman'>Last</a></li>";
					}
				}
				?>
			</ul>
		</div>
	</div>
	<!-- /.card -->
</section>