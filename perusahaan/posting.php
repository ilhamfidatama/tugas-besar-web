<?php  
	require 'tambahan.php';
	session_start();
	$username=$_SESSION['akun'];
	if(isset($_POST['posting']) ){
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

		$tambah=mysqli_query($conn, "INSERT INTO lowongan (judul, jabatan, spesialisasi, jmlh_terima, gaji, tanggal_buka, tanggal_tutup, deskripsi, persyaratan, username_perusahaan) VALUES ('$judul', '$jabatan', '$spesialisasi', $diterima, '$gaji', '$mulai', '$batas', '$deskripsi', '$persyaratan', '$username') ");
		var_dump($tambah);
		// echo "<script>
		// 		alert('Lowongan berhasil diupload');
		// 	</script>";
		// header('location:DaftarLowongan.php');
	}else{
		// header('location:ProfilPerusahaan.php');
	}
?>