<?php  
    require 'tambahan.php';
    session_start();
    $username = $_SESSION['admin'];
    if ($username == "" || $username == " ") {
        header('location:masuk.html');
    }
    $perusahaan = ambils("SELECT * FROM perusahaan");
    $total = count($perusahaan);
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
        	<h1>Daftar Perusahaan</h1>
            <h3>Total : <?=$total; ?></h3>
            <table id="list" width="100%" border="0" cellspacing="2px" cellpadding="2px">
              <tbody>
                <tr>
                  <th width="5%">No.</th>
                  <th width="35%">Nama Perusahaan</th>
                  <th width="35%">email</th>
                  <th width="10%">Status</th>
                  <th width="10%">Detail</th>
                </tr>
                <?php $no=1; foreach ($perusahaan as $comp) : 
                    $username_perusahaan = $comp['username'];
                    $status = ambil1("SELECT status FROM verifikasi WHERE username_perusahaan='$username_perusahaan'");
                ?>
                <tr>
                	<td><?=$no; ?></td>
                    <td><?=$comp['nama_perusahaan']; ?></td>
                    <td><?=$comp['email']; ?></td>
                    <td><?=$status; ?></td>
                    <td>
                    <form method="post" action="detailPerusahaan.php">
                    	<input type="hidden" name="perusahaan" value="<?=$comp['username']; ?>">
                    	<button type="submit" name="detail">Detail</button>
                    </form>
                    </td>
                </tr>
                <?php $no++; endforeach; ?>
              </tbody>
            </table>
        </article>
    </section>
    <footer class="bawah" align="right"><p>Hak Cipta &copy;Informatika UNRAM</p></footer>
</body>
</html>
