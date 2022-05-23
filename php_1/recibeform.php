<?php
/*

isset() <- Función que valida un dato.
$_GET[] <- Obtiene la información que se envía por método GET
$_POST[] <- Obtiene la información que se envía por método POST
$_REQUEST[] <- Obtiene la información sin importar el método.

*/
if (isset($_REQUEST["nombre"])) {
    echo "<h1>Nombre: " . $_REQUEST["nombre"] . "<h1>";
    echo "<h2>Edad: " . $_REQUEST["edad"] . "</h2>";
    echo "<h2>Fecha de Nacimiento: " . $_REQUEST["fnac"] . "</h2>";
}
