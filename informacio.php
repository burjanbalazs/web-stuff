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
<link rel="stylesheet" type="text/css" href="index.css">
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
	<p>1711-tol vannak &iacuter&aacutesos dokumentumaink a Schola reformata Nagyszalontaiensis-r&oacutel, melyben tanult eacutes tan&iacutetott Arany J&aacutenos. <br><br>
	1847-ben &eacutep&uumllt meg a ma Nagyiskol&aacutenak nevezett &eacutep&uumllet, mely otthont adott az als&oacute &eacutes fels&otilde gimn&aacuteziumi tagozatnak is.
<br><br>
A nagyszalontai polg&aacuteri &eacutes egyh&aacutezi szervezetek, a politikai vezet&eacutessel kar&oumlltve, l&eacutetfontoss&aacuteg&uacutenak l&aacutett&aacutek
 a tanuumlgyi int&eacutezm&eacutenyek oly m&oacutedon t&oumlrt&eacuten&otilde &aacutetrendez&eacutes&eacutet, hogy l&eacutetrej&oumljj&oumln egy sz&iacutenmagyar iskolak&oumlzpont. 
 <br>
F&otilde c&eacutelkituz&eacutes&uumlnk gyermekeinket &uacutegy nevelni, hogy megismerj&eacutek t&oumlrt&eacutenelm&uumlnket &eacutes &aacutepolj&aacutek hagyom&aacutenyainkat.
</div>
</body>
</html>