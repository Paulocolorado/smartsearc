<?php
include "dbclass7.php";
//include "validasession.php";
session_start();
$dbcon = new connection();


$query = "select idusuario,nombre, apellido from usuarios where email = '".$_POST["email"]."' and clave = '".$_POST["clave"]."' and activo = 1";

//print $query."<b>".$ip;
//exit;
$resultado = $dbcon->query($query);
$total = $dbcon->num_rows($resultado);
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
	$_SESSION["vg_id"]=$datos["idusuario"];
	$_SESSION["vg_nombre"]=$datos["nombre"]." ".$datos["apellido"];
	 $_SESSION['tiempo'] = time();
	//header("Location: int_iniciopp.php?idc=".$datos[id_cliente]."&nomc=".$datos[nombre]);
	?>
	<form name="abc" method="post" action="inicio.php" target="_parent">
	  <input type="hidden" name="idwh" value="<?php echo $datos["idusuario"]?>">
	  <input type="hidden" name="nomwh" value="<?php echo $datos["nombre"]." ".$datos["apellido"]?>">
	</form>
	<script language="javascript">
	document.abc.submit();
	</script>
	<?php
}
else{
//print "noooo";
	header("Location: index.php?msg=1&x=0");
}
?>
