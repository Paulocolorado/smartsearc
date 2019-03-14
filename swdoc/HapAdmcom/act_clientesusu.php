<?php
include "dbclass7.php";
//include "validasession.php";
session_start();
$dbcon = new connection;

$consulta = "update usuarioscliente 
set nombre = '".$_POST["nombre"]."',
apellido = '".$_POST["apellido"]."',
email = '".$_POST["email"]."',
clave = '".$_POST["clave"]."',
estado = ".$_POST["estado"]."
where iduc = ".$_POST["idc"];
//print $query."<br>--".$_POST["idc1"];
//exit;
$dbcon->query($consulta);
header("Location: usuarios.php?idc=".$_POST["idc1"]);
?>