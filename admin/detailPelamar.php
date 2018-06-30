<?php  
    require 'tambahan.php';
    session_start();
    $username = $_SESSION['admin'];
    if (isset($_POST['hapus'])) {
        $username = $_POST['pelamar'];
        $hapus = mysqli_query($conn, "DELETE FROM melamar WHERE username_pelamar='$username' ");
        $hapus = mysqli_query($conn, "DELETE FROM pelamar WHERE username='$username' ");
        header('location:pelamar.php');
    }
    if ($username == "" || $username == " ") {
        header('location:masuk.html');
    }
    $username_pelamar = $_POST['pelamar'];
    $pelamar = ambils("SELECT * FROM pelamar WHERE username='$username_pelamar'")[0];
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
        	<h1><?=$pelamar['nama_lengkap']; ?></h1>
            <table id="detail" width="100%" border="0" cellspacing="2px" cellpadding="2px">
              <tbody>
                <tr>
                	<td width="20%">Email</td>
                    <td width="1px">:</td>
                    <td width=""><?=$pelamar['email']; ?></td>
                    <td width="30%" rowspan="5"> <img width="200px" height="200px" src="../pelamar/img/<?=$pelamar['foto_profil']; ?>"> </td>
                </tr>
                <tr>
                	<td>Tempat, Tanggal lahir</td>
                    <td>:</td>
                    <td><?=$pelamar['tempat_lahir']; ?>, <?=$pelamar['tanggal_lahir']; ?></td>
                </tr>
                <tr>
                	<td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?=$pelamar['jenis_kelamin']; ?></td>
                </tr>
                <tr>
                	<td>No Telepon</td>
                    <td>:</td>
                    <td><?=$pelamar['no_telpon']; ?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td><?=$pelamar['agama']; ?></td>
                </tr>
                <tr>
                	<td>Status</td>
                    <td>:</td>
                    <td><?=$pelamar['status']; ?></td>
                </tr>
                <tr>
                	<td>Tinggi Badan</td>
                    <td>:</td>
                    <td><?=$pelamar['tinggi_badan']; ?> cm</td>
                </tr>
                <tr>
                	<td>Alamat</td>
                    <td>:</td>
                    <td><?=$pelamar['alamat_pelamar']; ?></td>
                </tr>
              </tbody>
            </table>
            <br><br>
            <form method="post" action="">
                <input type="hidden" name="pelamar" value="<?=$pelamar['username']; ?>" >
                <button name="hapus">hapus</button>
            </form>
        </article>
    </section>
    <footer class="bawah" align="right"><p>Hak Cipta &copy;Informatika UNRAM</p></footer>
</body>
</html>
