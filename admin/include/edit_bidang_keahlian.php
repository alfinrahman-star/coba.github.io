<?php
if (isset($_GET['data'])) {
	$total_portofolio = $_GET['data'];
	$_SESSION['total_portofolio'] = $total_portofolio;

	//get data bidang keahlian
	$sql_d = "select `bidang_keahlian` from `bidang_keahlian` where `total_portofolio` = '$total_portofolio'";
	$query_d = mysqli_query($koneksi, $sql_d);
	while ($data_d = mysqli_fetch_row($query_d)) {
		$bidang_keahlian = $data_d[0];
	}
}
?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h3>
					<i class="fas fa-edit"></i> Edit bidang keahlian
				</h3>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item">
						<a href="#">Home</a>
					</li>
					<li class="breadcrumb-item">
						<a href="index.php?include=bidang_keahlian">Bidang Keahlian</a>
					</li>
					<li class="breadcrumb-item active">Edit Bidang Keahlian</li>
				</ol>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title" style="margin-top:5px;">
				<i class="far fa-list-alt"></i> Form Edit Bidang Keahlian
			</h3>
			<div class="card-tools">
				<a href="index.php?include=bidang_keahlian" class="btn btn-sm btn-warning float-right">
					<i class="fas fa-arrow-alt-circle-left"></i> Kembali
				</a>
			</div>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<?php if (!empty($_GET['notif'])) { ?>
			<?php if ($_GET['notif'] == "editkosong") { ?>
				<div class="alert alert-danger" role="alert">Maaf data Bidang Keahlian wajib di isi</div>
			<?php } ?>
		<?php } ?>
		<form class="form-horizontal" action="index.php?include=konfirmasi_edit_bidang_keahlian " method="post">
			<div class="card-body">
				<div class="form-group row">
					<label for="bidang_keahlian" class="col-sm-3 col-form-label">Bidang Keahlian</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="bidang_keahlian" name="bidang_keahlian" value="<?php echo $bidang_keahlian; ?>">
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