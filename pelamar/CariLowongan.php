<?php  
    session_start();
    $pelamar=$_SESSION['pelamar'];
    if($pelamar=="" || $pelamar==" "){
        header("location:masuk.html");
    } 
    require 'tambahan.php';

    if (isset($_POST['cari'])) {
    	$gaji = $_POST['gaji'];
    	$spesialisasi = $_POST['spesialisasiP'];
    	$jabatan = $_POST['posisi'];
    	if ($gaji=="" && $spesialisasi=="" && $jabatan=="" ) {
    		$lowongan = ambils("SELECT * FROM lowongan");
    	}else{
    		$lowongan = ambils("SELECT * FROM lowongan WHERE gaji='$gaji' OR spesialisasi='$spesialisasi' OR jabatan='$jabatan' ");
    	}
    }else{
    	$lowongan = ambils("SELECT * FROM lowongan");
    }
    $user = ambils("SELECT * FROM pelamar WHERE username='$pelamar'")[0];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cari Lowongan</title>
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
        	<nav id="pencarian">
            	<form name="pencarian" id="cari" method="post" action="">
                	<select name="posisi">
                        <option value="">POSISI</option>
                        <option value="CEO / GM / Direktur / Manajer Senior">CEO / GM / Direktur / Manajer Senior</option>
                        <option value="Manajer / Asisten Manajer">Manajer / Asisten Manajer</option>
                        <option value="Supervisor / Koordinator">Supervisor / Koordinator</option>
                        <option value="Staf (non-manajemen & non-supervisor)">Staf (non-manajemen &amp; non-supervisor)</option>
                    </select>
                    <select name="spesialisasiP">
                        <option value="">Spesialisasi / Bidang Pekerjaan</option>
                        <optgroup label="Akuntansi/Keuangan">
                            <option value="Audit & Pajak">Audit &amp; Pajak</option>
                            <option value="Perbankan/Keuangan">Perbankan/Keuangan</option>
                            <option value="Keuangan/Investasi">Keuangan/Investasi</option>
                            <option value="Akuntansi Umum/Pembiayaan">Akuntansi Umum/Pembiayaan</option>
                        </optgroup>
                        <optgroup label="Adminstrasi/Personalia">
                            <option value="Staf/Administrasi umum">Staf/Administrasi umum</option>
                            <option value="Personalia">Personalia</option>
                            <option value="Sekretaris">Sekretaris</option>
                            <option value="Manajemen Atas">Manajemen Atas</option>
                        </optgroup>
                        <optgroup label="Seni/Media/Komunikasi">
                            <option value="Periklanan">Periklanan</option>
                            <option value="Seni/Desain Kreatif">Seni/Desain Kreatif</option>
                            <option value="Hiburan/Seni Panggung">Hiburan/Seni Panggung</option>
                            <option value="Hubungan Masyarakat">Hubungan Masyarakat</option>
                        </optgroup>
                        <optgroup label="Bangunan/Konstruksi">
                            <option value="Arsitek/Desain Interior">Arsitek/Desain Interior</option>
                            <option value="Sipil/Konstruksi Bangunan">Sipil/Konstruksi Bangunan</option>
                            <option value="Properti/Real Estate">Properti/Real Estate</option>
                            <option value="Survei Kuantitas">Survei Kuantitas</option>
                        </optgroup>
                        <optgroup label="Komputer/IT">
                            <option value="IT-Perangkat Keras">IT-Perangkat Keras</option>
                            <option value="IT-Jaringan/Sistem/Sistem Database">IT-Jaringan/Sistem/Sistem Database</option>
                            <option value="IT-Perangkat Lunak">IT-Perangkat Lunak</option>
                        </optgroup>
                        <optgroup label="Pendidikan/Pelatihan">
                            <option value="Pendidikan">Pendidikan</option>
                            <option value="Penelitian & Pengembangan">Penelitian &amp; Pengembangan</option>
                        </optgroup>
                        <optgroup label="Teknik">
                            <option value="Teknik Kimia">Teknik Kimia</option>
                            <option value="Teknik Elektrikal">Teknik Elektrikal</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                            <option value="Teknik">Teknik</option>
                            <option value="Mekanik/Otomotif">Mekanik/Otomotif</option>
                            <option value="Teknik Perminyakan">Teknik Perminyakan</option>
                            <option value="Teknik Lainnya">Teknik Lainnya</option>
                        </optgroup>
                        <optgroup label="Kesehatan">
                            <option value="Dokter/Diagnosa">Dokter/Diagnosa</option>
                            <option value="Farmasi">Farmasi</option>
                            <option value="Praktisi/Asisten Medis">Praktisi/Asisten Medis</option>
                        </optgroup>
                        <optgroup label="Hotel/Restoran">
                            <option value="Makanan/Minuman/Pelayanan Restoran">Makanan/Minuman/Pelayanan Restoran</option>
                            <option value="Hotel/Pariwisata">Hotel/Pariwisata</option>
                        </optgroup>
                        <optgroup label="Manufaktur">
                            <option value="Pemeliharaan">Pemeliharaan</option>
                            <option value="Manufaktur">Manufaktur</option>
                            <option value="Kontrol Proses">Kontrol Proses</option>
                            <option value="Pembelian/Manajemen Material">Pembelian/Manajemen Material</option>
                            <option value="Penjaminan Kualitas / QA">Penjaminan Kualitas / QA</option>
                        </optgroup>
                        <optgroup label="Penjualan/Marketing">
                            <option value="E-commerce">E-commerce</option>
                            <option value="Penjualan - Korporasi">Penjualan - Korporasi</option>
                            <option value="Digital Marketing">Digital Marketing</option>
                            <option value="Pemasaran/Pengembangan Bisnis">Pemasaran/Pengembangan Bisnis</option>
                            <option value="Merchandising">Merchandising</option>
                            <option value="Penjualan Ritel">Penjualan Ritel</option>
                            <option value="Penjualan - Teknik/Teknikal/IT">Penjualan - Teknik/Teknikal/IT</option>
                            <option value="Proses desain dan kontrol">Proses desain dan kontrol</option>
                            <option value="Tele-sales/Telemarketing">Tele-sales/Telemarketing</option>
                        </optgroup>
                        <optgroup label="Ilmu Pengetahuan">
                            <option value="Aktuaria/Statistik">Aktuaria/Statistik</option>
                            <option value="Pertanian">Pertanian</option>
                            <option value="Penerbangan">Penerbangan</option>
                            <option value="Bioteknologi">Bioteknologi</option>
                            <option value="Kimia">Kimia</option>
                            <option value="Teknologi Makanan/Ahli Gizi">Teknologi Makanan/Ahli Gizi</option>
                            <option value="Geologi/Geofisika">Geologi/Geofisika</option>
                            <option value="Ilmu Pengetahuan & Teknologi/Lab">Ilmu Pengetahuan &amp; Teknologi/Lab</option>
                        </optgroup>
                        <optgroup label="Pelayanan">
                            <option value="Keamanan / Angkatan Bersenjata">Keamanan / Angkatan Bersenjata</option>
                            <option value="Pelayanan Pelanggan">Pelayanan Pelanggan</option>
                            <option value="Logistik/Jaringan distribusi">Logistik/Jaringan distribusi</option>
                            <option value="Hukum / Legal">Hukum / Legal</option>
                            <option value="Perawatan Kesehatan / Kecantikan">Perawatan Kesehatan / Kecantikan</option>
                            <option value="Pelayanan kemasyarakatan">Pelayanan kemasyarakatan</option>
                            <option value="Teknikal & Bantuan Pelanggan">Teknikal &amp; Bantuan Pelanggan</option>
                        </optgroup>
                            <optgroup label="Lainnya">
                            <option value="Pekerjaan Umum">Pekerjaan Umum</option>
                            <option value="Jurnalis/Editor">Jurnalis/Editor</option>
                            <option value="Penerbitan">Penerbitan</option>
                            <option value="Lainnya/Kategori tidak tersedia">Lainnya/Kategori tidak tersedia</option>
                        </optgroup>
                    </select>
                    <select name="gaji">
                    	<option value="">Gaji</option>
                    	<option value="Rp 500.000 s/d Rp 2.000.000">Rp 500.000 s/d Rp 2.000.000</option>
                        <option value="Rp 2.100.000 s/d Rp 5.000.000">Rp 2.000.000 s/d Rp 5.000.000</option>
                        <option value="Rp 5.100.000 s/d Rp 10.000.000">Rp 5.100.000 s/d Rp 10.000.000</option>
                        <option value="Rp 10.100.000 s/d Rp 20.000.000">Rp 10.100.000 s/d Rp 20.000.000</option>
                        <option value="Rp 20.100.000 s/d Rp 30.000.000">Rp 20.100.000 s/d Rp 30.000.000</option>
                        <option value="Rp 30.100.000 s/d Rp 50.000.000">Rp 30.100.000 s/d Rp 50.000.000</option>
                        <option value="Rp 50.100.000 s/d Rp 70.000.000">Rp 50.100.000 s/d Rp 70.000.000</option>
                    </select>
                    <button type="submit" name="cari" value="1">Cari Lowongan</button>
                </form>
            </nav>
            <?php
            	$baris = count($lowongan);
            	if ($baris == 0) { ?>
            	<article id="kiri">
            		<h1>Data yang dicari tidak dapat ditemukan</h1>
            	</article>	
            	
            <?php	
        		}
				foreach ($lowongan as $pekerjaan) :
                    $perusahaan=$pekerjaan['username_perusahaan'];
                    $nama_perusahaan=ambil1("SELECT nama_perusahaan FROM perusahaan WHERE username='$perusahaan' ");
            ?>
			<article id="kiri">
				<table border="0" width="100%" cellpadding="1" cellspacing="1">
       				<tbody>
           				<tr>
           					<th id="judul" width="60%" align="left"><a href="lowongan.php?id=<?=$pekerjaan['id_lowongan']; ?>"><?=$pekerjaan['judul']; ?></a></th>
                        	<td rowspan="5"><img width="300px" height="150px" src="../perusahaan/lowongan/"></td>
                    	</tr>
                    	<tr>
                        	<td id="namaPerusahaan"><?=$nama_perusahaan; ?></td>
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
