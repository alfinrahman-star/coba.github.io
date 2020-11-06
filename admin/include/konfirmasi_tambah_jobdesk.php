<?php 
	$jobdesk = $_POST['jobdesk'];
	if(empty($jobdesk)){
		header("Location:index.php?include=tambah_jobdesk&notif=tambahkosong");
	}else{
		$sql = "insert into `jobdesk` (`jobdesk`) values ('$jobdesk')";
		mysqli_query($koneksi,$sql);
		header("Location:index.php?include=jobdesk&notif=tambahberhasil");	
	}
