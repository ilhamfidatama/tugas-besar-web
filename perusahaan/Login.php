<?php 
	session_start();
	$username=$_POST["username"];
	$password=$_POST["password"];
	$koneksi=mysqli_connect("localhost", "root", "", "lope");
	$login = mysqli_query($koneksi, "SELECT * FROM perusahaan WHERE username='$username' AND password='$password'");
	$rowcount =  mysqli_num_rows($login);
	if ($rowcount==1)
	{
		$_SESSION['username']=$username;
		print " <p align='center'>Login berhasil, anda akan segera diarahkan ke halaman beranda  <br><img src='../image/load.gif' alt='Loading' width='50'> </p>";
		header("refresh:3; url=../beranda.php");
	}
	else
	{
		echo '<script type="text/javascript">alert("Username atau Password salah!");</script>';
		header("refresh:0.05; url=../login.html");
	}
?>