<?php
    require 'tambahan.php';
    session_start();
    $pelamar=$_SESSION['pelamar'];
    $id_lowongan=$_GET['id'];
    $lowongan = ambils("SELECT * FROM lowongan WHERE id_lowongan='$id_lowongan' ")[0];
    $username_perusahaan = $lowongan['username_perusahaan'];
    $perusahaan = ambils("SELECT * FROM perusahaan WHERE username='$username_perusahaan' ")[0];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Deskripsi Lowongan</title>
<link href="Pelamar.css" rel="stylesheet" type="text/css">
</head>
<body>
		<header>
        	<div class="logo">
        		<img src="../foto/logo.jpg" alt="lOker" width="150px">
        	</div>
            <nav>
            	<ul>
                	<li><a href="beranda.php">Beranda</a></li>
                    <li><a href="CariLowongan.php">Cari Lowongan</a></li>
                    <li><a href="ProfilPelamar.php">Profil</a></li>
                    <li><a href="Riwayat.php">Riwayat</a></li>
                    <li id="menuKanan"><a href="keluar.php">Keluar</a></li>
                </ul>
            </nav>
        </header>
		<section>
        	<nav id="perusahaan">
                <img alt="foto" width="100px" height="100px" src="../perusahaan/img/<?=$perusahaan['foto_perusahaan']; ?> ">
                <div id="kerja">
                    <p><?=$lowongan['spesialisasi'] ?></p>
                    <a href="perusahaan.php?perusahaan=<?=$perusahaan['nama_perusahaan']; ?>"><?=$perusahaan['nama_perusahaan']; ?></a>
                </div>
            </nav>
            <article id="kiri">
            	<label>Deskripsi Pekerjaan</label>
                <p align="justify"><?=$lowongan['deskripsi']; ?></p>
                <label>Persyaratan</label>
                <p align="justify"><?=$lowongan['persyaratan']; ?></p>
            </article>
            <article id="kanan">
            	<label>Gambaran Perusahaan</label>
                <br>
                <table border="0" width="100%" cellpadding="5" cellspacing="1">
                	<tbody>
                    	<tr>
                        	<th width="50%">Situs</th>
                            <th width="50%">Industri</th>
                        </tr>
                        <tr>
                        	<td id="situs"><a href="<?=$perusahaan['website']; ?>"><?=$perusahaan['website']; ?></a></td>
                            <td id="industri"><?=$perusahaan['bidang']; ?></td>
                        </tr>
                        <tr>
                        	<th width="50%">Ukuran Perusahaan</th>
                            <th width="50%">Nomor Telepon</th>
                        </tr>
                        <tr>
                        	<td id="ukuran"><?=$perusahaan['jmlh_pegawai'] ?></td>
                            <td id="nomor"><?=$perusahaan['no_telpon']; ?></td>
                        </tr>
                        <tr>
                        	<th width="50%">Alamat</th>
                            <th width="50%">Waktu Bekerja</th>
                        </tr>
                        <tr>
                        	<td id="pakaian"><?=$perusahaan['alamat_perusahaan']; ?></td>
                            <td id="waktu_kerja"><?=$perusahaan['jam_kerja']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </article>
            <div id="bawah">
                <form name="lamar" method="post" action="lamar.php">
                	<button type="submit">Lamar</button>
                </form>
            </div>
            <div id="berlaku">
            	
            </div>
        </section>
        
		<footer class="bawah" align="right"><p>Hak Cipta &copy;Informatika UNRAM</p></footer>
</body>
</html>
