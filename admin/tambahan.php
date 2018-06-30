<?php 
	$conn=mysqli_connect("localhost", "root", "", "lope");

	function ambils($querry){
		global $conn;
		$hasil=mysqli_query($conn, $querry);
		$tempat = [];
		while ($baris=mysqli_fetch_assoc($hasil)) {
			$tempat[] = $baris;
		}
		return $tempat;
	}

	function ambil1($querry){
		global $conn;
		$hasil=mysqli_query($conn, $querry);
		list($isi) = mysqli_fetch_row($hasil);
		return $isi;
	}

	function numer($query){
		global $conn;
		$hasil=mysqli_query($conn, $query);
		$baris=mysqli_fetch_row($hasil);
		$banyak = count($baris);
		return $banyak;

	}

	function uploadGambar(){
		$namafile=$_FILES['logo']['name'];
		$size=$_FILES['logo']['size'];
		$error=$_FILES['logo']['error'];
		$tmpnama=$_FILES['logo']['tmp_name'];


		if($error == 4){
			echo "<script>
				alert('Pilih gambar terlebih dahulu');
			</script>";
			return false;
		}

		//cek jenis file yang di upload
		$ekstensifilevalid=['jpg', 'jpeg', 'png'];
		$ekstensi=explode('.', $namafile);
		$ekstensi=strtolower(end($ekstensi));
		if(!in_array($ekstensi, $ekstensifilevalid) ){

			echo "<script>
				alert('upload gambar saja');
			</script>";
		}

		//cek size file gambar
		if($size>1000000){
			echo "<script>
				alert('ukuran gambar terlalu besar');
			</script>";
		}

		$namabaru=uniqid();
		$namabaru .= '.';
		$namabaru .= $ekstensi;

		move_uploaded_file($tmpnama, 'img/'.$namabaru);

		return $namabaru;
	}

	function uploadCV(){
		$namafile=$_FILES['cv']['name'];
		$size=$_FILES['cv']['size'];
		$error=$_FILES['cv']['error'];
		$tmpnama=$_FILES['cv']['tmp_name'];


		if($error == 4){
			echo "<script>
				alert('Pilih gambar terlebih dahulu');
			</script>";
			return false;
		}

		//cek jenis file yang di upload
		$ekstensifilevalid=['pdf'];
		$ekstensi=explode('.', $namafile);
		$ekstensi=strtolower(end($ekstensi));
		if(!in_array($ekstensi, $ekstensifilevalid) ){

			echo "<script>
				alert('upload gambar saja');
			</script>";
		}

		//cek size file gambar
		if($size>1000000){
			echo "<script>
				alert('ukuran gambar terlalu besar');
			</script>";
		}

		$namabaru=uniqid();
		$namabaru .= '.';
		$namabaru .= $ekstensi;

		move_uploaded_file($tmpnama, '../melamar/cv/'.$namabaru);

		return $namabaru;
	}

	function uploadTambahan(){
		$namafile=$_FILES['berkas']['name'];
		$size=$_FILES['berkas']['size'];
		$error=$_FILES['berkas']['error'];
		$tmpnama=$_FILES['berkas']['tmp_name'];


		if($error == 4){
			echo "<script>
				alert('Pilih gambar terlebih dahulu');
			</script>";
			return false;
		}

		//cek jenis file yang di upload
		$ekstensifilevalid=['pdf'];
		$ekstensi=explode('.', $namafile);
		$ekstensi=strtolower(end($ekstensi));
		if(!in_array($ekstensi, $ekstensifilevalid) ){

			echo "<script>
				alert('upload gambar saja');
			</script>";
		}

		//cek size file gambar
		if($size>1000000){
			echo "<script>
				alert('ukuran gambar terlalu besar');
			</script>";
		}

		$namabaru=uniqid();
		$namabaru .= '.';
		$namabaru .= $ekstensi;

		move_uploaded_file($tmpnama, '../melamar/berkas/'.$namabaru);

		return $namabaru;
	}

	function uploadProfil(){
		$namafile=$_FILES['foto']['name'];
		$size=$_FILES['foto']['size'];
		$error=$_FILES['foto']['error'];
		$tmpnama=$_FILES['foto']['tmp_name'];

		if($error == 4){
			echo "<script>
				alert('Pilih gambar terlebih dahulu');
			</script>";
			return false;
		}

		//cek jenis file yang di upload
		$ekstensifilevalid=['jpg', 'jpeg', 'png'];
		$ekstensi=explode('.', $namafile);
		$ekstensi=strtolower(end($ekstensi));
		if(!in_array($ekstensi, $ekstensifilevalid) ){

			echo "<script>
				alert('upload gambar saja');
			</script>";
		}

		//cek size file gambar
		if($size>1000000){
			echo "<script>
				alert('ukuran gambar terlalu besar');
			</script>";
		}

		$namabaru=uniqid();
		$namabaru .= '.';
		$namabaru .= $ekstensi;

		move_uploaded_file($tmpnama, 'img/'.$namabaru);

		return $namabaru;
	}
 ?>