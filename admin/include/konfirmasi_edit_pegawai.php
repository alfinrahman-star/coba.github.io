<?php
if (isset($_SESSION['nip'])) {
	$nip = $_SESSION['nip'];
	$nama = $_POST['nama'];
	$kode_pegawai = $_POST['jobdesk'];
	$_SESSION['nama'] = $nama;
	$_SESSION['jobdesk'] = $kode_pegawai;
	if (empty($nip)) {
		header("Location:index.php?include=edit_pegawai&data=" . $nip . "&notif=editkosong&jenis=nip");
	} else if (empty($nama)) {
		header("Location:index.php?include=edit_pegawai&data=" . $nip . "&notif=editkosong&jenis=nama");
	} else if (empty($kode_pegawai)) {
		header("Location:index.php?include=edit_pegawai&data=" . $nip . "&notif=editkosong&jenis=jobdesk");
	} else {
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$nama_file = $nip . ".jpg";
		$direktori = 'foto/' . $nama_file;
		if (move_uploaded_file($lokasi_file, $direktori)) {
			$sql = "update `pegawai` set `nama`='$nama',`kode_pegawai`='$kode_pegawai', `foto`='$nama_file' where `nip` = '$nip'";
			mysqli_query($koneksi, $sql);
		} else {
			$sql = "update `pegawai` set `nama`='$nama',`kode_pegawai`='$kode_pegawai'where `nip` = '$nip'";
			mysqli_query($koneksi, $sql);
		}
		//hapus bidang_keahlian
		$sql_d = "delete from `keahlian` where `nip`='$nip'";
		mysqli_query($koneksi, $sql_d);
		//tambah bidang_keahlian
		if (isset($_POST['bidang_keahlian'])) {
			foreach ($_POST['bidang_keahlian'] as $total_portofolio) {
				$sql_i = "insert into `keahlian`(`nip`, `total_portofolio`)values ('$nip', '$total_portofolio')";
				mysqli_query($koneksi, $sql_i);
			}
		}
		unset($_SESSION['nip']);
		unset($_SESSION['nama']);
		unset($_SESSION['jobdesk']);
		header("Location:index.php?include=pegawai&notif=editberhasil");
	}
}
