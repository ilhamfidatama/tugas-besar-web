<html> <body>
<?php
	$username=$_POST['username'];
	$pass=$_POST['password'];
	$conn=mysqli_connect("localhost", "root", "", "lope");
	if($conn){
		$user_db=mysqli_query($conn, "select username,password from perusahaan where username='$username'");
		$baris=mysqli_fetch_row($user_db);
		list($user,$pas)=$baris;
		if($user==$username and $pas==$pass){
			session_start();
			$_SESSION['akun']=$username;
			echo"berhasil ".$username;
			header('location:ProfilPerusahaan.php');
		}
		else{
			echo"gagal";
			header('location:masuk.html');
		}
		mysqli_close($conn);
	}
	else{
		echo"server gagal";
	}
	?>
</body> </html>