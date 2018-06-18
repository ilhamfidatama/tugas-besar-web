<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Beranda</title>
<link href="Pelamar.css" rel="stylesheet" type="text/css">
</head>
<body>
		<header>
        	<div class="logo">
        		<img src="../foto/logo.jpg" alt="lOker" width="150px">
        	</div>
            <nav>
            	<ul>
                	<li><a href="beranda.html">Beranda</a></li>
                    <li><a href="CariLowongan.html">Cari Lowongan</a></li>
                    <li><a href="ProfilPelamar.html">Profil</a></li>
                    <li><a href="Riwayat.html">Riwayat</a></li>
                    <li id="menuKanan"><a href="awal.html">Keluar</a></li>
                </ul>
            </nav>
        </header>
		<section>
        	<nav id="pelamar">
            	<img name="fotoProfil" alt="Foto Profil" width="80px" height="80px">
                <table border="0" cellpadding="1px" cellspacing="1px">
                	<tbody>
                    	<tr>
                        	<th id="namaPelamar" align="left">nama</th>
                        </tr>
                        <tr>
                        	<td id="pendidikan">pendidikan</td>
                        </tr>
                        <tr>
                        	<td id="institusi">institusi</td>
                        </tr>
                    </tbody>
                </table>
                <form name="editPelamar" method="post" action="EditPelamar.php">
                	<button type="submit" name="edit" value="1">Edit Profil</button>
                </form>
            </nav>
            <!--<article>
            	<table border="0" width="100%" cellpadding="1" cellspacing="1">
                	<tbody>
                    <tr>
                    	<th id="judul" width="60%" align="left">judul</th>
                        <td rowspan="4"></td>
                    </tr>
                    <tr>
                        <td id="namaPerusahaan">nama perusahaan</td>
                    </tr>
                    <tr>
                        <td id="kota">kota</td>
                    </tr>
                    <tr>
                        <td id="gaji">gaji</td>
                    </tr>
                    </tbody>
                </table>
            </article>-->
            <?php  
				$colors = array("red", "green", "blue", "yellow"); 

				foreach ($colors as $value) {
  					echo "
						<article>$value</article>
					";
				}
			?> 
        </section>
        
		<footer class="bawah" align="right"><p>Hak Cipta &copy;Informatika UNRAM</p></footer>
</body>
</html>
