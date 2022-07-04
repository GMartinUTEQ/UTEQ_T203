<?php
session_start();

if (isset($_POST["usuario"]) && isset($_POST["pass"])) {
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];
}

include("conexion.php");

$sql = "select idusuario, usuario, pass, tipousuario from usuario where upper(usuario) = '" . strtoupper($usuario) . "';";
//die($sql);
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if (md5($pass) == $row["pass"]) {

            if ($row["tipousuario"] > 0) {
                $_SESSION["nomcliente"] = $row["usuario"];
                $carrito = array();
                $_SESSION["sCarrito"] = $carrito;
                echo ("<script>window.location.href='../index.php';</script>");
            } else {
                $_SESSION["nomusuario"] = "@" . $row["usuario"];
                echo ("<script>window.location.href='dashboard.php';</script>");
            }
        } else {
            echo ("<script>alert('Eres medio Brou, contraseña incorrecta');window.location.href='index.php';</script>");
        }
    }
} else {
    echo ("<script>alert('Tu no eres Brou, usuario incorrecto');window.location.href='index.php'</script>");
}
$conn->close();
