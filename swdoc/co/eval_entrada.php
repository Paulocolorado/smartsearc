<?php 

include "dbclass.php";
//include "validasession.php";
session_start();
$dbcon = new connection($ip, $login, $pass, $db, $query = "");
$datos = new connection($ip, $login, $pass, $db, $query = "");

//echo "mensaje";exit();

//$query = "select a.id_cliente,a.nombre nc, a.cuota, b.nombre nus, b.apellido apus, b.estado, b.iduc from clientes a, usuarioscliente b where a.id_cliente = b.id_cliente and  b.email = '".mysqli_real_escape_string($dbcon,$_POST["email"])."' and b.clave = '".mysqli_real_escape_string($dbcon,$_POST["clave"])."' and a.estado = 1 and b.estado = 1";
$query = "select a.id_cliente,a.nombre nc, a.cuota, b.nombre nus, b.apellido apus, b.estado, b.iduc from clientes a, usuarioscliente b where a.id_cliente = b.id_cliente and  b.email = '".$_POST["email"]."' and b.clave = '".$_POST["clave"]."' and a.estado = 1 and b.estado = 1";

//print $query;
//exit;
//$dbcon->query($db,$query);
//$total = $dbcon->num_rows($resultado);
$resultado = $dbcon->query($db,$query);
//$total = $resultado->num_rows;
$total->num_rows($resultado);
//print $total."---total";
if ($total > 0){
	$datos = $dbcon->fetch_array($resultado);
	//session_save_path ('/nfs/cust/0/99/05/550990/web/tmp/');
	session_start(); 
	$uid = 3;
	//$vg_id = $datos[id_cliente];
	//session_register("uid");
	//print "----".$datos["nombre"]." ".$datos["apellido"];
	//session_register("vg_id");
	$_SESSION["vg_idc"]=$datos["id_cliente"]; 
	$_SESSION["vg_iduc"]=$datos["iduc"]; 
	$_SESSION["vg_cuota"]=$datos["cuota"];
	$_SESSION["vg_nombre"]=$datos["nus"]." ".$datos["apus"];
	 $_SESSION['tiempo'] = time();
	$_SESSION["vg_nombrecli"]=$datos["nc"]
	//header("Location: int_iniciopp.php?idc=".$datos[id_cliente]."&nomc=".$datos[nombre]);
	?>
	<form name="abc" method="post" action="inicio.php" target="_parent">
	  <input type="hidden" name="idwh" value="<?=$datos["id_cliente"]?>">
	  <input type="hidden" name="nomwh" value="<?=$datos["nombre"]?>">
	</form>
	<script language="javascript">
	document.abc.submit();
	</script>
	<?
}
else{
//print "noooo";
	header("Location: index.php?msg=1");
}
?>
