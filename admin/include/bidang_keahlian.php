<?php
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
	if ($_GET['aksi'] == 'hapus') {
		$total_portofolio = $_GET['data'];
		//hapus bidang keahlian
		$sql_dh = "delete from `bidang_keahlian` 
			where `total_portofolio` = '$total_portofolio'";
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
					<i class="fas fa-laptop-code"></i> Bidang Keahlian
				</h3>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item">
						<a href="#">Home</a>
					</li>
					<li class="breadcrumb-item active">Bidang Keahlian</li>
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
			<div class="col-md-12">
			<div class="card-tools">
				<a href="index.php?include=tambah_bidang_keahlian" class="btn btn-sm btn-info float-right">
					<i class="fas fa-plus"></i> Tambah Bidang Keahlian
				</a>
			</div>
				<form method="post" action="index.php?include=bidang_keahlian">
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
			<div class="data">
              <h6 class="m-0 font-weight-bold text-primary">Data Tabel</h6>
            </div>
			<br>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th width="80%">Bidang Keahlian</th>
						<th width="15%">
							<center>Aksi</center>
						</th>
					</tr>
					<?php
					//menampilkan data bidang keahlian
					$batas = 2;
					if (!isset($_GET['halaman'])) {
						$posisi = 0;
						$halaman = 1;
					} else {
						$halaman = $_GET['halaman'];
						$posisi = ($halaman - 1) * $batas;
					}
					$sql_h = "SELECT `total_portofolio`, `bidang_keahlian` FROM `bidang_keahlian`";
					if (isset($_POST["katakunci"])) {
						$katakunci_bidang_keahlian = $_POST["katakunci"];
						$_SESSION['katakunci_bidang_keahlian'] = $katakunci_bidang_keahlian;
						$sql_h .= " where `bidang_keahlian` LIKE '%$katakunci_bidang_keahlian%'";
					}
					$sql_h .= " order by `bidang_keahlian` limit $posisi, $batas ";
					$query_h = mysqli_query($koneksi, $sql_h);
					$no = $posisi + 1;
					while ($data_h = mysqli_fetch_row($query_h)) {
						$total_portofolio = $data_h[0];
						$bidang_keahlian = $data_h[1];
					?>
						
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $bidang_keahlian; ?></td>
							<td class="text-center">
								<a href="index.php?include=edit_bidang_keahlian&data=<?php echo $total_portofolio; ?>" class="btn btn-xs btn-info">
									<i class="fas fa-edit"></i> Edit
								</a>
								<a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $bidang_keahlian; ?>?'))window.location.href = 'index.php?include=bidang_keahlian&aksi=hapus&data=<?php echo $total_portofolio; ?>'" class="btn btn-xs btn-warning">
									<i class="fas fa-trash"></i> Hapus
								</a>
							</td>
						</tr>
					<?php $no++;
					} ?>
					<?php
						//hitung jumlah semua data 
						$sql_jum = "select `total_portofolio`, `bidang_keahlian` from `bidang_keahlian`";
						if (isset($_POST["katakunci"])) {
							$katakunci_bidang_keahlian = $_POST["katakunci"];
							$sql_jum .= " where `bidang_keahlian` LIKE '%$katakunci_bidang_keahlian%'";
						}
						$sql_jum .= " order by `total_portofolio`";
						$query_jum = mysqli_query($koneksi, $sql_jum);
						$jum_data = mysqli_num_rows($query_jum);
						$jum_halaman = ceil($jum_data / $batas);
						?>
				</thead>
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
						echo "<li class='page-item'><a class='page-link' href='index.php?include=bidang_keahlian&halaman=1'>First</a></li>";
						echo "<li class='page-item'><a class='page-link' href='index.php?include=bidang_keahlian&halaman=$sebelum'>«</a></li>";
					}
					//menampilkan angka halaman
					for ($i = 1; $i <= $jum_halaman; $i++) {
						if ($i != $halaman) {
							echo "<li class='page-item'><a class='page-link' href='index.php?include=bidang_keahlian&halaman=$i'>$i</a></li>";
						} else {
							echo "<li class='page-item'><a class='page-link'>$i</a></li>";
						}
					}
					if ($halaman != $jum_halaman) {
						echo "<li class='page-item'><a class='page-link'  href='index.php?include=bidang_keahlian&halaman=$setelah'>»</a></li>";
						echo "<li class='page-item'><a class='page-link' href='index.php?include=bidang_keahlian&halaman=$jum_halaman'>Last</a></li>";
					}
				}
				?>
			</ul>
		</div>
	</div>
	<!-- /.card -->
</section>