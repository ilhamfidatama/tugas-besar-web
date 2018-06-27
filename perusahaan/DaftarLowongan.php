<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manajemen Pekerjaan</title>
<link href="perusahaan.css" rel="stylesheet" type="text/css">
</head>
<body>
  <?php
  session_start();
  $username=$_SESSION['akun'];
  if($username=="" || $username==" "){
                header("location:masuk.html");
            } 
  require'tambahan.php';
  $data = ambils("SELECT * FROM lowongan WHERE username_perusahaan = '$username'");
  $nama = ambil1("SELECT nama_perusahaan FROM perusahaan WHERE username='$username'");
  ?>
		<header>
        	<div class="logo">
        		<img src="../foto/logo.jpg" alt="lOker" width="150px">
        	</div>
        	<div class="menu">
        	<table width="100%" border="0">
  			<tbody valign="middle">
    			<tr>
      				<td align="left">
      					<a href="ProfilPerusahaan.php"> <?= $nama; ?> </a>
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
            	<h1>Manajemen Pekerjaan</h1>
                <table class="daftar" width="100%" border="0" cellspacing="1px" cellpadding="1px">
  					<tbody>
    					<tr>
                  <th width="5%">No</th>
      						<th width="12%">Id Lowongan</th>
      						<th width="30%">Nama Lowongan</th>
      						<th width="18%">Tanggal Posting</th>
      						<th width="15%">Tanggal Tutup</th>
      						<th width="15%">Pilihan</th>
    					</tr>
                        
              <?php $no=1; foreach($data as $baris) : ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $baris["id_lowongan"]; ?></td>
                  <td><?= $baris["judul"]; ?></td>
                  <td><?= $baris["tanggal_buka"]; ?></td>
                  <td><?= $baris["tanggal_tutup"]; ?></td>
                  <td>
                    <form id="kelola" method="POST" action="kelolaLowongan.php?id=<?= $baris["id_lowongan"]; ?>" style="height: 50px;">
                      <button type="submit" name="edit" style="width: 60px;">Edit</button>
                      <button type="submit" name="hapus" style="width: 60px;">Hapus</button>
                    </form>
                  </td>
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
