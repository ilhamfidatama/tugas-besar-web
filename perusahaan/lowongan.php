<?php  
	require 'tambahan.php';
	$id=$_GET['id'];
	if(isset($_POST['simpan'])){
		$judul=$_POST['judul'];
		$jabatan=$_POST['posisi'];
		$spesialisasi=$_POST['spesialisasiP'];
		$batas=$_POST['batas'];
		$gaji=$_POST['gaji'];
		$diterima=$_POST['diterima'];
		$deskripsi=$_POST['deskripsi'];
		$persyaratan=$_POST['persyaratan'];
		date_default_timezone_set('Asia/Brunei');
		$mulai=date("Y-m-d H:i:s");
		mysqli_query($conn, "UPDATE lowongan SET judul='$judul', jabatan='$jabatan', spesialisasi='$spesialisasi', jmlh_terima='$diterima', gaji='$gaji', tanggal_tutup='$batas', deskripsi='$deskripsi', persyaratan='$persyaratan' WHERE id_lowongan='$id'");
	}
	header('location:DaftarLowongan.php');
?>