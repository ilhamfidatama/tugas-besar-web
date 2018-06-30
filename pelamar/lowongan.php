<?php
    require 'tambahan.php';
    session_start();
    $pelamar=$_SESSION['pelamar'];
    if (isset($_POST['lamar'])) {
        $id_lowongan = $_POST['job'];
        $cv=uploadCV();
        $berkas=uploadtambahan();
        
        date_default_timezone_set('Asia/Brunei');
        $tanggal=date("Y-m-d H:i:s");
        $lamar = mysqli_query($conn, "INSERT INTO melamar(username_pelamar, id_lowongan, tanggal_mendaftar, berkas_tambahan, cv) VALUES ('$pelamar', $id_lowongan, '$tanggal', '$berkas', '$cv') ");
        echo "<script>
            alert('Berhasil Melamar');
        </script>";
    }
    if($pelamar=="" || $pelamar==" "){
        header("location:masuk.html");
    } 
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
                    <form id="company" method="post" action="perusahaan.php">
                        <button name="nama_perusahaan" value="<?=$perusahaan['nama_perusahaan']; ?>"><?=$perusahaan['nama_perusahaan']; ?></button>
                    </form>
                </div>
                <div id="berlaku">
                    <p>dibuka pada : <?=$lowongan['tanggal_buka']; ?> WITA</p>
                    <p>ditutup pada : <?=$lowongan['tanggal_tutup']; ?></p>
                </div>
        	</nav>
            <article id="kiri">
              <h1><?=$lowongan['judul']; ?></h1>
            	<label>Deskripsi Pekerjaan</label>
                <p align="justify"><?=$lowongan['deskripsi']; ?></p>
                <label>Persyaratan</label>
                <p align="justify"><?=$lowongan['persyaratan']; ?></p>
            </article>
            <article class="kanan1">
            	<label>Gambaran Perusahaan</label>
                <br>
                <table border="0" width="100%" cellpadding="5" cellspacing="1">
                	<tbody>
                    	<tr valign="top">
                        	<th width="50%">Situs</th>
                            <th width="50%">Industri</th>
                        </tr>
                        <tr valign="top">
                        	<td id="situs"><a href="<?=$perusahaan['website']; ?>"><?=$perusahaan['website']; ?></a></td>
                            <td id="industri"><?=$perusahaan['bidang']; ?></td>
                        </tr>
                        <tr valign="top">
                        	<th width="50%">Ukuran Perusahaan</th>
                            <th width="50%">Nomor Telepon</th>
                        </tr>
                        <tr valign="top">
                        	<td id="ukuran"><?=$perusahaan['jmlh_pegawai'] ?></td>
                            <td id="nomor"><?=$perusahaan['no_telpon']; ?></td>
                        </tr>
                        <tr valign="top">
                        	<th width="50%">Alamat</th>
                            <th width="50%">Waktu Bekerja</th>
                        </tr>
                        <tr valign="top">
                        	<td id="pakaian"><?=$perusahaan['alamat_perusahaan']; ?></td>
                            <td id="waktu_kerja"><?=$perusahaan['jam_kerja']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </article>
            <article class="kanan1">
                <form method="post" action="" enctype="multipart/form-data">
                    <input type="hidden" name="job" value="<?=$id_lowongan; ?>">
                    <label>Upload CV (.pdf) </label>
                    <input type="file" name="cv" value="">
                    <br><br>
                    <label>Upload Berkas Pendukung (.pdf)</label>
                    <input type="file" name="berkas" value="">
                    <br><br>
                    <button type="submit" name="lamar">Lamar</button>
                </form>
            </article>
        </section>
        
		<footer class="bawah" align="right"><p>Hak Cipta &copy;Informatika UNRAM</p></footer>
</body>
</html>
