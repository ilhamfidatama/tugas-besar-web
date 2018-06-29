<?php  
  require 'tambahan.php';
  session_start();
  $username=$_SESSION['akun'];
  if($username=="" || $username==" "){
    header("location:masuk.html");
  }
  
  $perusahaan=ambils("SELECT * FROM perusahaan WHERE username='$username'")[0];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Pengaturan</title>
<link href="perusahaan.css" rel="stylesheet" type="text/css">
</head>
<body>
		<header>
        	<div class="logo">
        		<img src="../foto/logo.jpg" alt="lOker" width="150px">
        	</div>
        	<div class="menu">
        	<table width="100%" border="0">
  			<tbody valign="middle">
    			<tr>
      				<td align="left">
      					<a href="ProfilPerusahaan.php"> <?= $perusahaan['nama_perusahaan']; ?> </a>
      				</td>
      				<td align="right">
      					<a href="keluar.php"> Keluar </a>
      				</td>
    			</tr>
  			</tbody>
			</table>
        	</div>
        </header>
		<section>
        	<nav>
            	<ul>
                <li><a href="ProfilPerusahaan.php">Profil Perusahaan</a></li>
                <li><a href="DaftarLowongan.php">Manajemen Pekerjaan</a></li>
                <li><a href="DaftarPelamar.php">Pelamar</a></li>
                <li><a href="PostingPekerjaan.php">Upload Lowongan</a></li>
                <li><a href="pengaturan.php">Pengaturan</a></li>
    			     </ul>
            </nav>
            <article>
            	<form name="pengaturan" method="post" action="setting.php">
            	<label>Pengaturan Akun</label>
                <p>Email Utama :</p>
                <input type="email" name="eutama" value="<?= $perusahaan['email']; ?>">
                <p>Email Cadangan :</p>
                <input type="email" name="ecadangan" value="<?= $perusahaan['email_cadangan']; ?>">
                <p>Kata Sandi Lama :</p>
                <input type="password" name="kslama" value="">
                <p>Kata Sandi Baru :</p>
                <input type="password" name="ksbaru" minlength="8" value="">
                <p>Ulangi Kata Sandi :</p>
                <input type="password" name="ksulang" minlength="8" value="">
                <br><br>
                <button class="batal" type="submit" name="batal" value="0">Batal</button>
                <button class="simpan" type="submit" name="simpan" value="1">Simpan</button>
            </form>
        	</article>
        </section>
        
		<footer class="bawah" align="right"><p>Hak Cipta &copy;Informatika UNRAM</p></footer>
</body>
</html>
