<html>
    <head>
        <title>App Web que indica una acreditación</title>
    </head>
    <body>
        <?php
            $num_aleatorio = rand(1, 100); //rand = Random = Aleatorio
            echo "El promedio es: ";
            echo $num_aleatorio;
            echo "<br>";
            if($num_aleatorio >= 80)
            {
                echo "<h1>Alumno aprobado</h1>";
            }
            else
            {
                echo "<h1>Alumno reprobado ! </h1>";
            }
        ?>
    </body>
</html>