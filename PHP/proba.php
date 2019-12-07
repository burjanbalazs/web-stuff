<?php
$time = date('H:i');
$irasdatum=fopen("logdatum.txt","a");
fwrite($irasdatum, $time);
fclose($irasdatum);
?>