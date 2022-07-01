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

echo "<br><br>";


if (isset($_POST["nombre"])) {
    if (strlen($_POST["nombre"]) > 0) {

        //array_push($age, $_POST["nombre"], $_POST["edad"]);
        $age += array($_POST["nombre"] => $_POST["edad"]);
        $_SESSION["sAge"] = $age;
    }
}

echo "<br><br>";

var_dump($age);


?>

<form action="agregar.php" method="post">
    Nombre: <input type="texto" id="nombre" name="nombre"><br>
    edad: <input type="texto" id="edad" name="edad"><br>
    <input type="submit" value="Agregar al arreglo">
</form>