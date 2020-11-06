<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h3>
					<i class="fas fa-plus"></i> Tambah Pegawai
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
					<li class="breadcrumb-item active">Tambah Pegawai</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title" style="margin-top:5px;">
				<i class="far fa-list-alt"></i> Form Tambah Data Pegawai
			</h3>
			<div class="card-tools">
				<a href="index.php?include=pegawai" class="btn btn-sm btn-warning float-right">
					<i class="fas fa-arrow-alt-circle-left"></i> Kembali
				</a>
			</div>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		</br></br>
		<div class="col-sm-10">
			<?php if ((!empty($_GET['notif'])) && (!empty($_GET['jenis']))) { ?>
				<?php if ($_GET['notif'] == "tambahkosong") { ?>
					<div class="alert alert-danger" role="alert">Maaf data
						<?php echo $_GET['jenis']; ?> wajib di isi
					</div>
				<?php } ?>
			<?php } ?>
		</div>
		<form class="form-horizontal" method="post" enctype="multipart/form-data" action="index.php?include=konfirmasi_tambah_pegawai">
			<div class="card-body">
				<div class="form-group row">
					<label for="judul" class="col-sm-12 col-form-label">
						<span class="text-info">
							<i class="fas fa-user-circle"></i>
							<u> Data Pegawai</u>
						</span>
					</label>
				</div>
				<div class="form-group row">
					<label for="nip" class="col-sm-3 col-form-label">NIP</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" name="nip" id="nip" value="<?php if (!empty($_SESSION['nip'])) {
																								echo $_SESSION['nip'];
																							} ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-sm-3 col-form-label">Nama</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" name="nama" id="nama" value="<?php if (!empty($_SESSION['nama'])) {
																									echo $_SESSION['nama'];
																								} ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="jobdesk" class="col-sm-3 col-form-label">Jobdesk</label>
					<div class="col-sm-7">
						<select class="form-control" id="jobdesk" name="jobdesk">
							<option value="0">- Pilih jobdesk -</option>
							<?php
							$sql_j = "select `kode_pegawai`, `jobdesk` from `jobdesk` order by `kode_pegawai`";
							$query_j = mysqli_query($koneksi, $sql_j);
							while ($data_j = mysqli_fetch_row($query_j)) {
								$kode_pegawai = $data_j[0];
								$jobdesk = $data_j[1];
							?>
								<option value="<?php echo $kode_pegawai; ?>" <?php if (!empty($_SESSION['jobdesk'])) {
																					if ($kode_pegawai == $_SESSION['jobdesk']) { ?> selected="selected" <?php }
																																				} ?>>
									<?php echo $jobdesk; ?>
								<?php } ?>
								</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="foto" class="col-sm-3 col-form-label">Foto </label>
					<div class="col-sm-7">
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="foto" id="customFile">
							<label class="custom-file-label" for="customFile">Choose file</label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="bidang_keahlian" class="col-sm-3 col-form-label">Bidang Keahlian</label>
					<div class="col-sm-7">
						<?php
						$sql_h = "select `total_portofolio`,`bidang_keahlian` from `bidang_keahlian` order by `total_portofolio`";
						$query_h = mysqli_query($koneksi, $sql_h);
						$jum_bidang_keahlian = mysqli_num_rows($query_h);
						while ($data_h = mysqli_fetch_row($query_h)) {
							$total_portofolio = $data_h[0];
							$bidang_keahlian = $data_h[1];
						?>
							<input type="checkbox" name="bidang_keahlian[]" value="<?php echo $total_portofolio; ?>" />
							<?php echo $bidang_keahlian; ?>
							</br>
						<?php } ?>
					</div>
				</div><!-- /.card-body -->
				<div class="card-footer">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-info float-right">
							<i class="fas fa-plus"></i>
							Tambah
						</button>
					</div>
				</div>
				<!-- /.card-footer -->
			</div>
		</form>
	</div>
	<!-- /.card -->
</section>