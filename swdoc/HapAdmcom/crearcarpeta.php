<?

include "dbclass.php";

session_start();

$dbcon = new connection($ip, $login, $pass, $db, $query); 


$query = "insert into carpetas set  idcliente = '".$_POST["idc"]."', nombre = '".utf8_decode($_POST["nombre"])."',  padre = ".$_POST["padre"];

$dbcon->query($query);

$total = $dbcon->num_rows($resultado);



	header("Location: navegam.php?idc=".$_POST["idc"]."&padre=".$_POST["padre"]);









?>

