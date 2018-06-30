<?php
	require 'tambahan.php';
	session_start();
	$username=$_SESSION['akun'];
	$hasil=$_POST['simpan'];
	$nama=$_POST['nama'];
	$alamat=$_POST['alamat_perusahaan'];
	$tanggal=$_POST['tanggal_berdiri'];
	$npwp=$_POST['npwp'];
	$telpon=$_POST['telepon'];
	$bidang=$_POST['jenis'];
	$website=$_POST['website'];
	$area=$_POST['area'];
	$pegawai=$_POST['jumlah_pegawai'];
	$kerja=$_POST['jam_kerja'];
	$des=$_POST['deskripsi'];
	$vis=$_POST['visi'];
	$mis=$_POST['misi'];
	$gambarlama=$_POST['logolama'];

	if ( $_FILES['logo']['error'] == 4 ) {
		$gambar=$gambarlama;
	}else{
		$gambar=uploadGambar();
	}


	if($hasil==1){
		$update=mysqli_query($conn, "UPDATE perusahaan SET nama_perusahaan='$nama',alamat_perusahaan='$alamat', no_telpon='$telpon', tanggal_terdaftar='$tanggal', bidang='$bidang', deskripsi='$des', visi='$vis', misi='$mis', jmlh_pegawai='$pegawai', website='$website', jam_kerja='$kerja', npwp='$npwp', area='$area', foto_perusahaan='$gambar' WHERE username='$username'");
		header('location:ProfilPerusahaan.php');
	}else{
		header('location:edit profil.php');
	}
	mysqli_close($conn);
?>