<!DOCTYPE html>
<?php
session_start();
include('../koneksi/koneksi.php');
if (isset($_GET["include"])) {
	$include = $_GET["include"];
	if ($include == "konfirmasi_login") {
		include("include/konfirmasi_login.php");
	} else if ($include == "sign_out") {
		include("include/sign_out.php");
	} else if ($include == "konfirmasi_tambah_bidang_keahlian") {
		include("include/konfirmasi_tambah_bidang_keahlian.php");
	} else if ($include == "konfirmasi_edit_bidang_keahlian") {
		include("include/konfirmasi_edit_bidang_keahlian.php");
	} else if ($include == "konfirmasi_tambah_jobdesk") {
		include("include/konfirmasi_tambah_jobdesk.php");
	} else if ($include == "konfirmasi_edit_jobdesk") {
		include("include/konfirmasi_edit_jobdesk.php");
	} else if ($include == "konfirmasi_tambah_pegawai") {
		include("include/konfirmasi_tambah_pegawai.php");
	} else if ($include == "konfirmasi_edit_pegawai") {
		include("include/konfirmasi_edit_pegawai.php");
	} else if ($include == "konfirmasi_tambah_user") {
		include("include/konfirmasi_tambah_user.php");
	} else if ($include == "konfirmasi_edit_user") {
		include("include/konfirmasi_edit_user.php");
	} else if ($include == "konfirmasi_edit_profil") {
		include("include/konfirmasi_edit_profil.php");
	}
}
?>
<html>

<head>
	<?php include("includes/head.php") ?>
</head>
<?php
//jika ada get include
if (isset($_GET["include"])) {
	$include = $_GET["include"];
	//jika ada session id admin
	if (isset($_SESSION['id_admin'])) {
		//pemanggilan ke halaman-halaman menu admin
?>

		<body class="hold-transition sidebar-mini layout-fixed">
			<div class="wrapper">
				<?php include("includes/header.php") ?>
				<?php include("includes/sidebar.php") ?>
				<!-- Content Wrapper. Contains page content -->
				<div class="content-wrapper">
					<?php
					if ($include == "bidang_keahlian") {
						include("include/bidang_keahlian.php");
					} else if ($include == "tambah_bidang_keahlian") {
						include("include/tambah_bidang_keahlian.php");
					} else if ($include == "edit_bidang_keahlian") {
						include("include/edit_bidang_keahlian.php");
					} else if ($include == "jobdesk") {
						include("include/jobdesk.php");
					} else if ($include == "tambah_jobdesk") {
						include("include/tambah_jobdesk.php");
					} else if ($include == "edit_jobdesk") {
						include("include/edit_jobdesk.php");
					} else if ($include == "pegawai") {
						include("include/pegawai.php");
					} else if ($include == "tambah_pegawai") {
						include("include/tambah_pegawai.php");
					} else if ($include == "edit_pegawai") {
						include("include/edit_pegawai.php");
					} else if ($include == "detail_pegawai") {
						include("include/detail_pegawai.php");
					} else if ($include == "user") {
						include("include/user.php");
					} else if ($include == "tambah_user") {
						include("include/tambah_user.php");
					} else if ($include == "edit_user") {
						include("include/edit_user.php");
					} else if ($include == "edit_profil") {
						include("include/edit_profil.php");
					} else if ($include == "profil_anggota"){
						include("include/profil_anggota.php");
					}else {
						include("include/profil.php");
					}
					?>
					<!---/Content--->
				</div>
				<!---/Content wrapper--->
				<?php include("includes/footer.php") ?>
			</div>
			<!-- ./wrapper -->
			<?php include("includes/script.php") ?>
		</body>
<?php
	}
} else {
	//jika tidak ada include pemanggilan halaman form login
	include("include/login.php");
}
?>

</html>