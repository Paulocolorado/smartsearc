<?php
include "dbclass.php";
//include "validasession.php";

$dbcon = new connection($ip, $login, $pass, $db, $query);

$query = "update categorias set categoria ='".$_REQUEST["nombre"]."' where idacat=".$_REQUEST["idacat"];
$dbcon->query($query);
header("Location: int_cat.php");
?>