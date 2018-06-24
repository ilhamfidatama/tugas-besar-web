<html> <body>
	<?php
		$username=$_POST['username'];
		$namaP=$_POST['namaPerusahaan'];
		$email=$_POST['email'];
		$katasandi=$_POST['password'];
		$ulang=$_POST['ulang'];
		$conn=mysqli_connect("localhost", "root", "", "lope");
		
		if($katasandi==$ulang){
			echo"berhasil";
			echo $username."<br>";
			echo $namaP."<br>";
			echo $email."<br>";
			echo $katasandi."<br>";
			mysqli_query($conn, "INSERT INTO perusahaan(username, password, nama_perusahaan, email) VALUE ('$username','$katasandi','$namaP','$email')");
			header('location:daftar.html');
		}
		else{
			echo"gagal";
		}
	?>
</body></html>