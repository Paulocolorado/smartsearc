<?php
include "dbclass7.php";
//include "validasession.php";

$dbcon = new connection();
$dbcon2 = new connection();
$dbcon3 = new connection();

				$query = "select * from  carpetas where padre = ".$_POST["idcborrar"];
				//print $query."<br>";
				$resultado = $dbcon->query($query);
				$total = $dbcon->num_rows($resultado);
				if ($total==0){ 
					$query = "select * from  documentos where padre = ".$_POST["idcborrar"];
					//print $query;
					$resultado2 = $dbcon2->query($query);
				$total2 = $dbcon2->num_rows($resultado2);
					
					
		for ($i=0; $i<$total2; $i++)
		{
			$datos2 = $dbcon2->fetch_array($resultado2);
			
			$nombredelimail = $vgpathdocs.$datos2["adjunto"];
			//print $nombredelimail."<br>";
			unlink($nombredelimail);
			//print "id ".$datos2["iddocumento"]." nombre ".$datos2["nombre"];
		}
					$querydel = "delete from documentos where padre = ".$_POST["idcborrar"];
					$dbcon3->query($querydel);
					$querydel = "delete from carpetas where idcarpeta = ".$_POST["idcborrar"];
					$dbcon3->query($querydel);
				}
				else {
					header("Location: navegam.php?idc=".$_REQUEST["idc"]."&padre=".$_REQUEST["padre"]."&msgbc=1");
				exit;
				}
//print $query;
//exit;
				//$dbcon->query($query);
	
header("Location: navegam.php?idc=".$_REQUEST["idc"]."&padre=".$_REQUEST["padre"]);

?>