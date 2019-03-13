<?php
include "dbclass.php";
include "validasession.php";

//session_save_path ('/nfs/cust/0/99/05/550990/web/tmp/');
if (!session_start())
	session_start();
	
$dbcon = new connection($ip, $login, $pass, $db, $query);

if ($_SESSION["vg_id"]) $clienteid = $_SESSION["vg_id"];
else $clienteid = $idc;

$query = "select id_cat_adm,nombre from cat_Adm where id_cliente = ".$clienteid;
//print $query;
$dbcon->query($query);
$total = $dbcon->num_rows($resultado);


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
                Clients
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Adicionar Cliente</a>
                </li>
                <li class="active">Nuevo Cliente </li>
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
                                <form class="cmxform form-horizontal adminex-form" id="signupForm4" method="post" action="guardar_cliente.php" >
                                  <div class="form-group ">
                                    <label for="nit" class="control-label col-lg-2">Nombre</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="nombre" name="nombre" type="text" required />
                                        </div>
                                  </div>
                                  <div class="form-group ">
                                        <label for="numfactura" class="control-label col-lg-2">NIT</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="identificacion" name="identificacion" type="text" required />
                                        </div>
                                    </div>
                                    
                                    
                                    
                                  <div class="form-group ">
                                        <label for="numfactura" class="control-label col-lg-2">Nombre usuario</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="nombreus" name="nombreus" type="text" required />
                                        </div>
                                    </div>
                                  <div class="form-group ">
                                        <label for="numfactura" class="control-label col-lg-2">Apellido Usuario</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="apus" name="apus" type="text" required />
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group ">
                                        <label for="numfactura" class="control-label col-lg-2">Email</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="email" name="email" type="email" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="numfactura" class="control-label col-lg-2">Dirección</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="direccion" name="direccion" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="numfactura" class="control-label col-lg-2">Teléfono</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="telefono" name="telefono" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="numfactura" class="control-label col-lg-2">Ciudad</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="ciudad" name="ciudad" type="text" />
                                        </div>
                                    </div>
                                    
                                    <?php 
	/*
                                  <div class="form-group ">
                                    <label for="responsable" class="control-label col-lg-2">País</label>
                                        <div class="col-lg-10">
<select class="form-control input-sm m-bot15" name="id_pais">
                                                <option value="">Seleccione</option>
                                              <option value="1" selected>USA</option>
                          					  <option value="2">Colombia</option>
                                            </select>
                                        </div>
                                  </div>
								  
								  */
	?>
                                  
                                    <div class="form-group ">
                                        <label for="numfactura" class="control-label col-lg-2">Calve</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="nombre" name="clave" type="text" />
                                        </div>
                                    </div>
                                    
                                    
                                  <div class="form-group ">
                                    <label for="responsable" class="control-label col-lg-2">Estado</label>
                                        <div class="col-lg-10">
<select class="form-control input-sm m-bot15" name="estado">
                                                <option value="">Seleccione</option>
                                      <option value="1" selected>Activo</option>
              <option value="0">Inactivo</option>
                                            </select>
                                        </div>
                                  </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Send</button>
                                            <button class="btn btn-default" type="button" onClick="window.location = 'clientes.php'">Cancel</button>
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
