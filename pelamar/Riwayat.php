<?php
    require 'tambahan.php';
    session_start();
    $pelamar=$_SESSION['pelamar'];
    $melamar = ambils("SELECT * FROM melamar WHERE username_pelamar='$pelamar' ");
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
            <article id="deskripsi">
                <!-- list lowongan perusahaan -->
            	 <table class="daftar" width="100%" border="0" cellspacing="1px" cellpadding="1px">
                 <h1>Riwayat Melamar</h1>
                    <tbody>
                        <tr>
                            <th width="5%">No</th>
                            <th width="30%">Judul Lowongan</th>
                            <th width="25%">Nama Perusahaan</th>
                            <th width="25%">Spesialisasi</th>
                            <th width="15%">Status</th>
                        </tr>
                        
              <?php $no=1; 
                foreach($melamar as $pekerjaan) : 
                    $id_pekerjaan = $pekerjaan['id_lowongan'];
                    $lowongan = ambils("SELECT * FROM lowongan WHERE id_lowongan=$id_pekerjaan")[0];
                    $user_perusahaan = $lowongan['username_perusahaan'];
                    $perusahaan = ambils("SELECT * FROM perusahaan WHERE username='$user_perusahaan' ")[0];
              ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><a href="lowongan.php?id=<?=$pekerjaan['id_lowongan']; ?>"><?= $lowongan["judul"]; ?></a></td>
                  <td><?= $perusahaan["nama_perusahaan"]; ?></td>
                  <td><?= $lowongan["spesialisasi"]; ?></td>
                  <td><?= $pekerjaan["status"] ?> </td>
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
