<?php  
	require 'tambahan.php';
	session_start();
	$username = $_SESSION['pelamar'];
	if (isset($_POST['simpan'])) {
		$nama_lengkap = $_POST['nama_lengkap'];
		$tanggal_lahir = $_POST['tanggal_lahir'];
		$tinggi_badan = $_POST['tinggi_badan'];
		$no_telpon = $_POST['nomor_telpon'];
		$alamat = $_POST['alamat'];
		//cek apakah mau upload foto profil atau tidak
		if ($_FILES['foto']['name'] != "") {
			$foto_profil = uploadProfil();
		}else{
			$foto_profil = $_POST['fotoP'];
		}
		//cek jenis kelamin di set ulang atau tidak
		if ($_POST['jenis_kelamin'] != "") {
			$jenis_kelamin = $_POST['jenis_kelamin'];
		}else{
			$jenis_kelamin = $_POST['jk'];
		}
		//cek agama apakah di set ulang atau tidak
		if ($_POST['agama'] != "") {
			$agama = $_POST['agama'];
		}else{
			$agama = $_POST['religion'];
		}
		//cek status apakah di set ulang atau tidak
		if ($_POST['status'] != "") {
			$status = $_POST['status'];
		}else{
			$status = $_POST['stat'];
		}
		$update = mysqli_query($conn, "UPDATE pelamar SET nama_lengkap='$nama_lengkap', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', no_telpon='$no_telpon', alamat_pelamar='$alamat', status='$status', tinggi_badan=$tinggi_badan, agama='$agama', foto_profil='$foto_profil'");

		header('location:ProfilPelamar.php');
	}
?>