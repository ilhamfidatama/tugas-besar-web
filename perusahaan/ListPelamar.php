<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>List Pelamar</title>
<link href="perusahaan.css" rel="stylesheet" type="text/css">
</head>
<body>
  <?php
  require 'tambahan.php';
  session_start();
  $username=$_SESSION['akun'];
  $id = $_GET['loker'];
  if($username=="" || $username==" "){
    header("location:masuk.html");
  }
  if (isset($_POST['tolak_lamaran'])) {
    $username_pelamar = $_POST['username_pelamar'];
    $update = mysqli_query($conn, "UPDATE melamar SET status='ditolak' WHERE username_pelamar='$username_pelamar' ");
  }
  elseif (isset($_POST['terima_lamaran'])) {
    $username_pelamar = $_POST['username_pelamar'];
    $update = mysqli_query($conn, "UPDATE melamar SET status='diterima' WHERE username_pelamar='$username_pelamar' ");
  }

  $data = ambils("SELECT * FROM melamar WHERE id_lowongan = '$id'");
  $nama = ambil1("SELECT nama_perusahaan FROM perusahaan WHERE username='$username'");
  $judul = ambil1("SELECT judul FROM lowongan WHERE id_lowongan='$id' ");
  
  if (isset($_POST['menunggu'])) {
    $status=$_POST['menunggu'];
    $data = ambils("SELECT * FROM melamar WHERE id_lowongan = '$id' AND status='$status'");
  }
  
  elseif (isset($_POST['diterima'])) {
    $status=$_POST['diterima'];
    $data = ambils("SELECT * FROM melamar WHERE id_lowongan = '$id' AND status='$status'");
  }

  elseif (isset($_POST['ditolak'])) {
    $status=$_POST['ditolak'];
    $data = ambils("SELECT * FROM melamar WHERE id_lowongan = '$id' AND status='$status'");
  }
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
            	<h1 style="height: 100%; margin: 0;"><?=$judul; ?></h1>
              <form method="post" action="" style="height: 50px; padding: 3px; padding-left: 0px; margin-bottom: 10px;">
                <button name="semua" value="semua">Semua</button>
                <button name="menunggu" value="menunggu" style="width: 80px;">Menunggu</button>
                <button name="diterima" value="diterima">Diterima</button>
                <button name="ditolak" value="ditolak">Ditolak</button>
              </form>
                <table class="daftar" width="100%" border="0" cellspacing="1px" cellpadding="1px">
  					<tbody>
    					<tr>
                  <th width="8%">No</th>
      						<th width="30%">Username Pelamar</th>
      						<th width="18%">Tanggal Daftar</th>
                  <th width="12%">Status</th>
      						<th width="15%">Pilihan</th>
    					</tr>
                        
              <?php $no=1; foreach($data as $pelamar) : ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $pelamar["username_pelamar"]; ?></td>
                  <td><?= $pelamar["tanggal_mendaftar"]; ?></td>
                  <td><?= $pelamar["status"]; ?></td>
                  <td>
                    <form id="kelola" method="POST" action="DetailPelamar.php?pelamar=<?=$pelamar['username_pelamar']; ?>" style="height: 50px;">
                      <button type="submit" name="lihat" style="width: 60px;">lihat</button>
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
