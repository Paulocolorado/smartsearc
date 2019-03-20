<?php

include "dbclass7.php";

session_start();

$dbcon = new connection(); 


$query = "insert into carpetas set  idcliente = '".$_POST["idc"]."', nombre = '".utf8_decode($_POST["nombre"])."',  padre = ".$_POST["padre"];

$resultado = $dbcon->query($query);

$total = $dbcon->num_rows($resultado);



	header("Location: navega.php?idc=".$_POST["idc"]."&padre=".$_POST["padre"]);









?>

