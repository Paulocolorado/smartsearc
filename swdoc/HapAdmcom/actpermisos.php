<?php
include "dbclass.php";
//include "validasession.php";

$dbcon = new connection($ip, $login, $pass, $db, $query);

				$query = "select idusrpermiso from  usrpermiso where iducp = ".$_REQUEST["iduc"]." and idcarpeta = ".$_REQUEST["idcar"];
				//print $query."<br>";
				$dbcon->query($query);
				$total = $dbcon->num_rows($resultado);
				if ($total==0){ 
					$query = "insert into usrpermiso (iducp, idcarpeta, permiso) values (".$_REQUEST["iduc"].",".$_REQUEST["idcar"].",".$_REQUEST["vlper"].") ";
				}
				else {
					$datos = $dbcon->fetch_array($resultado);
					$query = "update usrpermiso set iducp = ".$_REQUEST["iduc"].", idcarpeta = ".$_REQUEST["idcar"].", permiso = ".$_REQUEST["vlper"]." where idusrpermiso = ".$datos["idusrpermiso"];
				
				}
//print $query;
//exit;
				$dbcon->query($query);
	
header("Location: permisos.php?idcli=".$_REQUEST["idcli"]."&idcar=".$_REQUEST["idcar"]."&idc=".$_REQUEST["idcli"]);

?>