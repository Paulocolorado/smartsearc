<?php
include "dbclass.php";
include "validasession.php";
session_start();

$vl_nombre = $_REQUEST["nombre"];
$vl_nombre = str_replace("ñ","n",$vl_nombre);
$vl_nombre = str_replace("Ñ","N",$vl_nombre);
$dbcon = new connection($ip, $login, $pass, $db, $query);
header("Content-Type: text/html;charset=utf-8");
$query = "SELECT * FROM documentos  WHERE 
nombre like '%".iconv('UTF-8','ISO-8859-1//TRANSLIT',$vl_nombre)."%' ";
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
  <!--dynamic table-->
  <link href="js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="js/data-tables/DT_bootstrap.css" />

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
                Buscar Documento</h3>
            <ul class="breadcrumb">
                <li>
                <a href="#">Documentos</a></li>
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
                    <li><a href="#">Documentos</a></li>
                    <li class="active"></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>

          
          <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Resultado Busqueda
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
        </header>
        <div class="panel-body">
        <div class="adv-table">
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
        <tr>
            <th>Fecha</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i=0; $i<$total; $i++){
						
                        $datos = $dbcon->fetch_array($resultado);
                ?>
        
        <tr class="gradeX">
            <td><?php echo $datos["fecha"]?></td>
            <td><?php echo htmlentities($datos["nombre"], ENT_COMPAT, 'iso-8859-1')?></td>
            <td><?php echo $datos["tipo"]?></td>
            <td><a href="docs/<?php echo $datos["adjunto"]?>">Ver</a></td>
        </tr>
        <?php
		}
		?>
        </tbody>
        <tfoot>
        </tfoot>
        </table>
        </div>
        </div>
        </section>
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

<!--dynamic table-->
<script type="text/javascript" language="javascript" src="js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/data-tables/DT_bootstrap.js"></script>
<!--dynamic table initialization -->
<script src="js/dynamic_table_init.js"></script>

<!--common scripts for all pages-->
<script src="js/scripts.js"></script>



</body>
</html>
