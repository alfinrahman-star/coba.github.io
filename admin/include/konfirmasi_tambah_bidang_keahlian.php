<?php 
	$bidang_keahlian = $_POST['bidang_keahlian'];
	if(empty($bidang_keahlian)){
		header("Location:index.php?include=tambah_bidang_keahlian&notif=tambahkosong");
	}else{
		$sql = "insert into `bidang_keahlian` (`bidang_keahlian`)values ('$bidang_keahlian')";
		mysqli_query($koneksi,$sql);
		header("Location:index.php?include=bidang_keahlian&notif=tambahberhasil");	
	}
