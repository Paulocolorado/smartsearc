<?
include "dbclass.php";
include "validasession.php";
session_start();
$dbcon = new connection($ip, $login, $pass, $db, $query);
$query = "select categoria,idacat from categorias where idacat = ".$_REQUEST["idc"];
$dbcon->query($query);
$total = $dbcon->num_rows($resultado);
$datos = $dbcon->fetch_array($resultado);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content=""> <meta name="author" content="">
  <link rel="shortcut icon" href="#" type="image/png">

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
     <? include("nav.php")?>
    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

        <!--toggle button start-->
        <a class="toggle-btn"><i class="fa fa-bars"></i></a>
        <!--toggle button end-->


        <!--notification menu start -->
    <? include("menusup.php")?>
        <!--notification menu end -->

        </div>
        <!-- header section end-->

        <!-- page heading start-->
        <div class="page-heading">
            <h3>
                Category
          </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Add</a>
                </li>
                <li class="active"> Nueva subcategoria </li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
          <div class="row">
          <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">fields - <span class="titulosint">
                          LA PETALA
                        </span></header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal adminex-form" id="form1" method="post" action="guardar_subcat.php?mn=3">
                                <div class="form-group ">
                                    <label for="nit" class="control-label col-lg-2">Category</label>
                                        <div class="col-lg-10"><span class="titulosint">
                                        <?=$_REQUEST["nom"]?>	
            <input name="id_cat_adm" type="hidden" id="id_cat_adm" value="<?=$_REQUEST["idc"]?>">
            <input name="nom" type="hidden" id="nom" value="<?=$_REQUEST["nom"]?>">
                                  </span> </div>
                                  </div>
                                  <div class="form-group ">
                                    <label for="nit" class="control-label col-lg-2">Sub Category</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="nombre" name="nombre" type="text" />
                                            <span class="titulosint">
                                        </span> </div>
                                  </div>
                                  
                                  <div class="form-group ">
                                    <label for="nit" class="control-label col-lg-2">Descripción</label>
                                        <div class="col-lg-10">
                                          <textarea name="desc" cols="40" rows="5" id="desc" class=" form-control" ></textarea>
                                          <span class="titulosint">
                                        </span> </div>
                                  </div>
                                  <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Send</button>
                                            <button class="btn btn-default" type="button" onClick="window.location='int_subcat.php&mn=3'">Cancel</button>
                                            <input name="idc" type="hidden" id="idc" value="<?=$_REQUEST["idc"]?>">
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
     <? include("footer.php")?>
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
