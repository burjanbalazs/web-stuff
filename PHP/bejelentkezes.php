<?php
if (isset($_POST['submit'])) {
	if ($_POST['felhasznalonev'] and $_POST['password']) {
		session_start();
		$felhasznalonev = $_POST['felhasznalonev'];
		$jelszo = $_POST['password'];
		$kapcsolodas = mysql_connect('localhost', 'root', '');
		$adatbazis = mysql_select_db('users', $kapcsolodas);
		$query = mysql_query("SELECT * FROM info WHERE username='$felhasznalonev'");
		$numrows = mysql_num_rows($query);
		if ($numrows == 1) {
			while ($rows = mysql_fetch_assoc($query)) {
				$dbfelhasznalonev = $rows['username'];
				$dbjelszo = $rows['password'];
				$admin = $rows['admin'];
			}
			if ($jelszo == $dbjelszo) {
				$_SESSION['felhasznalonev'] = $felhasznalonev;
				$_SESSION['bejelentkezve'] = true;
				$_SESSION['admin'] = $admin;
				header("Location:bejelentkezve.php");
			} else if ($jelszo != $dbjelszo)
				echo "<script type='text/javascript'>alert('A jelszo nem megfelelo')</script>";
		}
		else echo "<script type='text/javascript'>alert('A felhasznalonev nem megfelelo')</script>";
	}
	else echo "<script type='text/javascript'>alert('Nem irtal be adatot!')</script>";
}
?>
<html>

<head>
	<META HTTP-EQUIV="Content-Type" Content="text/html; Charset=iso-8859-2">
	<META HTTP-EQUIV="Content-Language" Content="hu">
	<title>
		Weblap
	</title>
	<link rel="stylesheet" type="text/css" href="bejelentkezes.css">
</head>

<body>
	<div id=header>
		<div id=udvozlet>
			<p class=header>Hell&oacute vend&eacuteg, &uumldv&oumlz&oumlllek!</p>
		</div>
		<div id=cim>
			<p class=header>Arany János Elméleti Líceum</p>
		</div>
		<div id=menu>
			<p class=header>
				<a href=regisztracio.php>Regisztr&aacuteci&oacute</a>
				<a href=index.php>Vissza</a>
			</p>
		</div>
	</div>
	<div id=content>
		<h1>Bejelentkez&eacutes</h1><br>
		<form action="bejelentkezes.php" method=POST>
			<center>
				<table>
					<tr>
						<td class=szoveg>Felhaszn&aacutel&oacuten&eacutev: </td>
						<td class=input><input type=text name=felhasznalonev value=""></td>
					</tr>
					<tr>
						<td class=szoveg>Jelsz&oacute: </td>
						<td class=input><input type=password name=password value=""></td>
					</tr>
					<tr>
						<td colspan=2>
							<center><input type=submit value="Elk&uuml;ld" name=submit>
								<center>
						</td>
					</tr>
					<tr>
						<td colspan=2>
							<center><a href=emlek.php>Elfelejtetted a jelszavad?</a></center>
						</td>
					</tr>
				</table>
			</center>
		</form>
	</div>
</body>

</html>