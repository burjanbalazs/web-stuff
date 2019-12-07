<meta charset="utf-8"/>
<?php
session_start();
?>
<html>
<meta charset="utf-8"/>
<head>
<meta charset="utf8_decode"/>
<title>Jelszó emlékezteto</title>
<link rel="stylesheet" type="text/css" href="emlek.css">
</head>
<body>
	<div id=header>
	<div id=udvozlet>
		<p class=header>Hell&oacute <?php if(isset($_SESSION['felhasznalonev'])) echo $_SESSION['felhasznalonev']; else echo "vend&eacuteg";?>, &uumldv&oumlz&oumlllek!</p>
	</div>
	<div id=cim>
		<p class=header>Arany János Elméleti Líceum</p>
	</div>
	<div id=menu>
		<p class=header>
			<a href=bejelentkezve.php>Vissza</a>
		</p>
	</div>
</div>
<div id=content>
<?php
if(isset($_POST['submit']))
{
	$kapcsolodas=mysql_connect('localhost','root','');
	$adatbazis=mysql_select_db('users',$kapcsolodas);
	$felhasznalonev=$_POST['felhasznalonev'];
	$kapcsolodas=mysql_connect('localhost','root','');
	$adatbazis=mysql_select_db('users',$kapcsolodas);
	$query=mysql_query("SELECT * FROM info WHERE username='$felhasznalonev'");
	$rows=mysql_fetch_assoc($query);
	if($rows['username']==$felhasznalonev)
	echo "Jelszavad: ".$rows['password'];
	else echo "nincs ilyen felhasznalonev";
}
if(isset($_SESSION['bejelentkezve']) and $_SESSION['bejelentkezve']==true)
{
$kapcsolodas=mysql_connect('localhost','root','');
$adatbazis=mysql_select_db('users',$kapcsolodas);
$felhasznalonev=$_SESSION['felhasznalonev'];
$query=mysql_query("SELECT * FROM info WHERE username='$felhasznalonev'");
while($rows=mysql_fetch_assoc($query))
{
$jelszo=$rows['password'];
}
echo "Jelszavad: ".$jelszo;
}
else
{
	echo "<br><br><br>";
	echo "<center>
		<form action=emlek.php method=POST>
		<table>
		<tr>
			<td>Felhaszn&aacutel&oacuten&eacutev:</td>
			<td><input type=text name=felhasznalonev></td>
			<td><input type=submit name=submit value=Elk&uuml;ld></td>
		</tr>
		</table>
		</form></center>
	";
}
?>
</div>
</body>
</body>
</html>