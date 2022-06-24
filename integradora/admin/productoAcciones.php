<?php

// Aquí comienza la carga del archivo 
$target_dir = "dist/uploadImgs/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
echo $target_dir . "<br>";
echo $target_file . "<br>";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if ($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
} else {
    echo "File is not an image.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<br>The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


die();

//Aqui comienza la conexión

if (!isset($_POST["idproducto"])) {

    if (isset($_POST["nombreproducto"]) &&  isset($_POST["idcategoria"]) &&  isset($_POST["descripcionproducto"]) &&  isset($_POST["urlfoto"])) {

        if (!isset($_REQUEST["activo"])) {
            $activo = "0";
        } else {
            $activo = "1";
        }

        include("conexion.php");

        /// Inicio consultar Clave de producto //

        $sql = "select  categoria.prefijo, substring(producto.claveproducto, 4, 2) as clave from producto inner join categoria on producto.idcategoria = categoria.idcategoria where categoria.idcategoria = " . $_POST["idcategoria"] . " order by clave desc limit 1;";
        //echo $sql;
        $result = mysqli_query($conn, $sql);
        $prefijo = "";
        $sigclave = "";
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $prefijo = $row["prefijo"];
                $sigclave = $row["clave"] + 1;
            }
        } else {
            echo "0 results";
        }

        /// Fin consultar ClaveProducto

        if ($sigclave < 10) {
            $sigclave = "0" . $sigclave;
        }

        $claveproducto = $prefijo . $sigclave;
        echo $claveproducto;

        $sql = "insert into producto (idproducto, idcategoria, claveproducto, nombreproducto, descripcionproducto, fechaalta, activo, urlfoto) values(0, " . $_POST["idcategoria"] . ", '" . $claveproducto . "', '" . $_POST["nombreproducto"] . "', '" . $_POST["descripcionproducto"] . "', now(), " . $activo . ", '" . $_POST["urlfoto"] . "')";
        echo $sql;
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='productolst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
