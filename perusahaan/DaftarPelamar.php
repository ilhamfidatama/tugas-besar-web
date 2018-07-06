<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Daftar Pelamar</title>
<link href="perusahaan.css" rel="stylesheet" type="text/css">
</head>
<body>
  <?php
  session_start();
  $username=$_SESSION['akun'];
  require'tambahan.php';
  $lowongan = ambils("SELECT * FROM lowongan WHERE username_perusahaan='$username'");
  $nama = ambil1("SELECT nama_perusahaan FROM perusahaan WHERE username='$username'");
  $no=1;
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
            	<h1>Pelamar Lowongan</h1>
                <table class="daftar" width="100%" border="0" cellspacing="1px" cellpadding="1px">
  					<tbody>
    					<tr>
      						<th width="5%">No</th>
      						<th width="35%">Nama Lowongan</th>
      						<th width="15%">Jumlah Pelamar</th>
      						<th width="15%">Tanggal Tutup</th>
      						<th width="15%">Detail</th>
    					</tr>
              <?php foreach($lowongan as $loker) : ?>
              <tr>
                <?php  
                  $loker_id=$loker['id_lowongan'];
                  $banyak=numer("SELECT username_pelamar FROM melamar WHERE id_lowongan='$loker_id'");
                ?>
                  <td><?= $no; ?></td>
                  <td><?= $loker['judul']; ?></td>
                  <td><?= $banyak; ?></td>
                  <td><?= $loker['tanggal_tutup']; ?></td>
                  <td>
                    <form style="height: 50px;" method="POST" action="ListPelamar.php?loker=<?= $loker["id_lowongan"]; ?>">
                      <button type="submit" name="detail" value="1" style="width: 90px; height: 30px;">Lihat Detail</button>
                    </form>
                  </td>
              </tr>
              <?php $no++; endforeach; ?>
  					</tbody>
				</table>
        	</article>
        </section>
        
		<footer class="bawah" align="right"><p>Hak Cipta &copy;Informatika UNRAM</p></footer>
    <?php 
            mysqli_close($conn);
         ?>
</body>
</html>
