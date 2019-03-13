<?php
//$cadena = iconv('UTF-8','ISO-8859-1//TRANSLIT',$_POST["nombre"]);

include "dbclass.php";
session_start();
$dbcon = new connection($ip, $login, $pass, $db, $query);

$a= time();
$compx="";
if (is_uploaded_file($_FILES['imagen2']['tmp_name'])) {
	$extfile = substr($_FILES['imagen2']['name'],-3);
	
	//print "ext: ".$_FILES['deliv']['name']."<br />";
	//print "ext: ".$extfile."<br />";
	
	$nombredelimailx = "/home/lapetala/public_html/co/img/product/".$a.$_FILES['imagen2']['name'];
	$nombredelimailBDx = "/".$a.$_FILES['imagen2']['name'];
	copy($_FILES['imagen2']['tmp_name'],$nombredelimailx);
$compx.=" ,img2 = '".$nombredelimailBDx."'";
}
if (is_uploaded_file($_FILES['imagen3']['tmp_name'])) {
	$extfile = substr($_FILES['imagen3']['name'],-3);
	
	//print "ext: ".$_FILES['deliv']['name']."<br />";
	//print "ext: ".$extfile."<br />";
	
	$nombredelimailx = "/home/lapetala/public_html/co/img/product/".$a.$_FILES['imagen3']['name'];
	$nombredelimailBDx ="/". $a.$_FILES['imagen3']['name'];
	copy($_FILES['imagen3']['tmp_name'],$nombredelimailx);
$compx.=" ,img3 = '".$nombredelimailBDx."'";
}
if (is_uploaded_file($_FILES['imagen4']['tmp_name'])) {
	$extfile = substr($_FILES['imagen4']['name'],-3);
	
	//print "ext: ".$_FILES['deliv']['name']."<br />";
	//print "ext: ".$extfile."<br />";
	
	$nombredelimailx = "/home/lapetala/public_html/co/img/product/".$a.$_FILES['imagen4']['name'];
	$nombredelimailBDx = "/".$a.$_FILES['imagen4']['name'];
	copy($_FILES['imagen4']['tmp_name'],$nombredelimailx);
$compx.=" ,img4 = '".$nombredelimailBDx."'";
}



if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
	$extfile = substr($_FILES['imagen']['name'],-3);

	//print "ext: ".$_FILES['deliv']['name']."<br />";
	//print "ext: ".$extfile."<br />";
	
	$nombredelimail = "/home/lapetala/public_html/co/img/product/".$a.$_FILES['imagen']['name'];
	$nombredelimailBD = "/".$a.$_FILES['imagen']['name'];
	
	copy($_FILES['imagen']['tmp_name'],$nombredelimail);

$query = "update productos set activo = '".$_POST["activo"]."' , idsubcat = '".$_POST["subcategoria"]."', codigo = '".$_POST["codigo"]."' , descripcion='".iconv('UTF-8','ISO-8859-1//TRANSLIT',$_POST["descripcion"])."' ,alto='".$_POST["alto"]."', ancho = '".$_POST["ancho"]."', vlbase ='".$_POST["vlbase"]."' , vliva ='".$_POST["vliva"]."' , vltotal ='".$_POST["vltotal"]."', idcategoria = '".$_POST["categoria"]."' , imagen = '".$nombredelimailBD."' , nombre = '".iconv('UTF-8','ISO-8859-1//TRANSLIT',$_POST["nombre"])."' , destacado = '".$_POST["destacado"]."', qtymax = '".$_POST["qtymax"]."', lista1 = '".$_POST["l1tit"]."', lista2 = '".$_POST["l2tit"]."', descuento = '".$_POST["descuento"]."'".$compx."  where idprod =  ".$_POST["idprod"];


//print $query;
//exit;
$dbcon->query($query);
$total = $dbcon->num_rows($resultado);

//print $total;
//exit;
}else{
	$query = "update productos set  activo = '".$_POST["activo"]."' , idsubcat = '".$_POST["subcategoria"]."',codigo = '".$_POST["codigo"]."' , descripcion='".iconv('UTF-8','ISO-8859-1//TRANSLIT',$_POST["descripcion"])."' , vlbase ='".$_POST["vlbase"]."' , vliva ='".$_POST["vliva"]."' ,alto='".$_POST["alto"]."', ancho = '".$_POST["ancho"]."', vltotal ='".$_POST["vltotal"]."', idcategoria = '".$_POST["categoria"]."', qtymax = '".$_POST["qtymax"]."' ,  nombre = '".iconv('UTF-8','ISO-8859-1//TRANSLIT',$_POST["nombre"])."', lista1 = '".iconv('UTF-8','ISO-8859-1//TRANSLIT',$_POST["l1tit"])."', lista2 = '".iconv('UTF-8','ISO-8859-1//TRANSLIT',$_POST["l2tit"])."' , destacado = '".$_POST["destacado"]."', descuento = '".$_POST["descuento"]."'".$compx." where idprod =  ".$_POST["idprod"];

//print $query;
//exit;
$dbcon->query($query);
$total = $dbcon->num_rows($resultado);

//print $total;
//exit;
	}
//print $query;
//proexit();
if($_POST["l1txt"] != "-1"){
	$arrlista = split("\r",trim($_POST["l1txt"]));
			$query ="delete from contenidolista where idlista = 1 and idprod = ".$_POST["idprod"];
			$dbcon->query($query);
	for ($a=0; $a<count($arrlista); $a++){
		if (trim($arrlista[$a]) != "" ){
			$query = "insert into contenidolista (idprod, idlista, valor) values (".$_POST["idprod"].", 1, '".trim($arrlista[$a])."')";
			$dbcon->query($query);
		}
	}
}	


if($_POST["l2txt"] != "-1"){
	$arrlista2 = split("\r",trim($_POST["l2txt"]));
			$query ="delete from contenidolista where idlista = 2 and idprod = ".$_POST["idprod"];
			$dbcon->query($query);
	for ($a=0; $a<count($arrlista2); $a++){
		if (trim($arrlista2[$a]) != "" ){
			$query = "insert into contenidolista (idprod, idlista, valor) values (".$_POST["idprod"].", 2, '".trim($arrlista2[$a])."')";
			$dbcon->query($query);
		}
	}
}
if($_POST["pdelmes"] == "1"){
			$query ="update productos set pdelmes=0 ";
			$dbcon->query($query);
	
			$query ="update productos set pdelmes=1 where idprod =  ".$_POST["idprod"];
			$dbcon->query($query);
		
	
}
if($_POST["brrimg2"] == "1"){
	
			$query ="update productos set  img2='' where idprod =  ".$_POST["idprod"];
			$dbcon->query($query);
		
	
}
if($_POST["brrimg3"] == "1"){
	
			$query ="update productos set  img3='' where idprod =  ".$_POST["idprod"];
			$dbcon->query($query);
		
	
}

	header("Location: productosresp.php");
?>
