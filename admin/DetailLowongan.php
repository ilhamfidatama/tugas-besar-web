<?php  
    require 'tambahan.php';
    session_start();
    $username = $_SESSION['admin'];
    if ($username == "" || $username == " ") {
        header('location:masuk.html');
    }
    $id_lowongan = $_POST['loker'];
    $lowongan = ambils("SELECT * FROM lowongan WHERE id_lowongan='$id_lowongan'")[0];
    $username_perusahaan = ambil1("SELECT username_perusahaan FROM lowongan WHERE id_lowongan ='$id_lowongan' ");
    $nama_perusahaan = ambil1("SELECT nama_perusahaan FROM perusahaan WHERE username='$username_perusahaan' ");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ADMIN</title>
<link href="admin.css" rel="stylesheet" type="text/css">
</head>
<body>
	<section>
    	<nav id="kiri">
        	<img src="../foto/logo.jpg" alt="logo">
            <hr>
            <ul>
                <li><a href="pelamar.php">Pelamar</a></li>
                <li><a href="perusahaan.php">Perusahaan</a></li>
                <li><a href="loker.php">Lowongan Pekerjaan</a></li>
                <li><a href="keluar.php">Keluar</a></li>
            </ul>
        </nav>
        <article id="kanan">
        	<h1><?=$lowongan['judul']; ?></h1>
            <h3><?=$lowongan['tanggal_buka']; ?></h3>
            <table id="detail" width="100%" border="0" cellspacing="2px" cellpadding="2px">
              <tbody>
                <tr>
                	<td width="20%">Nama Perusahaan </td>
                    <td width="1px">:</td>
                    <td width=""><?=$nama_perusahaan ?></td>
                    <td width="30%" rowspan="5"><img src="../perusahaan/lowongan/<?=$lowongan['gambar']; ?>"></td>
                </tr>
                <tr>
                	<td>Jabatan</td>
                    <td>:</td>
                    <td><?=$lowongan['jabatan']; ?></td>
                </tr>
                <tr>
                	<td>Spesialisasi</td>
                    <td>:</td>
                    <td><?=$lowongan['spesialisasi']; ?></td>
                </tr>
                <tr>
                	<td>Gaji</td>
                    <td>:</td>
                    <td><?=$lowongan['gaji']; ?></td>
                </tr>
                <tr>
                	<td>Tanggal Tutup</td>
                    <td>:</td>
                    <td><?=$lowongan['tanggal_tutup']; ?></td>
                </tr>
                <tr>
                	<td>Deskripsi</td>
                    <td>:</td>
                    <td colspan="2"><?=$lowongan['deskripsi']; ?></td>
                </tr>
                <tr>
                	<td>Persyaratan</td>
                    <td>:</td>
                    <td colspan="2"><?=$lowongan['persyaratan']; ?></td>
                </tr>
                
              </tbody>
            </table>
        </article>
    </section>
    <footer class="bawah" align="right"><p>Hak Cipta &copy;Informatika UNRAM</p></footer>
</body>
</html>
