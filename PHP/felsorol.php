<html>
<?php
session_start();
$kapcsolodas = mysql_connect('localhost', 'root', '');
$adatbazis = mysql_select_db('users', $kapcsolodas);
?>

<head>
    <META HTTP-EQUIV="Content-Type" Content="text/html; Charset=iso-8859-2">
    <META HTTP-EQUIV="Content-Language" Content="hu">
    <title>
        Weblap
    </title>
    <link rel="stylesheet" type="text/css" href="felsorol.css">
</head>

<body>
    <div id="header">
        <div id=udvozlet>
            <p class=header>Hell&oacute vend&eacuteg, &uumldv&oumlz&oumlllek!</p>
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
    <div id="wrapper">
        <div iđ="content">
            <table style="width:100%">
                <tr>
                    <th>ID</th>
                    <th>USERNAME</th>
                    <th>PASSWORD</th>
                    <th>EMAIL</th>
                    <th>DATE</th>
                </tr>
                <?php
                $query = mysql_query("SELECT * FROM info");
                while($rows = mysql_fetch_assoc($query))
                {
                    echo "<tr>";
                        echo "<td>".$rows['id']."</td>";
                        echo "<td>".$rows['username']."</td>";
                        echo "<td>".$rows['password']."</td>";
                        echo "<td>".$rows['email']."</td>";
                        echo "<td>".$rows['datum']."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>