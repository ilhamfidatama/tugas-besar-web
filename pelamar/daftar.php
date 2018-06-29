<html> <body>
	<?php
		$username=$_POST['username'];
		$namaP=$_POST['namaPelamar'];
		$email=$_POST['email'];
		$katasandi=$_POST['password'];
		$ulang=$_POST['ulang'];
		$conn=mysqli_connect("localhost", "root", "", "lope");
		
		if ($katasandi != "" || $katasandi != " ") {
			if ($ulang != "" || $ulang != " ") {
				if($katasandi==$ulang){
					mysqli_query($conn, "INSERT INTO pelamar(username, password, nama_lengkap, email) VALUE ('$username','$katasandi','$namaP','$email')");
					header('location:masuk.html');
				}else{
					header('location:daftar.html');
				}
			}else{
				header('location:daftar.html');
			}
		}else{
			header('location:daftar.html');
		}
	?>
</body></html>