<?
include "dbclass.php";
include "validasession.php";
include "funciones.php";
session_start();
$dbcon = new connection($ip, $login, $pass, $db, $query);


$query = "select nombre from carpetas where idcarpeta = ".$_REQUEST["idcar"];

$dbcon->query($query);
$total = $dbcon->num_rows($resultado);
$datos = $dbcon->fetch_array($resultado);
$vlncar = $datos["nombre"];

$query = "select * from usuarioscliente where estado != 0 and id_cliente = ".$_REQUEST["idcli"]." order by nombre ";

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
               Permisos Carpeta: <strong><?=$vlncar?></strong>
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Permisos</a>
                </li>
                <li class="active">  </li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <form class="cmxform form-horizontal adminex-form" id="signupForm" method="post" action="actpermisos.php" name="signupForm">
          <div class="panel-body">
            <div class="adv-table">
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
        <tr>
            <th>Usuario</th>
            <th>Permiso</th>
        </tr>
        </thead>
        <tbody>
              
              <?
		for ($i=0; $i<$total; $i++)
		{
			$datos = $dbcon->fetch_array($resultado);
		?>
        <tr >
         <td>
         <?
			 $vlpermiso = permisocarpeta($datos["iduc"], $_REQUEST["idcar"] );
			//print "Permiso actual = ".$vlpermiso;
			if ($vlpermiso == 1){ 
								$vlvalcb = $datos["iduc"];
								$vltxt = "Asigando";
								$vltxtlink = "Negar";
								$vloperacion = 0;
								}else{
								$vlvalcb = $datos["iduc"];
								$vltxt = "No autorizado";
								$vltxtlink = "";
								$vltxtlink = "Autorizar";
								$vloperacion = 1;
			}
			 ?>
         <?
		  print "<strong>".$datos["nombre"]." ".$datos["apellido"]."</strong>";
		  ?></td>
       <td><?=$vltxt?> - <a href="actpermisos.php?idcli=<?=$_REQUEST["idcli"]?>&idcar=<?=$_REQUEST["idcar"]?>&vlper=<?=$vloperacion?>&iduc=<?=$vlvalcb ?>"><?=$vltxtlink?></a></td>
        </tr>
        <?
		}
		?>    
                
        </tbody>
        </table>
        </div>
             <div class="form-group">
                <div class="col-lg-offset-2 col-lg-2"><input name="totalprods" type="hidden" id="totalprods" value="<?=$k?>">
                          <input type="hidden" name="idcli" value="<?=$_REQUEST["idcli"]?>">
                          <input type="hidden" name="idcar" value="<?=$_REQUEST["idcar"]?>">
                </div>
            </div> 
      </div>
    </form>
    
      
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

<!--dynamic table-->
<script type="text/javascript" language="javascript" src="js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/data-tables/DT_bootstrap.js"></script>
<!--dynamic table initialization -->
<script src="js/dynamic_table_init.js"></script>

<!--common scripts for all pages-->
<script src="js/scripts.js"></script>

                <form name="fcarrito" action="agregarcarrito.php" method="post">
                    <input type="hidden" name="idprod" value="">
                    <input type="hidden" name="qt" value="">
                    <input type="hidden" name="idcb" value="<?=$idcb?>">
                  </form>
                <form name="fsort" action="resprod.php" method="post">
                    <input type="hidden" name="codigo" value="<?=$codigo?>">
                    <input type="hidden" name="nombre" value="<?=$nombre?>">
                    <input type="hidden" name="idcategoria" value="<?=$idcategoria?>">
                    <input type="hidden" name="setbq" value="<?=$setbq?>">
                    <input type="hidden" name="idcb" value="<?=$idcb?>">
                    <input type="hidden" name="ordenarpor" value="">
                  </form>
 <form name="exportxls" action="expxls.php" method="post">
                    <input type="hidden" name="query" value="<?=$queryexp?>">
                    <input type="hidden" name="nombre" value="">
 </form>
</body>
</html>
