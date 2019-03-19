<?php
include "dbclass7.php";
//include "validasession.php";

$dbcon = new connection();

				$consulta = "select idusrpermiso from  usrpermiso where iducp = ".$_REQUEST["iduc"]." and idcarpeta = ".$_REQUEST["idcar"];
				//print $query."<br>";
				$resultado = $dbcon->query($consulta);
				$total = $dbcon->num_rows($resultado);
				if ($total==0){ 
				    $consulta = "insert into usrpermiso (iducp, idcarpeta, permiso) values (".$_REQUEST["iduc"].",".$_REQUEST["idcar"].",".$_REQUEST["vlper"].") ";
				}
				else {
					$datos = $dbcon->fetch_array($resultado);
					$consulta = "update usrpermiso set iducp = ".$_REQUEST["iduc"].", idcarpeta = ".$_REQUEST["idcar"].", permiso = ".$_REQUEST["vlper"]." where idusrpermiso = ".$datos["idusrpermiso"];
				
				}
//print $query;
//exit;
				$dbcon->query($consulta);
	
header("Location: permisos.php?idcli=".$_REQUEST["idcli"]."&idcar=".$_REQUEST["idcar"]."&idc=".$_REQUEST["idcli"]);

?>