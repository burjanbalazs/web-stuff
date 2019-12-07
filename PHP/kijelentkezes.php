<?php
session_start();
unset($_SESSION['felhasznalonev']);
unset($_SESSION);
session_destroy();
header("Location:index.php");
?>