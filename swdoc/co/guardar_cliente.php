<?php
include "dbclass.php";
//include "validasession.php";
session_start();
$dbcon = new connection($ip, $login, $pass, $db, $query);
$query = "insert into clientes (nombre, identificacion, email, direccion, telefono, ciudad, clave, estado) values ('".$_POST["nombre"]."','".$_POST["identificacion"]."','".$_POST["email"]."','".$_POST["direccion"]."','".$_POST["telefono"]."','".$_POST["ciudad"]."','".$_POST["clave"]."',".$_POST["estado"].") ";
//print $query;

$dbcon->query($query);

$vlidcli = $dbcon->last_insert();

//Guarda el usuario


$query = "insert into usuarioscliente (id_cliente, nombre, apellido, email, clave, estado) values ('".$vlidcli."','".$_POST["nombreus"]."','".$_POST["apus"]."','".$_POST["email"]."','".$_POST["clave"]."',".$_POST["estado"].") ";

$dbcon->query($query);


//$lidcliente = $dbcon->last_insert();
//$query = "insert into usuarios values ($lidcliente,'$identificacion','$nombre','$nombre','$clave',1,1) ";
//$dbcon->query($query);
header("Location: clientes.php");
?>