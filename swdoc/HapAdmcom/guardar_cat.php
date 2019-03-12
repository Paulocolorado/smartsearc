<?
include "dbclass.php";
//include "validasession.php";
//session_start();
$dbcon = new connection($ip, $login, $pass, $db, $query);

$query = "insert into categorias (categoria) values ('".$_POST["nombre"]."') ";
$dbcon->query($query);
header("Location: int_cat.php");
?>