<html>
<?php
session_start();
if(!isset($_SESSION['felhasznalonev']))
	header("location:index.php");
?>
<head>
<META HTTP-EQUIV="Content-Type" Content="text/html; Charset=iso-8859-2">
<META HTTP-EQUIV="Content-Language" Content="hu">
<title>
Weblap
</title>
<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<div id=header>
	<div id=udvozlet>
		<p class=header>Hell&oacute <?php echo $_SESSION['felhasznalonev']; ?>, 
		&uumldv&oumlz&oumlllek!</p>
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
<center>
<br>
<table border=1 width=90%>
<?php
$i=1;
$log=fopen("log.txt","r");
$lognev=fopen("lognev.txt","r");
$logdatum=fopen("logdatum.txt","r");
while((($irasnev=fgets($lognev))!==false) and (($iras=fgets($log))!==false) and (($irasdatum=fgets($logdatum))!==false))
{
	echo "<tr><td width=15%>";
	echo $irasnev;
	echo "</td><td width=15%>";
	echo $irasdatum;
	echo "</td><td width=70%>";
	echo $iras;
	echo "</td></tr>";
	$i++;
}
	fclose($log);
	fclose($lognev);
	fclose($logdatum);
?>
</table>
<table>
<form action=forum.php method=POST>
<tr>
	<td><input type=text name=input></td>
	<td><input type=submit name=submit value=Elk&uuml;ld></td>
	<?php
		$kapcsolodas=mysql_connect("localhost","root","");
		$adatbazis=mysql_select_db("users",$kapcsolodas);
		$felhasznalonev=$_SESSION['felhasznalonev'];
		$query=mysql_query("select * from info where username='$felhasznalonev'");
		while($rows=mysql_fetch_assoc($query))
		{
		$admin=$rows['admin'];
		}
		if($admin==1)
		{
			echo "
			<br>
			<p>
			<form action=torol.php method=POST>
			<input type=submit name=submittorol value=T&ouml;r&ouml;l>
			</form>
			</p>";
		}
	?>
</tr>
</form>
</table>
</center>
</div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	$log=fopen("log.txt","a");
	$lognev=fopen("lognev.txt","a");
	$logdatum=fopen("logdatum.txt","a");
	$time=date("j/n H:i:s")."\n";
	$felhasznalonev=$_SESSION['felhasznalonev']."\n";
	if(!$_POST['input'])
	{
		header("location:forum.php");
	}
	else
	{
		$iras=$_POST['input']."\n";
		fwrite($log, $iras);
		fwrite($lognev, $felhasznalonev);
		fwrite($logdatum, $time);
		header("Refresh:0.01");
	}
}
if(isset($_POST['submittorol']))
{
	file_put_contents("log.txt", "");
	file_put_contents("lognev.txt", "");
	file_put_contents("logdatum.txt", "");
	header("refresh:0");
}
?>