<html>
<head>
<meta charset="utf-8">
<title>Edit Profil</title>
<link href="perusahaan.css" rel="stylesheet" type="text/css">
</head>
<body>
		<header>
        	<div class="logo">
        		<img src="../foto/logo.jpg" alt="lOker" width="150px">
        	</div>
        	<div class="menu">
        	<table width="100%" border="0">
  			<tbody valign="middle">
    			<tr>
      				<td align="left">
      					<?php
						session_start();
						$username=$_SESSION['akun'];
						$conn=mysqli_connect("localhost", "root", "", "lope");
						$user_db=mysqli_query($conn, "select email, npwp, alamat_perusahaan, nama_perusahaan, area, tanggal_terdaftar, bidang, deskripsi, visi, misi, jmlh_pegawai, website, no_telpon from perusahaan where username='$username'");
						$baris=mysqli_fetch_row($user_db);
						list($email, $npwp, $alamat, $nama, $area, $tanggal, $bidang, $deskripsi, $visi, $misi, $pegawai, $website, $telpon)=$baris;
      					echo'<a href="../../coba/profil.html">'.$nama.'</a>';
						?>
      				</td>
      				<td align="right">
      					<a href="keluar.php"> Keluar</a>
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
            	<form name="edit" method="post" action="edit.php">
            			<label>Profil <?php echo$nama; ?></label>
                		<p>Nama Perusahaan :</p>
                		<input type="text" name="nama" value=" <?php echo$nama; ?> ">
                		<p>Logo Perusahaan :</p>
                		<input type="file" name="logo" value="">
                		<p>Tanggal Berdiri :</p>
                		<input type="date" name="tanggal_berdiri" value=" <?php echo$tanggal; ?> ">
                		<p>No. Telepon :</p>
                		<input type="tel" name="telepon" value=" <?php echo$telpon; ?> ">
                		<p>Alamat Perusahaan :</p>
                		<textarea name="alamat_perusahaan" minlength="20" value=" <?php echo$alamat; ?>'. "> <?php echo$alamat; ?> </textarea>
                		<p>Jenis Perusahaan :</p>
                		<select name="jenis">';
							<?php
                                if($bidang!=""||$bidang!=" "){
								    echo'<option value="'.$bidang.'" selected>'.$bidang.'</option>';
                                }
                            ?>
                				<option value="">pilih</option>
                				<option value="Periklanan / Hubungan Masyarakat / Layanan Pemasaran">Periklanan / Hubungan Masyarakat / Layanan Pemasaran</option>
                    			<option value="Budidaya Pertanian">Budidaya Pertanian</option>
                    			<option value="Arsitektur / Bangunan / Konstruksi">Arsitektur / Bangunan / Konstruksi</option>
                    			<option value="Atletik / Olahraga">Atletik / Olahraga</option>
                    			<option value="Layanan Amal / Sosial / Organisasi Nirlaba">Layanan Amal / Sosial / Organisasi Nirlaba</option>
                    			<option value="Kimia / Plastik / Kertas / Petrokimia">Kimia / Plastik / Kertas / Petrokimia</option>
                    			<option value="Layanan Sipil (Pemerintah, Angkatan Bersenjata)">Layanan Sipil (Pemerintah, Angkatan Bersenjata)</option>
                    			<option value="Pakaian / Garmen / Tekstil">Pakaian / Garmen / Tekstil</option>
                    			<option value="Pendidikan">Pendidikan</option>
                    			<option value="Elektronik / Peralatan Listrik">Elektronik / Peralatan Listrik</option>
                    			<option value="Energi / Tenaga / Air / Minyak &amp; Gas / Pengelolaan Limbah">Energi / Tenaga / Air / Minyak &amp; Gas / Pengelolaan Limbah</option>
                    			<option value="Rekayasa - Bangunan, Sipil, Konstruksi / Survei Kuantitas">Rekayasa - Bangunan, Sipil, Konstruksi / Survei Kuantitas</option>
                    			<option value="Teknik - Listrik / Elektronik / Mekanis">Teknik - Listrik / Elektronik / Mekanis</option>
                    			<option value="Teknik - Lainnya">Teknik - Lainnya</option>
                    			<option value="Hiburan / Rekreasi">Hiburan / Rekreasi</option>
                    			<option value="Layanan Keuangan">Layanan Keuangan</option>
                    			<option value="Makanan dan Minuman / Katering">Makanan dan Minuman / Katering</option>
                    			<option value="Jasa Pengiriman Barang / Pengiriman / Pengiriman">Jasa Pengiriman Barang / Pengiriman / Pengiriman</option>
                    <option value="Layanan Bisnis Umum">Layanan Bisnis Umum</option>
                    			<option value="Perawatan Kesehatan &amp; Kecantikan">Perawatan Kesehatan &amp; Kecantikan</option>
                    			<option value="Perhotelan / Katering">Perhotelan / Katering</option>
                    			<option value="Manajemen Sumber Daya Manusia / Konsultasi">Manajemen Sumber Daya Manusia / Konsultasi</option>
                    			<option value="Mesin Industri / Peralatan Otomatisasi">Mesin Industri / Peralatan Otomatisasi</option>
                    			<option value="Teknologi Informasi">Teknologi Informasi</option>
                    			<option value="Asuransi / Dana Pensiun">Asuransi / Dana Pensiun</option>
                    			<option value="Desain Interior / Desain Grafis">Desain Interior / Desain Grafis</option>
                    			<option value="Perhiasan / Permata / Jam Tangan">Perhiasan / Permata / Jam Tangan</option>
                    			<option value="Laboratorium">Laboratorium</option>
                    			<option value="Layanan Hukum">Layanan Hukum</option>
                    			<option value="Logistik">Logistik</option>
                    			<option value="Konsultasi / Layanan Manajemen">Konsultasi / Layanan Manajemen</option>
                    			<option value="Manufaktur">Manufaktur</option>
                    			<option value="Transportasi masal">Transportasi masal</option>
                    			<option value="Media / Penerbitan / Percetakan">Media / Penerbitan / Percetakan</option>
                    			<option value="Medis / Farmasi">Medis / Farmasi</option>
                    			<option value="Pertambangan">Pertambangan</option>
                    			<option value="Kelompok Industri Campuran">Kelompok Industri Campuran</option>
                    			<option value="Kendaraan bermotor">Kendaraan bermotor</option>
                    			<option value="Pengemasan">Pengemasan</option>
                    			<option value="Kinerja / Musik / Artistik">Kinerja / Musik / Artistik</option>
                    			<option value="Petroleum">Petroleum</option>
                    			<option value="Pengembangan properti">Pengembangan properti</option>
                    			<option value="Manajemen Properti / Konsultasi">Manajemen Properti / Konsultasi</option>
                    			<option value="Utilitas Publik">Utilitas Publik</option>
                    			<option value="Penelitian / Survei">Penelitian / Survei</option>
                    			<option value="Keamanan / Api / Kontrol Akses Elektronik">Keamanan / Api / Kontrol Akses Elektronik</option>
                    			<option value="Pengawalan Keamanan">Pengawalan Keamanan</option>
                    			<option value="Telekomunikasi">Telekomunikasi</option>
                    			<option value="Pariwisata / Agen Perjalanan">Pariwisata / Agen Perjalanan</option>
                    			<option value="Mainan">Mainan</option>
                    			<option value="Perdagangan dan Distribusi">Perdagangan dan Distribusi</option>
                    			<option value="Grosir / Eceran">Grosir / Eceran</option>
                    			<option value="Lainnya">Lainnya</option>
                			</select>
                			<p>Website :</p>
                			<input type="url" name="website" value=" <?php echo$website; ?> ">
                			<p>Jumlah Pegawai :</p>
                			<input type="number" name="jumlah_pegawai" value=" <?php echo$pegawai; ?> ">
                			<p>Jam Kerja :</p>
                			<select name="jam_kerja">
                                <?php 
                                    if(){}
                                ?>
                				<option value="">pilih</option>
                				<option value="6">6 jam</option>
                    			<option value="7">7 jam</option>
                    			<option value="8">8 jam</option>
                    			<option value="9">9 jam</option>
                			</select>
                			<p>Deskripsi Perusahaan :</p>
                			<textarea name="deskripsi" minlength="200" value="'.$deskripsi.'">'.$deskripsi.'</textarea>
                			<p>Visi Perusahaan :</p>
                			<textarea name="visi" minlength="50" value="'.$visi.'">'.$visi.'</textarea>
                			<p>Misi Perusahaan :</p>
                			<textarea name="misi" minlength="50" value="'.$misi.'">'.$misi.'</textarea>
                			<br>
                			<button class="batal" type="submit" name="simpan" value="0">Batal</button>
                			<button class="simpan" type="submit" name="simpan" value="1">Simpan</button>';
				?>
                </form>
        	</article>
        </section>
        
		<footer class="bawah" align="right"><p>Hak Cipta &copy;Informatika UNRAM</p></footer>
        <?php 
            mysqli_close($conn);
         ?>
</body>
</html>