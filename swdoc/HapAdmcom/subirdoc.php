<?

include "dbclass.php";

session_start();

$dbcon = new connection($ip, $login, $pass, $db, $query); 



$queryn = "SELECT nombre, email FROM clientes  WHERE id_cliente = '".$_POST["idc"]."'";

$dbcon->query($queryn);

$datosjd = $dbcon->fetch_array($resultadojd);



$nombrecliente = $datosjd["nombre"];

$emailcliente = $datosjd["email"];





$a= time();



if (is_uploaded_file($_FILES['documento']['tmp_name'])) {

	$extfile = substr($_FILES['documento']['name'],-3);
	$tipodoc = $_FILES['documento']['type'];

	

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
	

	$nombredelimail = $vgpathdocs.$_POST["idc"]."/".$_POST["padre"]."/".$_POST["idc"]."_".$a."_".$_FILES['documento']['name'];
	//print $nombredelimail;
	//exit;

	$nombredelimailBD = $_POST["idc"]."/".$_POST["padre"]."/".$_POST["idc"]."_".$a."_".$_FILES['documento']['name'];

	

	copy($_FILES['documento']['tmp_name'],$nombredelimail);



$query = "insert into documentos set  idcliente = '".$_POST["idc"]."', fecha = now(), nombre = '".utf8_decode($_POST["nombre"])."', adjunto = '".$nombredelimailBD."', padre = ".$_POST["padre"].", tipo = '".$tipodoc."'";

$dbcon->query($query);

$total = $dbcon->num_rows($resultado);




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




	header("Location: navega.php?idc=".$_POST["idc"]."&padre=".$_POST["padre"]);

}else{

	print "Error";

	}







?>

