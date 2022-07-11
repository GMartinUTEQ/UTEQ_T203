<?php


$updateFoto = "";
if (strlen($_FILES["fileToUpload"]["name"]) > 0) {
    $updateFoto = " , urlfoto = '" . $urlfoto . "'";
}

$sql = "update producto set nombre = 'Paco' " . $updateFoto . " where id = 5";

//update producto set nombre = 'Paco' where id = 5;

//update producto set nombre = 'Paco' ,urlfoto='http://hola.jpg" where id= 5;