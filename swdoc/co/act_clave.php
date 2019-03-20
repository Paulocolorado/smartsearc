<?php
include "dbclass7.php";
	session_start();
//session_save_path ('/nfs/cust/0/99/05/550990/web/tmp/');
session_start();

if($_POST["nclave"] == $_POST["cnclave"]){
	$dbcon = new connection();
	
	//$query = "select id_cliente,nombre from clientes where identificacion = '".$identificacion."' and clave = '".$clave."'";
	$query = "select id_cliente from clientes where id_cliente = '".$_SESSION["vg_idc"]."' and clave = '".$_POST["clave"]."'";
	
	//print $query;
	$resultado = $dbcon->query($query);
	$total = $dbcon->num_rows($resultado);
	if ($total > 0){
		$query2 = "update clientes set clave = '".$_POST["nclave"]."' where id_cliente = '".$_SESSION["vg_idc"]."'";
		$dbcon->query($query2);
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
