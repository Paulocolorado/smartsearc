<?php

include "dbclass7.php";
include "funciones.php";

session_start();

$dbcon = new connection(); 



$consultan = "SELECT nombre, email FROM clientes  WHERE id_cliente = '".$_POST["idc"]."'";

$resultadojd = $dbcon->query($consultan);

$datosjd = $dbcon->fetch_array($resultadojd);



$nombrecliente = $datosjd["nombre"];

$emailcliente = $datosjd["email"];





$a= time();



if ($_FILES['documento']) {
	
    //$file_ary = reArrayFiles($_FILES['documento']);

foreach($_FILES['documento']['tmp_name'] as $key => $tmp_name ){ 
//print "P<br>";

	
    $file_name = $key.$_FILES['documento']['name'][$key];
    $file_size =$_FILES['documento']['size'][$key];
    $file_tmp =$_FILES['documento']['tmp_name'][$key];
    $file_type=$_FILES['documento']['type'][$key];
	$vltamano = $_FILES['documento']['size'][$key];
	
	$extfile = substr($file_name,-3);
	$tipodoc = $file_type;
	$vgpathdocs = "docs/";

	//print "-- ".$file_type."<br>";

	//print "ext: ".$_FILES['deliv']['name']."<br />";

	//print "ext: ".$extfile."<br />";

	
	if (!file_exists ( $vgpathdocs.$_POST["idc"]."/")){
		mkdir ($vgpathdocs.$_POST["idc"]."/");
		//print "Nopi";
	}
	if (!file_exists ( $vgpathdocs.$_POST["idc"]."/".$_POST["padre"]."/")){
		mkdir ($vgpathdocs.$_POST["idc"]."/".$_POST["padre"]."/");
		//print "Nopi";
	}
	

	$nombredelimail = $vgpathdocs.$_POST["idc"]."/".$_POST["padre"]."/".$_POST["idc"]."_".$a."_".$file_name;
	//print $nombredelimail;
	//exit;

	$nombredelimailBD = $_POST["idc"]."/".$_POST["padre"]."/".$_POST["idc"]."_".$a."_".$file_name;

	

	copy($file_tmp,$nombredelimail);



$consulta = "insert into documentos set  idcliente = '".$_POST["idc"]."', fecha = now(), nombre = '".$file_name."', adjunto = '".$nombredelimailBD."', padre = ".$_POST["padre"].", tipo = '".$tipodoc."', tamano = '".$vltamano ."'";

$resultado = $dbcon->query($consulta);

$total = $dbcon->num_rows($resultado);

}
$msg = "Se&ntilde;ores:<br />

<strong>".$nombrecliente."</strong><br /><br />

Se ha subido un documento <br />

Documento: ".$_POST["nombre"]."
<br />
<br />


Para descargar el documento, por favor de <a href=\"http://xxxxxxx.net/admin/docs/".$nombredelimailBD."\">clic</a> aqui<br /><br />



Puede ingresar por nuestro sitio WEB<br /><br />


www.sds.com

<br />

Este es un E-mail autom&aacute;tico, por favor no le de responder, cualquier inquietud puede contactar a operaciones@kronoslogistics.net o servicioalcliente@sds.com";







$encabezados = "From: \"Tracking \" <tracking@xxxxxxx.net>\r\n";

$encabezados .= "Content-type: text/html\r\n";

//if ($visiblecliente == 1) mail($emailcliente,"Carga doc  ",$msg,$encabezados);




	header("Location: navegam.php?idc=".$_POST["idc"]."&padre=".$_POST["padre"]);

}else{

	print "Error";

	}





?>