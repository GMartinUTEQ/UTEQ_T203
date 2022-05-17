<?php
$aleat = rand(1, 100);
$inicio = 1;
echo "<h1>Contar desde el 1 hasta el: " . $aleat . "</h1>";
while ($inicio <= $aleat) {
    echo "<h1>" . $inicio . "</br>";
    $inicio++;
}
