<html>
<?php
session_start();
?>
<head>
<META HTTP-EQUIV="Content-Type" Content="text/html; Charset=iso-8859-2">
<META HTTP-EQUIV="Content-Language" Content="hu">
<meta charset="utf-8"/>
<meta charset="utf8_decode"/>
<title>
Weblap
</title>
<link rel="stylesheet" type="text/css" href="elerhetoseg.css">
</head>
<body>
<div id=header>
	<div id=udvozlet>
		<p class=header>Hell&oacute <?php if(isset($_SESSION['felhasznalonev'])) echo $_SESSION['felhasznalonev']; else echo "vend&eacuteg";?>, &uumldv&oumlz&oumlllek!</p>
	</div>
	<div id=cim>
		<p class=header>Arany J&aacutenos Elm&eacuteleti L&iacuteceum</p>
	</div>
	<div id=menu>
		<p class=header>
			<a href=bejelentkezve.php>Vissza</a>
		</p>
	</div>
</div>
<div id=content>
	<h1>Iskol&aacutenk</h1><br>
	<p><strong>c&iacutem:</strong> Nagyszalonta, Aurel Lazăr u. 1</p>
	<p><strong>levelez&eacutesi c&iacutem:</strong> 415500 Nagyszalonta, Bihar, 1944 j&uacutenius 7 u. 2</p>
	<p><strong>tel/fax:</strong> 0359-405134</p>
	<p><strong>e-mail:</strong> gsaranyjanos@yahoo.com<strong>
</div>
</body>
</html>