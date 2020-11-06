<?php
if (isset($_SESSION['total_portofolio'])) {
	$total_portofolio = $_SESSION['total_portofolio'];
	$bidang_keahlian = $_POST['bidang_keahlian'];
	if (empty($bidang_keahlian)) {
		header("Location:index.php?include=edit_bidang_keahlian&data=" . $total_portofolio . "&notif=editkosong");
	} else {
		$sql = "update `bidang_keahlian` set `bidang_keahlian`='$bidang_keahlian' where `total_portofolio`='$total_portofolio'";
		mysqli_query($koneksi, $sql);
		header("Location:index.php?include=bidang_keahlian&notif=editberhasil");
	}
}
