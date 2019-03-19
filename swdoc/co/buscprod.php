<?php
// calc an offset of 24 hours
  $offset = 0;	
// calc the string in GMT not localtime and add the offset
  $expire = "Expires: " . gmdate("D, d M Y H:i:s", time() - 186400) . " GMT";
//output the HTTP header
  Header($expire);

include "dbclass7.php";
include "validasession.php";
include "funciones.php";
/*CC Tabla no existe
session_start();
$dbcon = new connection();
$query = "select idacat,categoria from categorias ";
$resultado = $dbcon->query($query);
$total = $dbcon->num_rows($resultado);
*/
if ($msg == 2) $msgtxt="El producto se actualiz&oacute; con �xito";
else $msgtxt = ""; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content=""> <meta name="author" content="">
  <link rel="shortcut icon" href="#" type="image/png">
  
  
  
    

    <!--file upload-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-fileupload.min.css" />


  <title>SEARCH</title>

  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
     <?php include("nav.php")?>
    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

        <!--toggle button start-->
        <a class="toggle-btn"><i class="fa fa-bars"></i></a>
        <!--toggle button end-->


        <!--notification menu start -->
    <?php include("menusup.php")?>
        <!--notification menu end -->

        </div>
        <!-- header section end-->

        <!-- page heading start-->
        <div class="page-heading">
            <h3>
                Buscar Documento
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Documentos</a>
                </li>
                <li class="active"> Buscar Documento </li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
          <div class="row">
          <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">Ingrese la informacioin solicitada.</header>
                        <div class="panel-body">
                            <div class="form">
                                <form action="productosresp.php" method="get"  class="cmxform form-horizontal adminex-form" id="guardarp">
                                 
									<!--<div class="form-group ">
										<label for="nombre" class="control-label col-lg-2"><span class="label label-default">búsqueda avanzada</span></label>
										
                                        <div class="col-lg-10">
                                          <input type="radio" name="radio" id="radio" value="1">
                                          <label for="radio">No. de factura</label>
                                          <input type="radio" name="radio" id="radio" value="1">
                                          <label for="radio">No. de radicado</label>
                                          <input type="radio" name="radio" id="radio" value="1">
                                          <label for="radio">No. de NIT</label>
                                        </div>
									</div>-->
                                 
                                  <div class="form-group ">
                                <label for="nombre" class="control-label col-lg-2">Nombre</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="nombre" name="nombre" type="text" />
                                        </div>
                                  </div>
                                  
                                  <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Buscar</button>
                                            <button class="btn btn-default" type="button">Cancel</button>
                                        </div>
                                    </div>
                              </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!--body wrapper end-->

        <!--footer section start-->
     <?php include("footer.php")?>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>

<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script src="js/validation-init.js"></script>

<!--common scripts for all pages-->
<script src="js/scripts.js"></script>

</body>
</html>
