<?php
include "dbclass.php";
//include "validasession.php";

$dbcon2 = new connection();
$dbcon3 = new connection();

				
					$query = "select * from  documentos where iddocumento = ".$_POST["idcborrar"];
			
					$resultado2 = $dbcon2->query($query);
				$total2 = $dbcon2->num_rows($resultado2);
					
					
		for ($i=0; $i<$total2; $i++)
		{
			$datos2 = $dbcon2->fetch_array($resultado2);
			
			$nombredelimail = $vgpathdocs.$datos2["adjunto"];
			//print $nombredelimail."<br>";
			//exit;
			unlink($nombredelimail);
					$querydel = "delete from documentos where iddocumento = ".$_POST["idcborrar"];
					$dbcon3->query($querydel);
			//print "id ".$datos2["iddocumento"]." nombre ".$datos2["nombre"];
		}
			
//print $query;
//exit;
				//$dbcon->query($query);
	
header("Location: navegam.php?idc=".$_REQUEST["idc"]."&padre=".$_REQUEST["padre"]);

?>