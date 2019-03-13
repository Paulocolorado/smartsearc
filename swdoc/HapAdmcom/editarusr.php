<?php
include "dbclass.php";
include "validasession.php";
include "funciones.php";
session_start();
$dbcon = new connection;
$dbcon->connection($ip, $login, $pass, $db, $query);
$query = "select * from usuarioscliente where iduc = ".$_REQUEST["idc"];
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
                Clientes
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Editar Cliente</a>
                </li>
                <li class="active"> Edición </li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
          <div class="row">
          <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">Campos</header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal adminex-form" id="signupForm4" method="post" action="act_clientesusu.php">
                                  <div class="form-group ">
                                    <label for="nit" class="control-label col-lg-2">Nombre</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="nombre" name="nombre" type="text" value="<?php echo $datos["nombre"]?>" />
                                        </div>
                                  </div>
                                  <div class="form-group ">
                                        <label for="numfactura" class="control-label col-lg-2">apellido</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="apellido" name="apellido" type="text" value="<?php echo $datos["apellido"]?>" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="numfactura" class="control-label col-lg-2">Email</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="email" name="email" type="email" value="<?php echo $datos["email"]?>" />
                                        </div>
                                    </div>
                                    
                                    <?php
	/*
                                  <div class="form-group ">
                                    <label for="responsable" class="control-label col-lg-2">Country</label>
                                        <div class="col-lg-10">
<select class="form-control input-sm m-bot15" name="id_pais">
                                                <option value="">Select</option>
                                              <option value="1" <? if ($datos["id_pais"]== 1) print "selected" ?>>USA</option>
              								  <option value="2" <? if ($datos["id_pais"]== 2) print "selected" ?>>Colombia</option>
                                            </select>
                                        </div>
                                  </div>
                                  */
	?>
                                  
                                    <div class="form-group ">
                                        <label for="numfactura" class="control-label col-lg-2">Clave</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="nombre" name="clave" type="text"  value="<?php echo $datos["clave"]?>"/>
                                        </div>
                                    </div>
                                    
                                    
                                  <div class="form-group ">
                                    <label for="responsable" class="control-label col-lg-2">Estado</label>
                                        <div class="col-lg-10">
<select class="form-control input-sm m-bot15" name="estado">
                                                <option value="">Seleccione</option>
                                                 <?php
	if ($datos["estado"] == 1) $seledo = "selected";
	else  $seledo = "";
	?>
                                                  <option value="1" <?php echo $seledo?>>Activo</option>
                                                 <?php
	if ($datos["estado"] == 0) $seledo = "selected";
	else  $seledo = "";
	?>
                                                  <option value="0" <?php echo $seledo?>>Inactivo</option>
                                            </select>
                                        </div>
                                  </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Actualizar</button>
                                            <button class="btn btn-default" type="button" onClick="window.location='clientes.php'">Cancelar</button>
                                            <input name="idc" type="hidden" id="idc" value="<?php echo $_REQUEST["idc"]?>">
                                       <input name="idc1" type="hidden" id="idc1" value="<?php echo $datos["id_cliente"]?>">
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
