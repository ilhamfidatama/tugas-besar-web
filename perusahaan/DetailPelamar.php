<html>
<head>
<meta charset="utf-8">
<title>Profil Perusahaan</title>
<link href="perusahaan.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php
  require 'tambahan.php';
  session_start();
  $username=$_SESSION['akun'];
  $user_pelamar=$_GET['pelamar'];
  if($username=="" || $username==" "){
    header("location:masuk.html");
  } 
  $data = ambils("SELECT * FROM pelamar WHERE username = '$user_pelamar'")[0];
  $melamar = ambils("SELECT * FROM melamar WHERE username_pelamar='$user_pelamar' ")[0];
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
      					<a href="ProfilPerusahaan.php"><?php echo$nama; ?></a>
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
            <h1>Profil <?php echo $data['nama_lengkap']; ?> </h1>
              <div class="profil">
              	<table width="100%" border="0" cellspacing="1px" cellpadding="1px">
  						    <tbody>
    					      <tr>
                      <td width="30%">Nama lengkap</td>
                      <td width="3px">:</td>
                      <td id="nama" width="50%"><?php echo$data['nama_lengkap']; ?></td>
                      <td rowspan="5" bordercolor="#000000" align="center" id="gambar">
                        <img id="foto" alt="foto profil" height="150px" width="150px" src="../pelamar/img/<?=$data['foto_profil']; ?>">
                      </td>
    						</tr>
                            <tr>
      							<td width="30%">email</td>
      							<td width="3px">:</td>
      							<td><?php echo$data['email']; ?></td>
    						</tr>
                            <tr>
      							<td width="30%">Tempat, Tanggal Lahir</td>
      							<td width="3px">:</td>
      							<td><?php echo$data['tempat_lahir'].", ".$data['tanggal_lahir']; ?></td>
    						</tr>
                            <tr>
      							<td width="30%">Alamat</td>
      							<td width="3px">:</td>
      							<td><?php echo$data['alamat_pelamar']; ?></td>
    						</tr>
                            <tr>
      							<td width="30%">Tinggi Badan</td>
      							<td width="3px">:</td>
      							<td><?php echo$data['tinggi_badan']." cm"; ?></td>
    						</tr>
                            <tr>
      							<td width="30%">Agama</td>
      							<td width="3px">:</td>
      							<td><?php echo$data['agama']; ?></td>
    						</tr>
                <tr>
      							<td width="30%">CV</td>
      							<td width="3px">:</td>
      							<td><a href="../melamar/cv/<?=$melamar['cv']; ?>"><?=$melamar['cv']; ?></a></td>
    						</tr>
                <tr>
      							<td width="30%">Berkas Tambahan</td>
      							<td width="3px">:</td>
      							<td colspan="2"><a href="../melamar/berkas/<?=$melamar['berkas_tambahan']; ?>"><?=$melamar['berkas_tambahan']; ?></a></td>
    						</tr>
  						</tbody>
					</table>
            <form method="post" action="ListPelamar.php?loker=<?=$melamar["id_lowongan"];?>">
              <input type="hidden" name="username_pelamar" value="<?=$data['username']; ?>">
              <button type="submit" name="tolak_lamaran">Tolak</button>
              <button type="submit" name="terima_lamaran">Terima</button>
            </form>
                  
                </div>
				<?php 
          mysqli_close($conn);
				?>
        	</article>
        </section>
        
		<footer class="bawah" align="right"><p>Hak Cipta &copy;Informatika UNRAM</p></footer>
</body>
</html>