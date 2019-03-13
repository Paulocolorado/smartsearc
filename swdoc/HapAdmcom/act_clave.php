<?php
include "dbclass.php";
	session_start();
//session_save_path ('/nfs/cust/0/99/05/550990/web/tmp/');
session_start();
if($_POST["nclave"] == $_POST["cnclave"]){
	$dbcon = new connection($ip, $login, $pass, $db, $query);
	
	//$query = "select id_cliente,nombre from clientes where identificacion = '".$identificacion."' and clave = '".$clave."'";
	$query = "select idusuario from usuarios where idusuario = '".$_SESSION["vg_id"]."' and clave = '".$_POST["clave"]."'";
	//print $query;
	//exit;
	
	//print $query;
	$dbcon->query($query);
	$total = $dbcon->num_rows($resultado);
	if ($total > 0){
		$query = "update usuarios set clave = '".$_POST["nclave"]."' where idusuario = '".$_SESSION["vg_id"]."'";
		$dbcon->query($query);
		header("Location: cambiar_clave.php?msg=1&mn=8");
	}
	else{
		//la cloave original no corresponde
		header("Location: cambiar_clave.php?msg=2&mn=8");
	}
}
else{
	//la nueva clave y su confirmacion no son iguales
	header("Location: cambiar_clave.php?msg=3&mn=8");
}
?>
