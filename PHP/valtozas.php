<meta charset="utf-8"/>
<?php
session_start();
if(isset($_POST['submit']) and isset($_SESSION['felhasznalonev']))
{
if($_POST['felhasznalonev'] and $_POST['regijelszo'] and $_POST['ujjelszo'])
{
$kapcsolodas=mysql_connect('localhost','root','');
$adatbazis=mysql_select_db('users',$kapcsolodas);
$felhasznalonev=$_POST["felhasznalonev"];
$regijelszo=$_POST["regijelszo"];
$ujjelszo=$_POST["ujjelszo"];
$query=mysql_query("SELECT password FROM info WHERE username='$felhasznalonev'");
$rows=mysql_fetch_assoc($query);
	if($regijelszo==$rows['password'])
	{
		$query2=mysql_query("UPDATE info SET password='$ujjelszo' where username='$felhasznalonev'");
		echo "<script type='text/javascript'>alert('Sikeresen végrehajtva')</script>";
	}
	else
	{
		echo "<script type='text/javascript'>alert('Hibás felhasználónév vagy jelszó')</script>";
	}
}
else
echo "<script type='text/javascript'>alert('Nem irtal be adatot')</script>";
}
?>
<html>
<head>
<META HTTP-EQUIV="Content-Type" Content="text/html; Charset=iso-8859-2">
<META HTTP-EQUIV="Content-Language" Content="hu">
<title>
Weblap
</title>
<link rel="stylesheet" type="text/css" href="valtozas.css">
</head>
<body>
<div id=header>
	<div id=udvozlet>
		<p class=header>Hell&oacute <?php if(isset($_SESSION['felhasznalonev'])) echo $_SESSION['felhasznalonev']; else echo "vend&eacuteg";?>, &uumldv&oumlz&oumlllek!</p>
	</div>
	<div id=cim>
		<p class=header>Jelszo Valtozas</p>
	</div>
	<div id=menu>
		<p class=header>
			<a href=bejelentkezve.php>Vissza</a>
		</p>
	</div>
</div>
<div id=content>
	<center>
	<form action="valtozas.php" method=POST>
		<table cellspacing=1 cellpadding=1>
		
			<tr>
				<td>Felhaszn&aacutel&oacuten&eacutev: </td>
				<td><input type=text name=felhasznalonev></td>
			</tr>
			<tr>
				<td>R&eacutegi jelsz&oacute: </td>
				<td><input type=password name=regijelszo></td>
			</tr>
			<tr>
				<td>&Uacutej jelsz&oacute: </td>
				<td><input type=password name=ujjelszo></td>
			</tr>
			<tr>
				<td><input type=submit value="Elk&uuml;ld" name=submit onclick=show_popup()></td>
			</tr>
		</table>
		</form>
	</center>
</div>
</body>
</html>