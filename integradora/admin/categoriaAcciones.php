<?php

if (isset($_REQUEST["acc"]) && isset($_GET["idcat"])) {
    include("conexion.php");
    $sql = "update categoria set activo = 0 where md5(idcategoria) = '" . $_GET["idcat"] . "'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href='categorialst.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {

    if (isset($_GET["idcat"])) {

        if (!isset($_REQUEST["nombre"])) {
            echo "<script>alert('Error al recibir los datos');window.open('categoria.php');</script>";
        }

        $nombre = $_REQUEST["nombre"];
        $prefijo = $_REQUEST["prefijo"];

        if (!isset($_REQUEST["activo"])) {
            $activo = "0";
        } else {
            $activo = "1";
        }


        include("conexion.php");

        $sql = "update categoria set nombrecategoria = '$nombre', prefijo='$prefijo', activo = '$activo' where md5(idcategoria) = '" . $_GET["idcat"] . "'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='categorialst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {

        if (!isset($_REQUEST["nombre"])) {
            echo "<script>alert('Error al recibir los datos');window.open('categoria.php');</script>";
        }

        $nombre = $_REQUEST["nombre"];
        $prefijo = $_REQUEST["prefijo"];

        if (!isset($_REQUEST["activo"])) {
            $activo = "0";
        } else {
            $activo = "1";
        }


        include("conexion.php");

        $sql = "insert into categoria (nombrecategoria, activo, fechaalta, prefijo) values('" . $nombre . "', " . $activo . ", now(), '" . $prefijo . "')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='categorialst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
