<?php  
    require 'tambahan.php';
    // require 'profil.css';
    // require 'pelamar.css';
    session_start();
    $username = $_SESSION['pelamar'];
    var_dump($username);
    
    if (isset($_POST['simpan'])) {
        $nama_lengkap = $_POST['nama_lengkap'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $tinggi_badan = $_POST['tinggi_badan'];
        $no_telpon = $_POST['nomor_telpon'];
        $alamat = $_POST['alamat'];
        //cek apakah mau upload foto profil atau tidak
        if ($_FILES['foto']['name'] != "") {
            $foto_profil = uploadProfil();
        }else{
            $foto_profil = $_POST['fotoP'];
        }
        //cek jenis kelamin di set ulang atau tidak
        if ($_POST['jenis_kelamin'] != "") {
            $jenis_kelamin = $_POST['jenis_kelamin'];
        }else{
            $jenis_kelamin = $_POST['jk'];
        }
        //cek agama apakah di set ulang atau tidak
        if ($_POST['agama'] != "") {
            $agama = $_POST['agama'];
        }else{
            $agama = $_POST['religion'];
        }
        //cek status apakah di set ulang atau tidak
        if ($_POST['status'] != "") {
            $status = $_POST['status'];
        }else{
            $status = $_POST['stat'];
        }
        $update = mysqli_query($conn, "UPDATE pelamar SET nama_lengkap='$nama_lengkap', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', no_telpon='$no_telpon', alamat_pelamar='$alamat', status='$status', tinggi_badan=$tinggi_badan, agama='$agama', foto_profil='$foto_profil', tempat_lahir='$tempat_lahir' WHERE username='$username' ");
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

    $pelamar = ambils("SELECT * FROM pelamar WHERE username='$username'")[0];

?>    

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Biodata</title>
<link href="Pelamar.css" rel="stylesheet" type="text/css">
<link href="profil.css" rel="stylesheet" type="text/css">
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
        	<nav id="profils">
            	<table border="0" cellpadding="1" cellspacing="1" width="100%">
                	<tbody>
                    	<tr>
                        	<td width="30%" align="center" valign="middle">
                            	<img id="foto" alt="foto profil" width="60px" height="60px" src="img/<?=$pelamar['foto_profil']; ?>">
                            </td>
                            <th id="namaLengkap" align="left"><?=$pelamar['nama_lengkap']; ?></th>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <ul>
                	<li><a href="ProfilPelamar.php">Biodata</a></li>
                    <li><a href="Pengaturan.php">Pengaturan Akun</a></li>
                </ul>
            </nav>
            <article id="kananp">
            	<h2>Profil Saya</h2>
                	<form name="biodata" method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" name="fotoP" value="<?=$pelamar['foto_profil']; ?>">
                        <input type="hidden" name="jk" value="<?=$pelamar['jenis_kelamin']; ?>">
                        <input type="hidden" name="religion" value="<?=$pelamar['agama']; ?>">
                        <input type="hidden" name="stat" value="<?=$pelamar['status']; ?>">
                    	<p>Nama Lengkap</p>
                        <input type="text" name="nama_lengkap" value="<?=$pelamar['nama_lengkap']; ?>">
                        <p>Unggah Foto</p>
                        <input type="file" name="foto" value="">
                        <p>Tempat Lahir</p>
                        <input type="text" name="tempat_lahir" value="<?=$pelamar['tempat_lahir']; ?>">
                        <p>Tanggal Lahir</p>
                        <input type="date" name="tanggal_lahir" value="<?=$pelamar['tanggal_lahir']; ?>">
                        <p>Jenis Kelamin</p>
                        <select name="jenis_kelamin">
                            <option value="">Pilih</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <p>Agama</p>
                        <select name="agama">
                            <option value="">Pilih</option>
                        	<option value="Islam">Islam</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Kong Hu Cu">Kong Hu Cu</option>
                        </select>
                        <p>Tinggi Badan (cm)</p>
                        <input type="number" name="tinggi_badan" value="<?=$pelamar['tinggi_badan']; ?>">
                        <p>Nomor Ponsel</p>
                        <input type="tel" name="nomor_telpon" value="<?=$pelamar['no_telpon']; ?>"> 
                        <p>Alamat</p>
                        <textarea name="alamat" value="<?=$pelamar['alamat_pelamar'];?>"><?=$pelamar['alamat_pelamar'];?></textarea>
                        <p>Status</p> 
                        <select name="status">
                            <option value="">Pilih</option>
                            <option value="Lajang">Lajang</option>
                            <option value="Menikah">Menikah</option>
                        </select>
                        <br><br>
                        <button name="batal">Batal</button>
                        <button name="simpan">Simpan</button>
					</form>
            </article>
        </section>
		<footer class="bawah" align="right"><p>Hak Cipta &copy;Informatika UNRAM</p></footer>
</body>
</html>
