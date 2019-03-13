<?php
include "dbclass.php";
session_start();
$dbcon = new connection($ip, $login, $pass, $db, $query);

$a= time();
$vlqtymax = 0;
if ($_POST["qtymax"] != "") $vlqtymax = $_POST["qtymax"]; 
if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
	$extfile = substr($_FILES['imagen']['name'],-3);
	
	//print "ext: ".$_FILES['deliv']['name']."<br />";
	//print "ext: ".$extfile."<br />";
	
	//$nombredelimail = "/home/serviciosortoped/public_html/co/images/imgprod/".$a.$_FILES['imagen']['name'];
	$nombredelimail = "/home/lapetala/public_html/co/img/product/".$a.$_FILES['imagen']['name'];
	$nombredelimailBD = "/".$a.$_FILES['imagen']['name'];
	
	copy($_FILES['imagen']['tmp_name'],$nombredelimail);

$query = "INSERT INTO productos (activo, codigo, descripcion, vlbase, vliva, vltotal, idcategoria, idsubcat, imagen, nombre, destacado, qtymax, descgeneral, lista1, lista2, alto, ancho) VALUES ('".$_POST["activo"]."','".$_POST["codigo"]."', '".$_POST["descripcion"]."', '".$_POST["vlbase"]."', '".$_POST["vliva"]."', '".$_POST["vltotal"]."', '".$_POST["categoria"]."', '".$_POST["subcategoria"]."', '".$nombredelimailBD."', '".$_POST["nombre"]."', '".$_POST["destacado"]."', ".$vlqtymax.", '".$_POST["descgeneral"]."', '".$_POST["l1tit"]."', '".$_POST["l2tit"]."', '".$_POST["alto"]."', '".$_POST["ancho"]."') ";


$dbcon->query($query);
$idnuevoprod = $dbcon->last_insert();
$total = $dbcon->num_rows($resultado);

//print $total;
//exit;
}else{
	$query = "INSERT INTO productos (activo, codigo, descripcion, vlbase, vliva, vltotal, idcategoria, idsubcat, imagen, nombre, destacado, qtymax, descgeneral, lista1, lista2, alto, ancho) VALUES ('".$_POST["activo"]."', '".$_POST["codigo"]."', '".$_POST["descripcion"]."', '".$_POST["vlbase"]."', '".$_POST["vliva"]."', '".$_POST["vltotal"]."', '".$_POST["categoria"]."', '".$_POST["subcategoria"]."', '', '".$_POST["nombre"]."', '".$_POST["destacado"]."', ".$vlqtymax.", '".$_POST["descgeneral"]."', '".$_POST["l1tit"]."', '".$_POST["l2tit"]."', '".$_POST["alto"]."', '".$_POST["ancho"]."') ";


$dbcon->query($query);
$idnuevoprod = $dbcon->last_insert();
$total = $dbcon->num_rows($resultado);

//print $total;
//exit;
	}
if($_POST["l1txt"] != "-1"){
	$arrlista = split("\r",trim($_POST["l1txt"]));
	for ($a=0; $a<count($arrlista); $a++){
		if (trim($arrlista[$a]) != "" ){
			$query = "insert into contenidolista (idprod, idlista, valor) values (".$idnuevoprod.", 1, '".trim($arrlista[$a])."')";
			$dbcon->query($query);
		}
	}
}	


if($_POST["l2txt"] != "-1"){
	$arrlista2 = split("\r",trim($_POST["l2txt"]));
	for ($a=0; $a<count($arrlista2); $a++){
		if (trim($arrlista2[$a]) != "" ){
			$query = "insert into contenidolista (idprod, idlista, valor) values (".$idnuevoprod.", 2, '".trim($arrlista2[$a])."')";
			$dbcon->query($query);
		}
	}
}
	header("Location: inicio.php");
?>
