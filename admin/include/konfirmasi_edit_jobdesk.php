<?php
if (isset($_SESSION['kode_pegawai'])) {
	$kode_pegawai = $_SESSION['kode_pegawai'];
	$jobdesk = $_POST['jobdesk'];
	if (empty($jobdesk)) {
		header("Location:index.php?include=edit_jobdesk&data=" . $kode_pegawai . "&notif=editkosong");
	} else {
		$sql = "update `jobdesk` set `jobdesk`='$jobdesk' where `kode_pegawai`='$kode_pegawai'";
		mysqli_query($koneksi, $sql);
		header("Location:index.php?include=jobdesk&notif=editberhasil");
	}
}
