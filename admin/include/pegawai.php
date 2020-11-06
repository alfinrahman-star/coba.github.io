<?php
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
	if ($_GET['aksi'] == 'hapus') {
		$nip = $_GET['data'];
		//get foto
		$sql_f = "SELECT `foto` FROM `pegawai` WHERE `nip`='$nip'";
		$query_f = mysqli_query($koneksi, $sql_f);
		$jumlah_f = mysqli_num_rows($query_f);
		if ($jumlah_f > 0) {
			while ($data_f = mysqli_fetch_row($query_f)) {
				$foto = $data_f[0];
				//menghapus foto dalam folder foto
				unlink("foto/$foto");
			}
		}
		//hapus hobi
		$sql_dh = "delete from `keahlian` where `nip` = '$nip'";
		mysqli_query($koneksi, $sql_dh);
		//hapus data pegawai
		$sql_dm = "delete from `pegawai` where `nip` = '$nip'";
		mysqli_query($koneksi, $sql_dm);
	}
}
?>
<link rel="stylesheet" href="css/css.css">
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Data Pegawai</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Pegawai</li>
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
				<a href="index.php?include=tambah_pegawai" class="btn btn-sm btn-info float-right">
					<i class="fas fa-plus"></i> Tambah Pegawai
				</a>
			</div>
				<form method="post" action="index.php?include=pegawai">
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
			</br>
			<div class="col-sm-10">
				<?php if (!empty($_GET['notif'])) { ?>
					<?php if ($_GET['notif'] == "tambahberhasil") { ?>
						<div class="alert alert-success" role="alert">Data berhasil ditambahkan </div>
					<?php } else if ($_GET['notif'] == "editberhasil") { ?>
						<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
					<?php } ?>
				<?php } ?>
			</div>
			<div class="data">
              <h6 class="m-0 font-weight-bold text-primary">Data Tabel</h6>
            </div>
			<br>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th width="25%">NIP</th>
						<th width="40%">Nama</th>
						<th width="20%">Jobdesk</th>
						<th width="10%">
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
					//menampilkan data Pegawai berdasarkan posisi dan batas
					$sql_pgw = "select `m`.`nip`, `m`.`nama`, `j`.`jobdesk` from `pegawai` `m`inner join `jobdesk` `j` on `m`.`kode_pegawai` = `j`.`kode_pegawai` ";
					if (isset($_POST["katakunci"])) {
						$katakunci_pgw = $_POST["katakunci"];
						$_SESSION['katakunci_pgw'] = $katakunci_pgw;
						$sql_pgw .= " where `nip` LIKE '%$katakunci_pgw%' OR `nama` LIKE '%$katakunci_pgw%'";
					}
					$sql_pgw .= " order by `m`.`nip` limit $posisi, $batas ";
					$query_pgw = mysqli_query($koneksi, $sql_pgw);
					$no = $posisi + 1;
					while ($data_pgw = mysqli_fetch_row($query_pgw)) {
						$nip = $data_pgw[0];
						$nama = $data_pgw[1];
						$jobdesk = $data_pgw[2];
					?>

						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $nip; ?></td>
							<td><?php echo $nama; ?></td>
							<td><?php echo $jobdesk; ?></td>
							<td align="center">
								<a href="index.php?include=edit_pegawai&data=<?php echo $nip; ?>" class="btn btn-xs btn-info" title="Edit">
									<i class="fas fa-edit"></i>
								</a>
								<a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $nip . ' - ' . $nama; ?>?'))window.location.href = 'index.php?include=pegawai&aksi=hapus&data=<?php echo $nip; ?>'" class="btn btn-xs btn-warning">
									<i class="fas fa-trash" title="Hapus"></i>
								</a>
								<a href="index.php?include=detail_pegawai&data=<?php echo $nip; ?>" class="btn btn-xs btn-info" title="Detail">
									<i class="fas fa-eye"></i>
								</a>
							</td>
						</tr>
					<?php $no++;
					} ?>

					<?php
					//hitung jumlah semua data 
					$sql_jum ="select `m`.`nip`, `m`.`nama`, `j`.`jobdesk` from `pegawai` `m`inner join `jobdesk` `j` on `m`.`kode_pegawai` = `j`.`kode_pegawai`";
					if (isset($_POST["katakunci"])) {
						$katakunci_pegawai = $_POST["katakunci"];
						$sql_jum .= " where `m`.`nip` LIKE '%$katakunci_pegawai%'";
					}
					$sql_jum .= " order by `m`.`nip`";
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
						echo "<li class='page-item'><a class='page-link' href='index.php?include=pegawai&halaman=1'>First</a></li>";
						echo "<li class='page-item'><a class='page-link' href='index.php?include=pegawai&halaman=$sebelum'>«</a></li>";
					}
					//menampilkan angka halaman
					for ($i = 1; $i <= $jum_halaman; $i++) {
						if ($i != $halaman) {
							echo "<li class='page-item'><a class='page-link' href='index.php?include=pegawai&halaman=$i'>$i</a></li>";
						} else {
							echo "<li class='page-item'><a class='page-link'>$i</a></li>";
						}
					}
					if ($halaman != $jum_halaman) {
						echo "<li class='page-item'><a class='page-link'  href='index.php?include=pegawai&halaman=$setelah'>»</a></li>";
						echo "<li class='page-item'><a class='page-link' href='index.php?include=pegawai&halaman=$jum_halaman'>Last</a></li>";
					}
				}
				?>
			</ul>
		</div>
	</div>
	<!-- /.card -->
</section>