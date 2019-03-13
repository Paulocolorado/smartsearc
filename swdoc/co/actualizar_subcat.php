<?php
include "dbclass.php";
//include "validasession.php";
//session_start();
$dbcon = new connection($ip, $login, $pass, $db, $query);

$query = "update subcategorias set nombre ='".iconv('UTF-8','ISO-8859-1//TRANSLIT',$_REQUEST["nombre"])."', descripcion = '".iconv('UTF-8','ISO-8859-1//TRANSLIT',$_REQUEST["desc"])."' where idsubcat=".$_REQUEST["id_subcat_adm"];
$dbcon->query($query);
header("Location: int_subcat.php?idc=".$_REQUEST["idc"]."&nom=".$_REQUEST["nom"]."&mn=3"	);
?>