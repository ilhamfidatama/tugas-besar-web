<?php
	session_start();
	$username=$_POST['username'];
	$pass=$_POST['password'];
	$conn=mysqli("localhost", "root", "", "lope");
	echo"cobaa";
	/*if($conn){
		$user_db=mysqli_query($conn, "select username from perusahaan where username='$username'");
		$pass_db=mysqli_query($conn, "select password from perusahaan where username='$username'");
		if($user_db==$username and $pass_db==$pass){
			echo"login berhasil";
			$_SESSION['user']=$username;
			header('location:pengaturan.html');
		}
		else{
			echo"login gagal, ulangi";
			header('location:masuk.html');
		}
		mysqli_close($conn);
	}
	else{
		echo"server gagal";
	}*/
?>