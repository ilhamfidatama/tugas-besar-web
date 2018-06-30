<html>
<head>
<meta charset="utf-8">
<title>Edit Profil</title>
<link href="perusahaan.css" rel="stylesheet" type="text/css">
</head>
<body>
        <?php 
            require 'tambahan.php';
            session_start();
            $username=$_SESSION['akun'];
            if($username=="" || $username==" "){
                header("location:masuk.html");
            } 

            if (isset($_POST['simpan'])) {
                $hasil=$_POST['simpan'];
                $nama=$_POST['nama'];
                $alamat=$_POST['alamat_perusahaan'];
                $tanggal=$_POST['tanggal_berdiri'];
                $npwp=$_POST['npwp'];
                $telpon=$_POST['telepon'];
                $bidang=$_POST['jenis'];
                $website=$_POST['website'];
                $area=$_POST['area'];
                $pegawai=$_POST['jumlah_pegawai'];
                $kerja=$_POST['jam_kerja'];
                $des=$_POST['deskripsi'];
                $vis=$_POST['visi'];
                $mis=$_POST['misi'];
                $gambarlama=$_POST['logolama'];

                if ( $_FILES['logo']['error'] == 4 ) {
                    $gambar=$gambarlama;
                }else{
                    $gambar=uploadGambar();
                }

                if($hasil==1){
                    $update=mysqli_query($conn, "UPDATE perusahaan SET nama_perusahaan='$nama',alamat_perusahaan='$alamat', no_telpon='$telpon', tanggal_terdaftar='$tanggal', bidang='$bidang', deskripsi='$des', visi='$vis', misi='$mis', jmlh_pegawai='$pegawai', website='$website', jam_kerja='$kerja', npwp='$npwp', area='$area', foto_perusahaan='$gambar' WHERE username='$username'");
                    if ($update) {
                        echo "<script>
                            alert('Profil Berhasil di Update');
                        </script>";
                    }else{
                        echo "<script>
                            alert('Profil Gagal di Update');
                        </script>";
                    }
                }
            }else if (isset($_POST['batal'])) {
                header('location:ProfilPerusahaan.php');
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
      					<?php
						$conn=mysqli_connect("localhost", "root", "", "lope");
						$user_db=mysqli_query($conn, "select email, npwp, alamat_perusahaan, nama_perusahaan, area, tanggal_terdaftar, bidang, deskripsi, visi, misi, jmlh_pegawai, website, no_telpon, jam_kerja, foto_perusahaan from perusahaan where username='$username'");
						$baris=mysqli_fetch_row($user_db);
						list($email, $npwp, $alamat, $nama, $area, $tanggal, $bidang, $deskripsi, $visi, $misi, $pegawai, $website, $telpon, $kerja, $gambar)=$baris;
      					echo'<a href="ProfilPerusahaan.php">'.$nama.'</a>';
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
      				<li><a href="ProfilPerusahaan.php">Profil Perusahaan</a></li>
      				<li><a href="DaftarLowongan.php">Manajemen Pekerjaan</a></li>
      				<li><a href="DaftarPelamar.php">Pelamar</a></li>
                    <li><a href="PostingPekerjaan.php">Upload Lowongan</a></li>
                    <li><a href="pengaturan.php">Pengaturan</a></li>
    			</ul>
            </nav>
            <article>
            	<form name="edit" method="POST" action="" enctype="multipart/form-data">
                        <input type="hidden" name="logolama" value="<?= $gambar; ?>"></input>
            			<label>Profil <?php echo$nama; ?></label>
                		<p>Nama Perusahaan :</p>
                		<input type="text" name="nama" value="<?php echo$nama; ?>">
                		<p>Logo Perusahaan :</p>
                		<input type="file" name="logo" value="">
                        <p>NPWP :</p>
                		<input type="text" name="npwp" value="<?php echo$npwp; ?>">
                		<p>Tanggal Berdiri :</p>
                		<input type="date" name="tanggal_berdiri" value="<?php echo$tanggal; ?>">
                		<p>No. Telepon :</p>
                		<input type="tel" name="telepon" value="<?php echo$telpon; ?>">
                		<p>Alamat Perusahaan :</p>
                		<textarea name="alamat_perusahaan" minlength="20" value="<?php echo$alamat; ?>"><?php echo$alamat; ?></textarea>
                        <p>Area :</p>
                        <select name="area">
                            <?php  
                                if($area!="" || $area!=" "){ ?>
                                <option value="<?= $area; ?>" selected><?= $area; ?></option>
                            <?php
                                } else{
                            ?>
                                <option value="">Pilih</option>
                                <?php } ?>
                            <option value="Aceh" >Aceh</option>
                            <option value="Bali">Bali</option>
                            <option value="Bangka Belitung">Bangka Belitung</option>
                            <option value="Banten">Banten</option>
                            <option value="Bengkulu">Bengkulu</option>
                            <option value="Gorontalo">Gorontalo</option>
                            <option value="Jakarta Raya">Jakarta Raya</option>
                            <option value="Jambi">Jambi</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="Jawa Timur">Jawa Timur</option>
                            <option value="Kalimantan Barat">Kalimantan Barat</option>
                            <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                            <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                            <option value="Kalimantan Timur">Kalimantan Timur</option>
                            <option value="Kalimantan Utara">Kalimantan Utara</option>
                            <option value="Kepulauan Riau">Kepulauan Riau</option>
                            <option value="Lampung">Lampung</option>
                            <option value="Maluku">Maluku</option>
                            <option value="Maluku Utara">Maluku Utara</option>
                            <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                            <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                            <option value="Papua">Papua</option>
                            <option value="Papua Barat">Papua Barat</option>
                            <option value="Riau">Riau</option>
                            <option value="Sulawesi Barat">Sulawesi Barat</option>
                            <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                            <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                            <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                            <option value="Sulawesi Utara">Sulawesi Utara</option>
                            <option value="Sumatera Barat">Sumatera Barat</option>
                            <option value="Sumatera Selatan">Sumatera Selatan</option>
                            <option value="Sumatera Utara">Sumatera Utara</option>
                            <option value="Yogyakarta">Yogyakarta</option>
                        </select>
                		<p>Jenis Perusahaan :</p>
                		<select name="jenis">
                            <?php  
                                if($bidang!="" || $bidang!=" "){ ?>
                                <option value="<?= $bidang; ?>" selected><?= $bidang; ?></option>
                            <?php
                                } else{
                            ?>
                                <option value="">Pilih</option>
                                <?php } ?>
                                <option value="Pertanian, Perikanan & Perkebunan">Pertanian, Perikanan &amp; Perkebunan</option>
                                <option value="Pakaian, Tekstil & Mode">Pakaian, Tekstil &amp; Mode</option>
                                <option value="Otomotif & Komponen">Otomotif &amp; Komponen</option>
                                <option value="Perbankan & Jasa Keuangan">Perbankan &amp; Jasa Keuangan</option>
                                <option value="Kecantikan & Kesehatan">Kecantikan &amp; Kesehatan</option>
                                <option value="Bahan Bangunan & Sanitasi">Bahan Bangunan &amp; Sanitasi</option>
                                <option value="Perusahaan Konglomerat / Holding">Perusahaan Konglomerat / Holding</option>
                                <option value="Consumer Electronics, Appliance & Furnishing">Consumer Electronics, Appliance & Furnishing</option>
                                <option value="Pelatihan Pendidikan">Pelatihan Pendidikan</option>
                                <option value="Rekayasa, Pengadaan, Konstruksi (EPC)">Rekayasa, Pengadaan, Konstruksi (EPC)</option>
                                <option value="Layanan Lingkungan & Fasilitas">Layanan Lingkungan &amp; Fasilitas</option>
                                <option value="FMCG">FMCG</option>
                                <option value="makanan & Minuman">makanan &amp; Minuman</option>
                                <option value="Pemerintah, Nonprofit & Fasilitas Umum">Pemerintah, Nonprofit &amp; Fasilitas Umum</option>
                                <option value="Perawatan Kesehatan & Farmasi">Perawatan Kesehatan &amp; Farmasi</option>
                                <option value="Alat Berat & Mesin Industri">Alat Berat &amp; Mesin Industri</option>
                                <option value="Perhotelan, Perjalanan & Wisata">Perhotelan, Perjalanan &amp; Wisata</option>
                                <option value="Barang Industri & Kimia">Barang Industri &amp; Kimia</option>
                                <option value="Asuransi">Asuransi</option>
                                <option value="IT & Telekomunikasi">IT &amp; Telekomunikasi</option>
                                <option value="Jewellry & Barang Mewah">Jewellry &amp; Barang Mewah</option>
                                <option value="Konsultasi, Penelitian & Layanan Hukum">Konsultasi, Penelitian &amp; Layanan Hukum</option>
                                <option value="Media, Hiburan & Periklanan">Media, Hiburan &amp; Periklanan</option>
                                <option value="Penambangan, Minyak & Gas">Penambangan, Minyak &amp; Gas</option>
                                <option value="Produk Kertas & Kehutanan">Produk Kertas &amp; Kehutanan</option>
                                <option value="Percetakan & Penerbitan">Percetakan &amp; Penerbitan</option>
                                <option value="Real Estat & Properti">Real Estat &amp; Properti</option>
                                <option value="Layanan Restoran & Makanan">Layanan Restoran &amp; Makanan</option>
                                <option value="Perdagangan Ritel & Grosir">Perdagangan Ritel &amp; Grosir</option>
                                <option value="Sains & Teknologi">Sains &amp; Teknologi</option>
                                <option value="Tembakau & Rokok">Tembakau &amp; Rokok</option>
                                <option value="Transportasi & Logistik">Transportasi &amp; Logistik</option>
                                <option value="Utilitas & Energi">Utilitas &amp; Energi</option>
                                <option value="Produsen lainnya">Produsen lainnya</option>
                                <option value="Layanan Lainnya">Layanan Lainnya</option>
                        </select>
                			<p>Website :</p>
                			<input type="url" name="website" value="<?php echo$website; ?>">
                			<p>Jumlah Pegawai :</p>
                			<input type="text" name="jumlah_pegawai" value="<?php echo$pegawai; ?>">
                			<p>Jam Kerja :</p>
                			<select name="jam_kerja">
                                <?php 
                                    if($kerja!="" || $kerja!=" "){
                                        echo'<option value="'.$kerja.'" selected> '.$kerja.' </option>';
                                    }else{
                                ?>
                				<option value="">pilih</option>
                                <?php } ?>
                				<option value="5 hari(8 jam/hari)">5 hari(8 jam/hari)</option>
                                <option value="5 hari(9 jam/hari)">5 hari(9 jam/hari)</option>
                                <option value="6 hari(7 jam/hari)">6 hari(7 jam/hari)</option>
                    			<option value="6 hari(8 jam/hari)">6 hari(8 jam/hari)</option>
                			</select>
                			<p>Deskripsi Perusahaan :</p>
                			<textarea name="deskripsi" minlength="100" value="<?php echo$deskripsi; ?>"><?php echo$deskripsi; ?></textarea>
                			<p>Visi Perusahaan :</p>
                			<textarea name="visi" value="<?php echo$visi; ?>"><?php echo$visi; ?></textarea>
                			<p>Misi Perusahaan :</p>
                			<textarea name="misi" value="<?php echo$misi; ?>"><?php echo$misi; ?></textarea>
                			<?php echo'<br>'; ?>
                			<button class="batal" type="submit" name="batal" value="0">Batal</button>
                			<button class="simpan" type="submit" name="simpan" value="1">Simpan</button>
                </form>
        	</article>
        </section>
		<footer class="bawah" align="right"><p>Hak Cipta &copy;Informatika UNRAM</p></footer>
        <?php 
            mysqli_close($conn);
         ?>
</body>
</html>