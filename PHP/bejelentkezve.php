<html>

<head>
	<META HTTP-EQUIV="Content-Type" Content="text/html; Charset=iso-8859-2">
	<META HTTP-EQUIV="Content-Language" Content="hu">
	<meta charset="utf-8" />
	<meta charset="utf8_decode" />
	<?php
	session_start();
	if (!isset($_SESSION['felhasznalonev']))
		header("location:index.php");
	?>
	<title>
		Weblap
	</title>
	<link rel="stylesheet" type="text/css" href="bejelentkezve.css">
</head>

<body>
	<div id=header>
		<div id=udvozlet>
			<p class=header>Hell&oacute <?php if (isset($_SESSION['felhasznalonev'])) echo $_SESSION['felhasznalonev'];
										else echo "vend&eacuteg"; ?>, &uumldv&oumlz&oumlllek!</p>
		</div>
		<div id=cim>
			<p class=header>Arany János Elméleti Líceum</p>
		</div>
		<div id=menu>
			<p class=header>
				<a href=emlek.php>Eml&eacutekeztet&ocirc</a>
				<?php
				if (isset($_SESSION['admin']) and $_SESSION['admin'] === "1") {
					echo "<a href=felsorol.php>Admin panel</a>";
				}
				?>
				<a href=valtozas.php>Jelsz&oacutecsere</a>
				<a href=kijelentkezes.php>Kijelentkez&eacutes</a>
			</p>
		</div>
	</div>
	<div id=content>
		<h1>Bejelentkezt&eacutel </h1><br>
		<p>A fenti men&uumlben meg tudod n&eacutezni mit tudsz csin&aacutelni a felhasználói fiókoddal.</p>
		<p>Kicsivel lejjebb pedig találsz több információt az iskolánkról, képeket, elérhetőséget, és egy olyan lapot ahol emberek tehetnek fel kérdéseket, és adhatnak ezekre választ</p>
		<p align=center>
			<table width=90% border="1px">
				<tr>
					<td>
						<p id="link"><a href=informacio.php>Információ</a></p>
					</td>
					<td>
						<p id="link"><a href=galeria.php>Galéria</a></p>
					</td>
					<td>
						<p id="link"><a href=forum.php>Kérdések és válaszok</a></p>
					</td>
					<td>
						<p id="link"><a href=elerhetoseg.php>Elérhetőségek</a></p>
					</td>
				</tr>
			</table>
		</p>
	</div>
</body>

</html>