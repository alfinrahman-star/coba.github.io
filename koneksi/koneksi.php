<?php
$koneksi = mysqli_connect("localhost", "root", "", "kepegawaian");
//untuk mengecek koneksi 
if (!$koneksi) {
	die("Eror koneksi: " . mysqli_connect_errno());
}
