<?php
include "dbclass.php";
//include "validasession.php";
//session_start();
$dbcon = new connection($ip, $login, $pass, $db, $query);
$query = "update carpetas  set nombre = '".$_REQUEST["nombre"]."' where idcarpeta = ".$_REQUEST["idcarpeta"];
//print $query;
//exit;
$dbcon->query($query);
header("Location: navegam.php?idc=".$_REQUEST["idc"]."&padre=".$_REQUEST["padre"]."");
?>