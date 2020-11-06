<?php
if (isset($_SESSION['id_admin'])) {
	$id_admin = $_SESSION['id_admin'];
	//get profil
	$sql = "select `nama`, `email`, `level` from `admin` where `id_admin`='$id_admin'";
	//echo $sql;
	$query = mysqli_query($koneksi, $sql);
	while ($data = mysqli_fetch_row($query)) {
		$nama = $data[0];
		$email = $data[1];
		$level = $data[2];
	}
}
?>
<link rel="stylesheet" href="css/css.css">
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h3>
					<i class="nav-icon fas fa-user"></i> Profil Pegawai
				</h3>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item">
						<a href="#">Home</a>
					</li>
					<li class="breadcrumb-item active">Profil</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
<!-- Main content -->
	<div class="card">
		<div class="card-header">
			<div class="card-tools">
				<a href="index.php?include=edit_profil" class="btn btn-sm btn-info float-right">
					<i class="fas fa-edit"></i> Edit Profil
				</a>
			</div>
		</div>
		<!-- /.card-header -->
		<div class="container-fluid">
		<div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body profile-card">
                    <center class="m-t-30">
						<img src="foto/officer.png" class="img-fluid" class="rounded-circle" width="185" /><br><br>
						<?php echo $nama;?></h4>
					</center>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material">
						<div class="form-group">
                            <label class="col-md-12 mb-0">Nama</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="<?php echo $nama;?>" class="form-control pl-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Email</label>
                            <div class="col-md-12">
                                <input type="email" placeholder="<?php echo $email;?>" class="form-control pl-0 form-control-line" name="example-email" id="example-email">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-12 mb-0">Level</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="<?php echo $level;?>" class="form-control pl-0 form-control-line">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</div>
</div>
		<!-- /.card-body -->
		<div class="card-footer clearfix">&nbsp;</div>
	</div>
	<!-- /.card -->