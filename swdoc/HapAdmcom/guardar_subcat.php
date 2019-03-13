<?php
include "dbclass.php";
//include "validasession.php";
//session_start();
$dbcon = new connection($ip, $login, $pass, $db, $query);
$query = "insert into subcategorias  (idcat, nombre, descripcion ) VALUES ('".$_REQUEST["id_cat_adm"]."','".iconv('UTF-8','ISO-8859-1//TRANSLIT',$_REQUEST["nombre"])."', '".iconv('UTF-8','ISO-8859-1//TRANSLIT',$_REQUEST["desc"])."') ";

$dbcon->query($query);
header("Location: int_subcat.php?idc=".$_REQUEST["id_cat_adm"]."&nom=".$_REQUEST["nom"]);
?>