<ul>
    <li><a href="index.php">index</a></li>
    <li><a href="agregar.php">agregar</a></li>
    <li><a href="buscar.php">buscar</a></li>
    <li><a href="eliminar.php">eliminar</a></li>
</ul>
<?php
session_start();

$age = array();
$_SESSION["sAge"] = $age;
//var_dump($age);

//echo "La edad de Peter es: " . $age["Peter"] . "<br><br>";

var_dump($age);
