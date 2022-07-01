<ul>
    <li><a href="index.php">index</a></li>
    <li><a href="agregar.php">agregar</a></li>
    <li><a href="buscar.php">buscar</a></li>
    <li><a href="eliminar.php">eliminar</a></li>
</ul>
<?php
session_start();

$age = $_SESSION["sAge"];
var_dump($age);

echo "<br><hr>";

if (isset($_POST["nombre"])) {
    foreach ($age as $x => $x_value) {
        if (strtoupper($x) == strtoupper($_POST["nombre"])) {
            echo "<h1>" . $x . " tiene " . $x_value . "Años</h1>";
        }
    }
}

?>

<form action="buscar.php" method="post">
    Nombre: <input type="texto" id="nombre" name="nombre"><br>
    <input type="submit" value="Buscar en el arreglo">
</form>