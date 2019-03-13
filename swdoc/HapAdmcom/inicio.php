<?php
include "dbclass.php";
include "validasession.php";
session_start();
$dbcon = new connection($ip, $login, $pass, $db, $query);
//header("Content-Type: text/html;charset=utf-8");
$query = "SELECT * FROM subcat_Adm  WHERE 
id_cat_adm = ".$idc;
$dbcon->query($query);
$total = $dbcon->num_rows($resultado);
if ($msg==1) $msgtxt = "El producto ha sido ingresado satisfactoriamente";
if ($msg==2) $msgtxt = "El producto se actualizó con éxito";
if ($msg==3) $msgtxt = "El producto se descontó con éxito";
if ($msg==4) $msgtxt = "El producto no se encontró.<br>por favor verifique el código";
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

            <div class="row">
              <div class="col-lg-12">
                    <section class="panel">
                        <div class="carousel slide auto panel-body" id="c-slide">
                            <ol class="carousel-indicators out">
                                <li data-target="#c-slide" data-slide-to="0" class="active"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item text-center active">
                                  <h1>Bienvenido</h1>
                                  <p><h3>HAP eShop</h3><br>
                                    <br>
                                  </p>
                                    <p><small class="text-muted"><img src="images/logopet.png" width="244" height="234" alt=""/><br>
                                    <br>
                                    V. 1.0</small> </p>
                                </div>
                                
                            </div>
                            <a class="left carousel-control" href="#c-slide" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right carousel-control" href="#c-slide" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </section>
                    <div class="row"></div>
                    <div class="row"></div>
                    <div class="row"></div>
                    <div class="row"></div>
                    <div class="row"></div>
                    <div class="row"></div>

                </div>
            </div>

        </div>
        <!--body wrapper end-->

        
 <?php include("footer.php") ?>


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

<!--gritter script-->
<script type="text/javascript" src="js/gritter/js/jquery.gritter.js"></script>
<script src="js/gritter/js/gritter-init.js" type="text/javascript"></script>

<!--common scripts for all pages-->
<script src="js/scripts.js"></script>



</body>
</html>
