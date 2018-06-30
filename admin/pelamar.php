<?php  
    require 'tambahan.php';
    session_start();
    $username = $_SESSION['admin'];
    if ($username == "" || $username == " ") {
        header('location:masuk.html');
    }
    $pelamar = ambils("SELECT * FROM pelamar");
    $total = count($pelamar);
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
        	<h1>Daftar Pencari Pekerjaan</h1>
            <h3>Total : <?=$total; ?></h3>
            <table id="list" width="100%" border="0" cellspacing="2px" cellpadding="2px">
              <tbody>
                <tr>
                  <th width="6%">No.</th>
                  <th width="15%">username</th>
                  <th width="29%">email</th>
                  <th width="35%">Nama Lengkap</th>
                  <th width="10%">Detail</th>
                </tr>
                <?php $no=1; foreach ($pelamar as $user) : ?>
                <tr>
                	<td><?=$no; ?></td>
                    <td><?=$user['username']; ?></td>
                    <td><?=$user['email']; ?></td>
                    <td><?=$user['nama_lengkap']; ?></td>
                    <td>
                    <form method="post" action="detailPelamar.php">
                    	<input type="hidden" name="pelamar" value="<?=$user['username']; ?>">
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
