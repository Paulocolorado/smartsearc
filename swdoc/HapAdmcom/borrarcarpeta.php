<?
include "dbclass.php";
//include "validasession.php";

$dbcon = new connection($ip, $login, $pass, $db, $query);
$dbcon2 = new connection($ip, $login, $pass, $db, $query);
$dbcon3 = new connection($ip, $login, $pass, $db, $query);

				$query = "select * from  carpetas where padre = ".$_POST["idcborrar"];
				//print $query."<br>";
				$dbcon->query($query);
				$total = $dbcon->num_rows($resultado);
				if ($total==0){ 
					$query = "select * from  documentos where padre = ".$_POST["idcborrar"];
					//print $query;
				$dbcon2->query($query);
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