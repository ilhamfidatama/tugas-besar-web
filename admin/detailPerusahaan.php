<?php  
    require 'tambahan.php';
    session_start();
    $username = $_SESSION['admin'];
    if (isset($_POST['terima'])) {
        $username_perusahaan = $_POST['username_perusahaan'];
        $update = mysqli_query($conn, "UPDATE verifikasi SET status='DITERIMA' WHERE username_perusahaan='$username_perusahaan'");
        echo "<script>
            alert('Status Perusahaan telah diterima');
        </script>";
    }elseif (isset($_POST['tolak'])) {
        $hapus = mysqli_query($conn, "DELETE FROM verifikasi WHERE username_perusahaan='$perusahaan'");
        $hapus = mysqli_query($conn, "DELETE FROM lowongan WHERE username_perusahaan='$perusahaan'");
        $hapus = mysqli_query($conn, "DELETE FROM perusahaan WHERE username='$perusahaan'");
        header('location:perusahaan.php');
    }else{
        $username_perusahaan = $_POST['perusahaan'];
    }
    if ($username == "" || $username == " ") {
        header('location:masuk.html');
    }
    $perusahaan = ambils("SELECT * FROM perusahaan WHERE username='$username_perusahaan'")[0];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ADMIN</title>
<link href="admin.css" rel="stylesheet" type="text/css">
</head>
<body>
	<section>
    	<nav id="kiri">
        	<img src="../foto/logo.jpg" alt="logo">
            <hr>
            <ul>
                <li><a href="pelamar.php">Pelamar</a></li>
                <li><a href="perusahaan.php">Perusahaan</a></li>
                <li><a href="loker.php">Lowongan Pekerjaan</a></li>
                <li><a href="keluar.php">Keluar</a></li>
            </ul>
        </nav>
        <article id="kanan">
        	<h1><?=$perusahaan['nama_perusahaan']; ?></h1>
            <table id="detail" width="100%" border="0" cellspacing="2px" cellpadding="2px">
              <tbody>
                <tr>
                	<td width="20%">Email</td>
                    <td width="1px">:</td>
                    <td width=""><?=$perusahaan['email']; ?></td>
                    <td width="30%" rowspan="5"> <img src="../perusahaan/img/<?=$perusahaan['foto_perusahaan']; ?>"> </td>
                </tr>
                <tr>
                	<td>NPWP</td>
                    <td>:</td>
                    <td><?=$perusahaan['npwp']; ?></td>
                </tr>
                <tr>
                	<td>No Telpon</td>
                    <td>:</td>
                    <td><?=$perusahaan['no_telpon']; ?></td>
                </tr>
                <tr>
                	<td>Tanggal Terdaftar</td>
                    <td>:</td>
                    <td><?=$perusahaan['tanggal_terdaftar']; ?></td>
                </tr>
                <tr>
                	<td>Area</td>
                    <td>:</td>
                    <td><?=$perusahaan['area']; ?></td>
                </tr>
                <tr>
                	<td>Alamat</td>
                    <td>:</td>
                    <td><?=$perusahaan['alamat_perusahaan']; ?></td>
                </tr>
                <tr>
                	<td>Bidang</td>
                    <td>:</td>
                    <td><?=$perusahaan['bidang']; ?></td>
                </tr>
                <tr>
                    <td>Ukuran Perusahaan</td>
                    <td>:</td>
                    <td><?=$perusahaan['jmlh_pegawai']; ?> orang</td>
                </tr>
                <tr>
                	<td>Website</td>
                    <td>:</td>
                    <td><?=$perusahaan['website']; ?></td>
                </tr>
                <tr>
                	<td>Jam Kerja</td>
                    <td>:</td>
                    <td><?=$perusahaan['jam_kerja']; ?></td>
                </tr>
                <tr>
                	<td>Deskripsi</td>
                    <td>:</td>
                    <td colspan="2"><?=$perusahaan['deskripsi']; ?></td>
                </tr>
                <tr>
                	<td>Visi</td>
                    <td>:</td>
                    <td colspan="2"><?=$perusahaan['visi']; ?></td>
                </tr>
                <tr>
                	<td>Misi</td>
                    <td>:</td>
                    <td colspan="2"><?=$perusahaan['misi']; ?></td>
                </tr>
              </tbody>
            </table>
            <br><br>
            <form method="post" action="">
                <input type="hidden" name="username_perusahaan" value="<?=$perusahaan['username']; ?>" >
                <button name="tolak">Tolak</button>
                <button name="terima">Terima</button>
            </form>
        </article>
    </section>
    <footer class="bawah" align="right"><p>Hak Cipta &copy;Informatika UNRAM</p></footer>
</body>
</html>
