<?php

if (
    !isset($_REQUEST["nombre"]) ||
    !isset($_REQUEST["materia"]) ||
    !isset($_REQUEST["ev1"]) ||
    !isset($_REQUEST["ev2"]) ||
    !isset($_REQUEST["ev3"])
) {
    die("Lo siento, no se recibió algún parámetro");
}

$promedio = 0;
$promedio = ($_REQUEST["ev1"] + $_REQUEST["ev2"] + $_REQUEST["ev3"]) / 3;
$resultado = "";
if ($promedio == 10) {
    $resultado = "AU";
} else {
    if ($promedio >= 9 && $promedio < 10) {
        $resultado = "DE";
    } else {
        if ($promedio >= 8 && $promedio < 9) {
            $resultado = "SA";
        } else {
            $resultado = "NA";
        }
    }
}

/*
if ($promedio == 10) {
    $resultado = "AU";
} elseif ($promedio >= 9  && $promedio < 10) {
    $resultado = "DE";
} elseif ($promedio >= 8  && $promedio < 9) {
    $resultado = "SA";
} else {
    $resultado = "NA";
}
*/

echo "<h1>Hola, " . $_REQUEST["nombre"] . "<h1>";
echo "<h2>El promedio de la materia: " . $_REQUEST["materia"] . " es: " . $promedio . " el resultado es: " . $resultado . "</h2>";
