<?php
    require 'tambahan.php';
    session_start();
    $pelamar=$_SESSION['pelamar'];
    $username_perusahaan = $_POST['username_perusahaan'];
    $lowongan = ambils("SELECT * FROM lowongan WHERE username_perusahaan='$username_perusahaan' ");
    $perusahaan = ambils("SELECT * FROM perusahaan WHERE username='$username_perusahaan' ")[0];
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

            </nav>
            <article id="deskripsi">
                <!-- list lowongan perusahaan -->
            	 <table class="daftar" width="100%" border="0" cellspacing="1px" cellpadding="1px">
                    <tbody>
                        <tr>
                            <th width="5%">No</th>
                            <th width="30%">Judul Lowongan</th>
                            <th width="25%">Jabatan</th>
                            <th width="25%">Spesialisasi</th>
                            <th width="15%">Gaji</th>
                        </tr>
                        
              <?php $no=1; foreach($lowongan as $pekerjaan) : ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><a href="lowongan.php?id=<?=$pekerjaan['id_lowongan']; ?>"><?= $pekerjaan["judul"]; ?></a></td>
                  <td><?= $pekerjaan["jabatan"]; ?></td>
                  <td><?= $pekerjaan["spesialisasi"]; ?></td>
                  <td><?= $pekerjaan["gaji"] ?> </td>
                </tr>
              <?php
                $no++;
                endforeach;
                mysqli_close($conn);
              ?>
                    </tbody>
                </table>
            </article>
        </section>
        
		<footer class="bawah" align="right"><p>Hak Cipta &copy;Informatika UNRAM</p></footer>
</body>
</html>
