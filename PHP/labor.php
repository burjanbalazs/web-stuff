<?php
$kapcsolodas=mysql_connect('localhost','root','');
$adatbazis=mysql_select_db('atestat9',$kapcsolodas);
$query=mysql_query("select * from telefon1 where nev='balogh zsolt' and tel='0740123444'");
if(mysql_num_rows($query)==0)
{ 	
	echo "nincs ilyen";
}
else
{
	$query2=mysql_query("delete from telefon where nev='balogh zsolt' and tel='0740123444'");
	echo "kitoroltuk";
}
$query3=mysql_query("select sum(impulzus) from telefon1");
$sor=mysql_fetch_assoc($query3);
echo "<br> az elhasznalt impulzusok szama: ";
echo $sor["sum(impulzus)"];

$query4=mysql_query("select min(impulzus) from telefon1");
$sor=mysql_fetch_assoc($query4);
echo "<br> az elhasznalt impulzusok min: ";
echo $sor["min(impulzus)"];

$query5=mysql_query("select max(impulzus) from telefon1");
$sor=mysql_fetch_assoc($query5);
echo "<br> az elhasznalt impulzusok max: ";
echo $sor["max(impulzus)"];

$query6=mysql_query("select avg(impulzus) from telefon1");
$sor=mysql_fetch_assoc($query6);
echo "<br> az elhasznalt impulzusok avg: ";
echo $sor["avg(impulzus)"];
?>