<?php
include "dbclass7.php";
//include "validasession.php";
//session_start();
$dbcon = new connection();
$query = "update documentos  set nombre = '".$_REQUEST["nombre"]."' where iddocumento = ".$_REQUEST["iddocumento"];
//print $query;	
//exit;
$dbcon->query($query);
header("Location: navegam.php?idc=".$_REQUEST["idc"]."&padre=".$_REQUEST["padre"]."");
?>