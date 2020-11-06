<?php
if (isset($_GET['data'])) {
	$kode_pegawai = $_GET['data'];
	$_SESSION['kode_pegawai'] = $kode_pegawai;

	//get data hobi
	$sql_d = "select `jobdesk` from `jobdesk` where `kode_pegawai` = '$kode_pegawai'";
	$query_d = mysqli_query($koneksi, $sql_d);
	while ($data_d = mysqli_fetch_row($query_d)) {
		$jobdesk = $data_d[0];
	}
}
?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h3>
					<i class="fas fa-edit"></i> Edit Jobdesk
				</h3>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item">
						<a href="#">Home</a>
					</li>
					<li class="breadcrumb-item">
						<a href="index.php?include=jobdesk">Jobdesk</a>
					</li>
					<li class="breadcrumb-item active">Edit Jobdesk</li>
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
				<i class="far fa-list-alt"></i> Form Edit Jobdesk
			</h3>
			<div class="card-tools">
				<a href="index.php?include=jobdesk" class="btn btn-sm btn-warning float-right">
					<i class="fas fa-arrow-alt-circle-left"></i> Kembali
				</a>
			</div>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<?php if (!empty($_GET['notif'])) { ?>
			<?php if ($_GET['notif'] == "editkosong") { ?>
				<div class="alert alert-danger" role="alert">Maaf data Jobdesk wajib di isi</div>
			<?php } ?>
		<?php } ?>
		<form class="form-horizontal" action="index.php?include=konfirmasi_edit_jobdesk" method="post">
			<div class="card-body">
				<div class="form-group row">
					<label for="jobdesk" class="col-sm-3 col-form-label">Jobdesk</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="jobdesk" name="jobdesk" value="<?php echo $jobdesk; ?>">
					</div>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-info float-right">
						<i class="fas fa-save"></i> Simpan
					</button>
				</div>
			</div>
			<!-- /.card-footer -->
		</form>
	</div>
	<!-- /.card -->
</section>