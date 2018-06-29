<?php  
	require 'tambahan.php';
	session_start();
	$pelamar = $_SESSION['pelamar'];
	$id_lowongan = $_POST['job'];
	$cv=uploadCV();
	$berkas=uploadtambahan();
	
	date_default_timezone_set('Asia/Brunei');
	$tanggal=date("Y-m-d H:i:s");
	$lamar = mysqli_query($conn, "INSERT INTO melamar(username_pelamar, id_lowongan, tanggal_mendaftar, berkas_tambahan, cv) VALUES ('$pelamar', $id_lowongan, '$tanggal', '$berkas', '$cv') ");
	header('location:Riwayat.php');
?>