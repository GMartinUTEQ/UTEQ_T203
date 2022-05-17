<?php

$nombres[] = "Pablo";
$nombres[] = "Rodrigo";
$nombres[] = "Pepe";
$nombres[] = "Beto";

for ($n = 0; $n < count($nombres); $n++) {
    echo $nombres[$n] . ", ";
}
echo "<br>";

foreach ($nombres as $bato) {
    echo $bato . ", ";
}
