<?
include "dbclass.php";
//include "validasession.php";
session_start();
$dbcon = new connection;
$dbcon->connection($ip, $login, $pass, $db, $query);
$query = "update clientes 
set nombre = '".$_POST["nombre"]."',
identificacion = '".$_POST["identificacion"]."',
email = '".$_POST["email"]."',
direccion = '".$_POST["direccion"]."',
telefono = '".$_POST["telefono"]."',
ciudad = '".$_POST["ciudad"]."',
id_pais = '".$_POST["id_pais"]."',
cuota = '".$_POST["cuota"]."000000000',
estado = ".$_POST["estado"]."
where id_cliente = ".$_POST["idc"];
//print $query;
//exit;
$dbcon->query($query);
header("Location: clientes.php");
?>