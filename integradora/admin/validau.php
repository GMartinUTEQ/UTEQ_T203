<?php

if (isset($_POST["usuario"]) && isset($_POST["pass"])) {
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];
}

include("conexion.php");

$sql = "select idusuario, usuario, pass from usuario where usuario = '$usuario';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if (md5($pass) == $row["pass"]) {
            echo ("<script>alert('Bienvenido Brou');window.location.href='dashboard.php';</script>");
            //header("location:dashboard.php");
        } else {
            echo ("<script>alert('Eres medio Brou, contraseña incorrecta');window.location.href='index.html';</script>");
        }
    }
} else {
    echo ("<script>alert('Tu no eres Brou, usuario incorrecto');window.location.href='index.html'</script>");
}
$conn->close();
