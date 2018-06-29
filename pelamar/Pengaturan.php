<?php  
    require 'tambahan.php';
    // require 'profil.css';
    // require 'pelamar.css';

    session_start();
    $username = $_SESSION['pelamar'];
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
                <h2>Pengaturan Akun</h2>
                    <form name="biodata" method="post" action="setting.php">
                        <p>Email Utama :</p>
                        <input type="email" name="eutama" value="<?= $pelamar['email']; ?>">
                        <p>Email Cadangan :</p>
                        <input type="email" name="ecadangan" value="<?= $pelamar['email_cadangan']; ?>">
                        <p>Kata Sandi Lama :</p>
                        <input type="password" name="kslama" value="">
                        <p>Kata Sandi Baru :</p>
                        <input type="password" name="ksbaru" minlength="8" value="">
                        <p>Ulangi Kata Sandi :</p>
                        <input type="password" name="ksulang" minlength="8" value="">
                        <br><br>
                        <button name="batal">Batal</button>
                        <button name="simpan">Simpan</button>
                    </form>
            </article>
        </section>
        <footer class="bawah" align="right"><p>Hak Cipta &copy;Informatika UNRAM</p></footer>
</body>
</html>
