<?
include "dbclass.php";
include "validasession.php";
include "funciones.php";
session_start();
$dbcon = new connection($ip, $login, $pass, $db, $query);
$query = "select * from clientes where estado != 0 order by nombre ";

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
               Clientes
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Clientes</a>
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
        <form class="cmxform form-horizontal adminex-form" id="signupForm" method="post" action="nuevocliente.php" name="signupForm">
          <div class="panel-body">
            <div class="adv-table">
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>NIT</th>
            <th>Cuota</th>
            <th>Status</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
              
              <?
		for ($i=0; $i<$total; $i++)
		{
			$datos = $dbcon->fetch_array($resultado);
		?>
        <tr >
          <td><?
		  if ($datos["estado"]=="1")
		  print "<strong>";
		  ?>
		      <? print $datos["nombre"]?>
		      <?
		  if ($datos["estado"]=="1")
		  print "</strong>";
		  ?></td>
          <td ><?=$datos["identificacion"]?></td>
          <td ><?=$datos["cuota"]/1000000000?> GB - Ocupado <? $tamarchi = tamanodocs($datos["id_cliente"]);
			  	$vltmegas = $tamarchi / 1000000;
				$vlgb = $tamarchi / 1000000000;
			print round($vltmegas,2)." MB";
			$porcentaje = ($tamarchi*100)/$datos["cuota"];
			print "<br>".round($porcentaje,2)."%";
			  ?>
          
			<div class="progress progress-xs">
				<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?=$porcentaje?>%">
					<span class=""><?=round($porcentaje,1)?>%</span>
				</div>
			</div>
          
          </td>
          <td ><?=$datos["estado"]?></td>
          <td ><?
			  if ($_SESSION["vg_id"] == 1 || $_SESSION["vg_id"] == 2 ) {
			  ?>
			  <a href="editarcliente.php?idc=<?=$datos["id_cliente"]?>" >Editar</a>&nbsp;&nbsp;-&nbsp;&nbsp;
			<?
			  }
			  ?><a href="navegam.php?idc=<?=$datos["id_cliente"]?>&nom=<?=$datos["nombre"]?>" >Ver documentos </a>-&nbsp;&nbsp;
       <a href="usuarios.php?idc=<?=$datos["id_cliente"]?>&nom=<?=$datos["nombre"]?>" >Ver usuarios </a></td>
        </tr>
        <?
		}
		?>    
                
        </tbody>
        </table>
        </div>
             <div class="form-group">
                <div class="col-lg-offset-2 col-lg-2"><input name="totalprods" type="hidden" id="totalprods" value="<?=$k?>">
                          <input type="hidden" name="idcb" value="<?=$idcb?>">
                    <button class="btn btn-primary" type="submit">Adicionar Cliente</button>
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
