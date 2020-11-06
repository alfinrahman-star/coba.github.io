<?php
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$kode_pegawai = $_POST['jobdesk'];
$_SESSION['nip'] = $nip;
$_SESSION['nama'] = $nama;
$_SESSION['jobdesk'] = $kode_pegawai;
if (empty($nip)) {
	header("Location:index.php?include=tambah_pegawai&notif=tambahkosong&jenis=nip");
} else if (empty($nama)) {
	header("Location:index.php?include=tambah_pegawai&notif=tambahkosong&jenis=nama");
} else if (empty($kode_pegawai)) {
	header("Location:index.php?include=tambah_pegawai&notif=tambahkosong&data=jobdesk");
} else {
	$lokasi_file = $_FILES['foto']['tmp_name'];
	$nama_file = $nip . ".jpg";
	$direktori = 'foto/' . $nama_file;
	if (move_uploaded_file($lokasi_file, $direktori)) {
		$sql = "insert into `pegawai` (`nip`, `nama`, `kode_pegawai`, `foto`)values ('$nip', '$nama', '$kode_pegawai', '$nama_file')";
		mysqli_query($koneksi, $sql);
	} else {
		$sql = "insert into `pegawai` (`nip`, `nama`, `kode_pegawai`)values ('$nip', '$nama', '$kode_pegawai')";
		mysqli_query($koneksi, $sql);
	}
	if (isset($_POST['bidang_keahlian'])) {
		foreach ($_POST['bidang_keahlian'] as $total_portofolio) {
			$sql_i = "insert into `keahlian` (`nip`, `total_portofolio`) values ('$nip', '$total_portofolio')";
			mysqli_query($koneksi, $sql_i);
		}
	}
	unset($_SESSION['nip']);
	unset($_SESSION['nama']);
	unset($_SESSION['jobdesk']);
	header("Location:index.php?include=pegawai&notif=tambahberhasil");
}
