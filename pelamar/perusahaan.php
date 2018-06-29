<?php
    require 'tambahan.php';
    // require 'Pelamar.css';
    session_start();
    $pelamar=$_SESSION['pelamar'];
    $perusahaan = $_POST['nama_perusahaan'];
    $perusahaan = ambils("SELECT * FROM perusahaan WHERE nama_perusahaan='$perusahaan' ")[0];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Deskripsi Perusahaan</title>
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
                    <p><?=$perusahaan['nama_perusahaan']; ?></p>
                    <p><?=$perusahaan['bidang'] ?></p>
                </div>

                <form id="list" method="POST" action="list.php">
                    <input type="hidden" name="username_perusahaan" value="<?=$perusahaan['username']; ?> ">
                    <button>Lihat Daftar Lowongan</button>
                </form>

            </nav>
            <article id="deskripsi">
            	<table border="0" cellpadding="1" cellspacing="1" width="100%">
                <tbody>
                	<tr>
                    	<th width="50%">Deskripsi</th>
                    </tr>
                    <tr>
                    	<td><?=$perusahaan['deskripsi']; ?></td>
                    </tr>
                    <tr>
                    	<th>Visi Perusahaan</th>
                        <th>Misi Perusahaan</th>
                    </tr>
                    <tr>
                    	<td><?=$perusahaan['visi']; ?></td>
                        <td><?=$perusahaan['misi']; ?></td>
                    </tr>
                </tbody>
                </table>
            </article>
        </section>
        
		<footer class="bawah" align="right"><p>Hak Cipta &copy;Informatika UNRAM</p></footer>
</body>
</html>
