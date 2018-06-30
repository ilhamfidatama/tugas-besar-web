<?php  
    session_start();
    $pelamar=$_SESSION['pelamar'];
    if($pelamar=="" || $pelamar==" "){
        header("location:masuk.html");
    } 
    require 'tambahan.php';

    $lowongan = ambils("SELECT * FROM lowongan");
    $user = ambils("SELECT * FROM pelamar WHERE username='$pelamar'")[0];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Beranda</title>
<?php 
echo '<link href="Pelamar.css" rel="stylesheet" type="text/css">';
 ?>
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
        	<nav id="pelamar">
            	<img name="fotoProfil" alt="Foto Profil" width="80px" height="80px" src="img/<?=$user['foto_profil']; ?>">
                <table border="0" cellpadding="1px" cellspacing="1px">
                	<tbody>
                    	<tr>
                        	<th id="namaPelamar" align="left"><?=$user['nama_lengkap']; ?></th>
                        </tr>
                    </tbody>
                </table>
            </nav>
            <?php
				foreach ($lowongan as $pekerjaan) :
                    $perusahaan=$pekerjaan['username_perusahaan'];
                    $perusahaan=ambils("SELECT * FROM perusahaan WHERE username='$perusahaan' ")[0];
            ?>
			<article id="kiri">
				<table border="0" width="100%" cellpadding="1" cellspacing="1">
       				<tbody>
           				<tr>
           					<th id="judul" width="60%" align="left"><a href="lowongan.php?id=<?=$pekerjaan['id_lowongan']; ?>"><?=$pekerjaan['judul']; ?></a></th>
                        	<td rowspan="5"><img width="300px" height="150px" src="../perusahaan/img/<?=$perusahaan['foto_perusahaan']; ?>"></td>
                    	</tr>
                    	<tr>
                        	<td id="namaPerusahaan"><?=$perusahaan['nama_perusahaan']; ?></td>
                    	</tr>
                    	<tr>
                        	<td id="spesialisasi"><?=$pekerjaan['spesialisasi']; ?></td>
                    	</tr>
                        <tr>
                            <td id="jabatan"><?=$pekerjaan['jabatan']; ?></td>
                        </tr>
                    	<tr>
                        	<td id="gaji"><?=$pekerjaan['gaji']; ?></td>
                    	</tr>
                    </tbody>
                </table>
            </article>
			<?php endforeach; 
                $logo = ambils("SELECT * FROM perusahaan");
            ?> 
            <article id="kanan">
                <?php 
                    foreach ($logo as $pict) :
                ?>
                <img width="150px" height="80px" src="../perusahaan/img/<?=$pict['foto_perusahaan']; ?>">
                <?php
                    endforeach;
                ?>
            </article>
        </section>
        
		<footer class="bawah" align="right"><p>Hak Cipta &copy;Informatika UNRAM</p></footer>
</body>
</html>