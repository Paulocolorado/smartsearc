<?
include "dbclass.php";
include "validasession.php";
include "funciones.php";
$dbcon = new connection($ip, $login, $pass, $db, $query);

$query = "select id_subcat_adm,nombre from subcat_Adm where id_cat_adm = ".$id_cat_adm." order by nombre";
$dbcon->query($query);
$total = $dbcon->num_rows($resultado);
if ($_REQUEST["msg"] == 2) $msgtxt = "La clave actual ingresada no corresponde";
if ($_REQUEST["msg"] == 3) $msgtxt = "La clave nueva y la confirmacion de esta deben ser iguales";

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
                Seguridad
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Claves</a>
                </li>
                <li class="active"> Cambio clave </li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
          <div class="row">
          <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">Fields</header>
                        <?
                        if ($_REQUEST["msg"] == 2){
						?>
                        <div class="alert alert-block alert-danger fade in">
                                <button type="button" class="close close-sm" data-dismiss="alert">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>Alerta! </strong> Su clave actual no coincide.
                            </div>
                        <?
						}
                        if ($_REQUEST["msg"] == 3){
						?>
                        <div class="alert alert-block alert-danger fade in">
                                <button type="button" class="close close-sm" data-dismiss="alert">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>Alerta! </strong> Su nueva clave y confirmación no coinciden.
                            </div>
                            <?
						}
                        if ($_REQUEST["msg"] == 1){
							?>
                            <div class="alert alert-success fade in">
                                <button type="button" class="close close-sm" data-dismiss="alert">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>Bien!</strong> Su clave se actualizó con éxito.
                            </div>
                        <?
						}
						?>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal adminex-form" id="signupForm1" method="post" action="act_clave.php">
                                  <div class="form-group ">
                                    <label for="clave" class="control-label col-lg-2">Password </label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="clave" name="clave" type="password" required />
                                        </div>
                                  </div>
                                  <div class="form-group ">
                                        <label for="nclave" class="control-label col-lg-2">New Password</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="nclave" name="nclave" type="password" required />
                                        </div>
                                    </div>
                                  <div class="form-group ">
                                    <label for="cnclave" class="control-label col-lg-2">Confirm New Password</label>
                                        <div class="col-lg-10">
											<input class=" form-control" id="cnclave" name="cnclave" type="password" required />
                                        </div>
                                  </div>
                                    

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Cambiar Clave</button>
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
