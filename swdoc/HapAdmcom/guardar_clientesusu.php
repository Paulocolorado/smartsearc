<?
include "dbclass.php";
//include "validasession.php";
session_start();
$dbcon = new connection;
$dbcon->connection($ip, $login, $pass, $db, $query);
$query = "insert into  usuarioscliente 
set nombre = '".$_POST["nombre"]."',
apellido = '".$_POST["apellido"]."',
email = '".$_POST["email"]."',
clave = '".$_POST["clave"]."',
estado = ".$_POST["estado"].",
id_cliente = ".$_POST["idc1"];
//print $query."<br>--".$_POST["idc1"];
//exit;
$dbcon->query($query);
header("Location: usuarios.php?idc=".$_POST["idc1"]);
?>