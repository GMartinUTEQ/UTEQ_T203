<html>
    <head>
        <title>Utilización de variables con diferente tipo de dato.</title>
    </head>
    <body>
        <?php
            $dia = 10; //Tipo de dato: Entero
            $estatura = 1.78; //Tipo de dato: Doble, Decimal, Float.
            $nombre = "Juan"; //Tipo de dato:Texto, Cadena de caracteres, Varchar.
            $apellido = "Pérez"; //Tipo de dato:Texto, Cadena de caracteres, Varchar.
            $aprobado = true; //True = Palabra reservada. Tipo de dato: Booleano.
            //Concatenar es una función que podemos hacer con cadenas de texto.
            echo "Nombre del alumno: " . $nombre . " " . $apellido;
            echo "<br>";
            echo "Estatura: " . $estatura;
            echo "<br>";
            echo "Día actual: " . $dia;
            echo "<br>";
            if($aprobado === true)
            {
                echo "Resultado: Aprobado";
            }
            else
            {
                echo "Resultado: Reprobado";
            }
            
        ?>
    </body>
</html>