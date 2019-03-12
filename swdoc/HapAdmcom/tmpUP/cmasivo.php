<?
error_reporting(E_ALL ^ E_NOTICE);
include "../dbclass.php";
include "../validasession.php";
include "../funciones.php";
session_start();
$dbcon = new connection;
$dbcon->connection($ip, $login, $pass, $db, $query);
$query = "select * from clientes ";
$dbcon->query($query);
$total = $dbcon->num_rows($resultado);?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content=""> <meta name="author" content="">
  <link rel="shortcut icon" href="#" type="../image/png">

  <title>SEARCH</title>

  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
     <? 
	//include("../nav.php")
	?>
    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

        <!--toggle button start-->
        <a class="toggle-btn"><i class="fa fa-bars"></i></a>
        <!--toggle button end-->


        <!--notification menu start -->
    <? 
			//include("../menusup.php")
			?>
        <!--notification menu end -->

        </div>
        <!-- header section end-->

        <!-- page heading start-->
        <div class="page-heading">
            <h3>
                Cargue masivo
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Cargar</a>
                </li>
                <li class="active"> documentos </li>
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
                                <form class="cmxform form-horizontal adminex-form" id="signupForm4" method="post" action="proceso.php">
                                  
                                
                                  <div class="form-group ">
                                    <label for="responsable" class="control-label col-lg-2">Country</label>
                                        <div class="col-lg-10">
<select class="form-control input-sm m-bot15" name="idcliente">
                                                <option value="">Seleccionar cliente</option>
                                                <?
	for ($i=0; $i<$total; $i++)
		{
			$datos = $dbcon->fetch_array($resultado);
	?>
                                         <option value="<?=$datos["id_cliente"]?>" ><?=$datos["nombre"]?></option>
                                                <?
		}
	?>
                                            </select>
                                        </div>
                                  </div>
								  
                                    
                                    

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Continuar</button>
                                            <button class="btn btn-default" type="button" onClick="window.location='clientes.php'">Cancelar</button>
                                            <input name="idc" type="hidden" id="idc" value="<?=$_REQUEST["idc"]?>">
                                       <input name="idc1" type="hidden" id="idc1" value="<?=$_REQUEST["idcb"]?>">
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
     <? include("../footer.php")?>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="../js/jquery-1.10.2.min.js"></script>
<script src="../js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="../js/jquery-migrate-1.2.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/modernizr.min.js"></script>
<script src="../js/jquery.nicescroll.js"></script>

<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script src="../js/validation-init.js"></script>

<!--common scripts for all pages-->
<script src="../js/scripts.js"></script>

</body>
</html>
