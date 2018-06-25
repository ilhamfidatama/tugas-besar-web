<html>
<head>
<meta charset="utf-8">
<title>Profil Perusahaan</title>
<link href="perusahaan.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php
	session_start();
	$username=$_SESSION['akun'];
	$conn=mysqli_connect("localhost", "root", "", "lope");
	$user_db=mysqli_query($conn, "select email, npwp, alamat_perusahaan, nama_perusahaan, area, tanggal_terdaftar, bidang, deskripsi, visi, misi, jmlh_pegawai, website, no_telpon, jam_kerja from perusahaan where username='$username'");
	$baris=mysqli_fetch_row($user_db);
	list($email, $npwp, $alamat, $nama, $area, $tanggal, $bidang, $deskripsi, $visi, $misi, $pegawai, $website, $telpon, $kerja)=$baris;
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
      				  <li><a href="ProfilPerusahaan.html">Profil Perusahaan</a></li>
      				  <li><a href="DaftarLowongan.html">Manajemen Pekerjaan</a></li>
      				  <li><a href="DaftarPelamar.html">Pelamar</a></li>
                <li><a href="PostingPekerjaan.html">Upload Lowongan</a></li>
                <li><a href="pengaturan.html">Pengaturan</a></li>
    			   </ul>
          </nav>
          <article>
            <h1>Profil <?php echo $nama; ?> </h1>
              <div class="profil">
              	<table width="100%" border="0" cellspacing="1px" cellpadding="1px">
  						    <tbody>
    					      <tr>
                      <td width="30%">Nama Perusahaan</td>
                      <td width="3px">:</td>
                      <td id="nama" width="50%"><?php echo$nama; ?></td>
                      <td rowspan="5" bordercolor="#000000" align="center">
                        <img id="foto" alt="foto profil" height="150px" width="150px" title="foto profil">
                      </td>
    						</tr>
                            <tr>
      							<td width="30%">NPWP</td>
      							<td width="3px">:</td>
      							<td id="npwp"><?php echo$npwp; ?></td>
    						</tr>
                            <tr>
      							<td width="30%">Tanggal Berdiri</td>
      							<td width="3px">:</td>
      							<td id="tanggal"><?php echo$tanggal; ?></td>
    						</tr>
                            <tr>
      							<td width="30%">No. Telepon</td>
      							<td width="3px">:</td>
      							<td id="telpon"><?php echo$telpon; ?></td>
    						</tr>
                            <tr>
      							<td width="30%">Ukuran Perusahaan</td>
      							<td width="3px">:</td>
      							<td id="alamat"> <?php echo$pegawai; ?> </td>
    						</tr>
                            <tr>
      							<td width="30%">Jenis Perusahaan</td>
      							<td width="3px">:</td>
      							<td id="jenis"> <?php echo$bidang; ?> </td>
                                <td>
                                	<form class="edit" name="edit" method="post" action="edit profil.php">
                                    	<button name="editProfil" type="submit" value="1">Edit Profil</button>
                                    </form>
                                </td>
    						</tr>
                            <tr>
      							<td width="30%">Website</td>
      							<td width="3px">:</td>
      							<td id="website"> <?php echo$website; ?> </td>
    						</tr>
							<tr>
      							<td width="30%">Waktu Bekerja</td>
      							<td width="3px">:</td>
      							<td id="website"> <?php echo$kerja; ?> </td>
    						</tr>
                            <tr>
      							<td width="30%">Alamat Perusahaan</td>
      							<td width="3px">:</td>
      							<td id="ukuran"> <?php echo$alamat; ?> </td>
    						</tr>
                            <tr>
      							<td width="30%">Deskripsi Perusahaan</td>
      							<td width="3px">:</td>
      							<td id="deskripsi" colspan="2"> <?php echo$deskripsi; ?> </td>
    						</tr>
                            <tr>
      							<td width="30%">Visi Perusahaan</td>
      							<td width="3px">:</td>
      							<td id="visi" colspan="2"> <?php echo$visi; ?> </td>
    						</tr>
                            <tr>
      							<td width="30%">Misi Perusahaan</td>
      							<td width="3px">:</td>
      							<td id="misi" colspan="2"> <?php echo$misi; ?> </td>
    						</tr>
  						</tbody>
					</table>
                </div>
				<?php mysqli_close($conn); ?>
				?>
        	</article>
        </section>
        
		<footer class="bawah" align="right"><p>Hak Cipta &copy;Informatika UNRAM</p></footer>
</body>
</html>