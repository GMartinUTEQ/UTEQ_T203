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

if (isset($_POST["edad"])) {
    unset($age[$_POST["edad"]]);
    $_SESSION["sAge"] = $age;
    echo "<h1>";
    var_dump($age);
    echo "</h1>";
}

echo "<form action='eliminar.php' method='post'>";

echo "<br><br><select name='edad' id='edad'>";
foreach ($age as $x => $x_value) {
    echo "<option value='"  . $x . "'>"  . $x . " - " . $x_value . "</option>";
}
echo "
<input type='submit' value='Eliminar'>
</select></form>";

/*
unset($array['key-here']);
*/
