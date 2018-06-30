<?php  
    require 'tambahan.php';
    session_start();
    $username = $_SESSION['admin'];
    if ($username == "" || $username == " ") {
        header('location:masuk.html');
    }
    $lowongan = ambils("SELECT * FROM lowongan");
    $total = count($lowongan);
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
        	<h1>Daftar Lowongan</h1>
            <h3>Total : <?=$total; ?></h3>
            <table id="list" width="100%" border="0" cellspacing="2px" cellpadding="2px">
              <tbody>
                <tr>
                  <th width="6%">No.</th>
                  <th width="15%">Judul</th>
                  <th width="29%">Jabatan</th>
                  <th width="35%">Bidang</th>
                  <th width="10%">Detail</th>
                </tr>
                 <?php $no=1; foreach ($lowongan as $loker) : ?>
                <tr>
                	<td><?=$no; ?></td>
                    <td><?=$loker['judul']; ?></td>
                    <td><?=$loker['jabatan']; ?></td>
                    <td><?=$loker['spesialisasi']; ?></td>
                    <td>
                    <form method="post" action="detailLowongan.php">
                    	<input type="hidden" name="loker" value="<?=$loker['id_lowongan']; ?>">
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
