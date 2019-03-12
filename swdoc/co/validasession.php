<?
if (!session_start())
	session_start();
	
	$inactivo = 900;
	$vida_session = time() - $_SESSION['tiempo'];
		if ($_SESSION["vg_idc"] <= 0){
			session_destroy();
			header("Location: index.php");
			//print "err";
			}
	if($vida_session > $inactivo)
	{
			session_destroy();
			header("Location: index.php");
    }
 
    $_SESSION['tiempo'] = time();
?>
		