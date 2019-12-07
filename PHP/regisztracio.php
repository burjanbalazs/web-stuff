<meta charset="utf8_decode"/>
<?php
if(isset($_POST['submit']))
{
session_start();
$felhasznalonev=strip_tags($_POST["felhasznalonev"]);
$email=strip_tags($_POST['email']);
$jelszo=strip_tags($_POST['password']);
$jelszoujra=strip_tags($_POST['repassword']);
	if($felhasznalonev)
	{
		if($jelszo)
		{
			if($email and filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				if($jelszoujra)
				{
					if($jelszo==$jelszoujra)
					{
						if(strlen($jelszo)>=4 and strlen($jelszo)<=20)
						{
							if(strlen($felhasznalonev)>=4 and strlen($felhasznalonev)<=20)
							{
								$kapcsolodas=mysql_connect('localhost','root','');
								$adatbazis=mysql_select_db('users',$kapcsolodas);
								$query=mysql_query("SELECT * FROM info WHERE username='$felhasznalonev'");
								$numrows=mysql_num_rows($query);
									if($numrows==0)
									{
										$query2=mysql_query("SELECT * FROM info WHERE email='$email'");	
										$numrows2=mysql_num_rows($query2);
											if($numrows2==0)
											{
												$datum=date('Y-m-d');
												$query=mysql_query("SELECT id from info");
												$i=1;
												$_SESSION['felhasznalonev']=$felhasznalonev;
												while($rows = mysql_fetch_assoc($query))
												{
													$i++;
												}
												$query3=mysql_query("INSERT INTO info VALUES ('$i','$felhasznalonev','$jelszo','$email','$datum','')");
												header("Location:bejelentkezve.php");
											}
											else 
												echo "<script type='text/javascript'>alert('Ez az e-mail mar letezik')</script>";
									}
									else 
										echo "<script type='text/javascript'>alert('Ez a felhasznalonev mar letezik')</script>";
							}
							else
								echo "<script type='text/javascript'>alert('A felhasznalonevnek legalabb 4 karakter hosszunak kell lennie')</script>"; 
						}
						else 
							echo "<script type='text/javascript'>alert('A jelszonak legalább 4 karakter hosszúnak kell lennie')</script>";
					}
					else
						echo "<script type='text/javascript'>alert('A ket jelszo nem egyezik')</script>";
				}
				else 
					echo "<script type='text/javascript'>alert('Nem ismetelted meg a jelszavad')</script>";
			}
			else 
				echo "<script type='text/javascript'>alert('Nem adtal meg e-mailt vagy az hibas')</script>";
		}
		else
			echo '<script type="text/javascript">alert("Nem adtal meg jelszavat")</script>';
	}
	else 
		echo "<script type='text/javascript'>alert('Nem adtal meg felhasznalanevet')</script>";
}
?>
<html>
<head>
<META HTTP-EQUIV="Content-Type" Content="text/html; Charset=iso-8859-2">
<META HTTP-EQUIV="Content-Language" Content="hu">
<title>
Weblap
</title>
<link rel="stylesheet" type="text/css" href="regisztracio.css">
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
			<a href=bejelentkezes.php>Bejelentkez&eacutes</a> 
			<a href=index.php>Vissza</a>
		</p>
	</div>
</div>
<div id=content>
	<h1><br>Regisztr&aacuteci&oacute</h1>
	<form action=regisztracio.php method=POST>
		<center>
			<table style="width:33%;">
				<tr>
					<td class=szoveg>Felhaszn&aacutel&oacuten&eacutev: </td>
					<td class=input><input type=text name=felhasznalonev value="<?php if(isset($_POST['submit'])) echo $felhasznalonev; ?>"></td>
				</tr>
				<tr>
					<td class=szoveg>Jelsz&oacute: </td>
					<td class=input><input type=password name=password value=""></td>
				</tr>
				<tr>
					<td class=szoveg>Jelsz&oacute &uacutejra: </td>
					<td class=input><input type=password name=repassword value=""></td>
				</tr>
				<tr>
					<td class=szoveg>E-mail: </td>
					<td class=input><input type=text name=email value="<?php if(isset($_POST['submit'])) echo $email;?>"</td>
				</tr>
			</table>
			<input type=submit value="Elk&uuml;ld" name=submit>
		</center>
	</form>
</div>
</body>
</html>