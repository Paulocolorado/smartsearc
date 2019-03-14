<?php
include "dbclass7.php";
include "validasession.php";
include "funciones.php";

session_start();
$dbcon = new connection();

if (!$_REQUEST["padre"]) $vlpadre = 0;
else $vlpadre = $_REQUEST["padre"];
if (!$_REQUEST["idc"]) $vlidc = 0;
else $vlidc = $_REQUEST["idc"];
$query = "select * from carpetas where idcliente = ".$_SESSION["vg_idc"]." and padre = 0 order by nombre";
//print $query;
$resultado = $dbcon->query($query);
$total = $dbcon->num_rows($resultado);


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content=""> <meta name="author" content="">
  <link rel="shortcut icon" href="#" type="image/png">

  <title>SEARCH</title>

  <!--gritter css-->
  <link rel="stylesheet" type="text/css" href="js/gritter/css/jquery.gritter.css" />

  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
  <script language="javascript">
	
	function cambiarfolder(padre){
		document.ffolder.padre.value = padre;
		document.ffolder.submit();
	}
	</script>
	<script>
	function aaa(docu){
	$obj = $('<object>');
	$obj.attr("data",docu);
	$obj.attr("type","application/pdf");
	$obj.addClass("w100");

	$("#pdfdiv_content").append($obj);
	
	$("#contpdf").show();
	}
</script> 
</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
     <?php include("nav.php") ?>
    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

        <!--toggle button start-->
        <a class="toggle-btn"><i class="fa fa-bars"></i></a>
        <!--toggle button end-->

      

        <!--notification menu start -->
     <?php include("menusup.php") ?>
        <!--notification menu end -->

        </div>
        <!-- header section end-->

        <!-- page heading start-->
        <div class="page-heading">
            <h3>
               SOFTWARE DE GESTION DOCUMENTAL
          </h3>
            <ul class="breadcrumb">
                <li>
                <a href="#">Home</a></li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb panel">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#">Inicio</a></li>
                    <li class="active"></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>

            <div class="row"></div>

         
         
         <div class="wrapper">
        
   	<div class="col-md-12 text-center">
   	<h1>Bienvenido<br>&nbsp;</h1>
	</div>
        <div class="row">
        
   	
                            <section class="panel">
                                <div class="panel-body btn-gap center-block">
               <?php
		for ($i=0; $i<$total; $i++)
		{
			$fondo = "background-color: #ffffff;
  margin: 1rem;
  padding: 1rem;
  border: 2px solid #ccc;
  /* IMPORTANTE */
  text-align: center;";
			$datos = $dbcon->fetch_array($resultado);
		?>
        <div class="col-md-2" style="<?php echo $fondo?>">
        <a href="#"  onClick="cambiarfolder(<?php echo $datos["idcarpeta"]?>)"><img src="images/folder_azul.png"  alt=""/></a> <br>
       	  <a href="#"><strong><?php print htmlentities($datos["nombre"], ENT_COMPAT, 'iso-8859-1')?></strong></a> 
        </div>
        <?php
		}
		?>
			</div>
			</section>
        
                            <section class="panel col-md-6">
             <div class="panel-body btn-gap center-block">
			 	<?php echo $_SESSION["vg_cuota"]/1000000000?> GB - Ocupado <?php $tamarchi = tamanodocs($_SESSION["vg_idc"]);
			  	$vltmegas = $tamarchi / 1000000;
				$vlgb = $tamarchi / 1000000000;
			print round($vltmegas,2)." MB";
			$porcentaje = ($tamarchi*100)/$_SESSION["vg_cuota"];
			print "<br>".round($porcentaje,2)."%";
			  ?>
                                    <div class="prog-avatar">
                                        <img src="images/harddrive.png" width="100" alt=""/>
                                    </div>
                                    <div class="details">
                                        <div class="title">
                                            Espacio utilizado
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje?>%">
                                                <span class=""><?php echo round($porcentaje,2)?>%</span>
                                            </div>
                                        </div>
                                    </div>
			 
        
			</div>
			</section>
       
        </div>

        </div>
        <!--body wrapper end-->

        
 <?php include("footer.php") ?>


    </div>
    <!-- main content end-->
</section>

                <form name="ffolder" action="navega.php" method="get">
                    <input type="hidden" name="idc" value="<?php echo $vlidc?>">
                    <input type="hidden" name="padre" value="">
                    <input type="hidden" name="padreactual" value="<?php echo $vlpadre?>">
                  </form>
<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>

<!--gritter script-->
<script type="text/javascript" src="js/gritter/js/jquery.gritter.js"></script>
<script src="js/gritter/js/gritter-init.js" type="text/javascript"></script>

<!--common scripts for all pages-->
<script src="js/scripts.js"></script>



</body>
</html>
