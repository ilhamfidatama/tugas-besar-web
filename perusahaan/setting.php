<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php  
	require 'tambahan.php';
	session_start();
	$username=$_SESSION['akun'];
	if (isset($_POST['simpan'])) {
		$ks=ambil1("SELECT password FROM perusahaan WHERE username='$username' ");
		$ksLama=$_POST['kslama'];
		if ($ks == $ksLama) {
			$ksBaru=$_POST['ksbaru'];
			$ulangksBaru=$_POST['ksulang'];
			if ($ksBaru == $ulangksBaru) {
				$emailutama=$_POST['eutama'];
				$emailcadangan=$_POST['ecadangan'];
				$hasil=mysqli_query($conn, "UPDATE perusahaan SET email='$emailutama', email_cadangan='$emailcadangan', password='$ksBaru' WHERE username='$username'");
				echo "<script>
					alert('Data berhasil disimpan. ');
				</script>";
				header('location:pengaturan.php');
			}else{
				echo "<script>
					alert('Tulis ulang kata sandi yang baru. ');
				</script>";
				header('location:pengaturan.php');
			}
		}else{
			echo "<script>
				alert('Kata sandi lama anda tidak sesuai dengan database.');
			</script>";
			header('location:pengaturan.php');
		}
	}else {
		header('location:pengaturan.php');
	}
?>
</body>
</html>