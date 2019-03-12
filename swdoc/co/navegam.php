<?
include "dbclass.php";
include "validasession.php";
include "funciones.php";
session_start();
$dbcon = new connection($ip, $login, $pass, $db, $query);
$dbcond = new connection($ip, $login, $pass, $db, $query);

if (!$_REQUEST["padre"]) $vlpadre = 0;
else $vlpadre = $_REQUEST["padre"];
if (!$_REQUEST["idc"]) $vlidc = 0;
else $vlidc = $_REQUEST["idc"];
$query = "select * from carpetas where idcliente = ".$_SESSION["vg_idc"]." and padre = ".$vlpadre." order by nombre";
//print $query;
$dbcon->query($query);
$total = $dbcon->num_rows($resultado);


$queryd = "select * from documentos where idcliente = ".$_SESSION["vg_idc"]." and padre = ".$vlpadre." order by nombre";

$dbcond->query($queryd);
$totald = $dbcond->num_rows($resultadod);
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
  <script language="javascript">
	
	function cambiarfolder(padre){
		document.ffolder.padre.value = padre;
		document.ffolder.submit();
	}
	</script>
	
	<script>
	function aaa(docu){
	$obj = $('<object>');
	$obj.attr("data",docu);
	$obj.attr("type","application/pdf");
	$obj.addClass("w100");

	$("#pdfdiv_content").append($obj);
	
	$("#contpdf").show();
	}
</script>
<style>
#pdfdiv_content{
	width:80%;
	height:80%;
	border:1px solid #0000FF;
/*position:relative;*/
	height:800px;
	position: fixed;
	z-index:9999;
	
}
#contpdf{
	width:80%;
	background-color: #FFFFFF; 
	position: fixed; 
	z-index:9998;
	
}
.w100{
	width:100%;
	position:absolute;
	height:100%;
	}
</style>
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
           
<div id="contpdf"  hidden><a href="#" onClick="$('#contpdf').hide();"><i class="fa fa-times" ></i> Cerrar</a>
<div id="pdfdiv_content" ></div></div>
            <h3>
               Clientes
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="inicio.php">Inicio</a>
                </li>
                <?
				if ($vlpadre>0){
				?>
                
                    <?
					menu($_SESSION["vg_iduc"], $vlpadre);
					?>
                
                <?
				}
				?>
                <li class="active">  </li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
        
        <div class="row">
        
               <?
		for ($i=0; $i<$total; $i++)
		{
			if ($fondo == "background-color: #F5F5F5") $fondo = "background-color: white;";
			else $fondo = "background-color: #F5F5F5";
			$datos = $dbcon->fetch_array($resultado);
		?>
        <div class="col-md-12" style="<?=$fondo?>"><a href="#" onClick="cambiarfolder(<?=$datos["idcarpeta"]?>)"><img src="images/folder.png" height="30" alt=""/></a> 
       	  <a href="#" onClick="cambiarfolder(<?=$datos["idcarpeta"]?>)"><strong><? print htmlentities($datos["nombre"], ENT_COMPAT, 'iso-8859-1')?></strong></a> 
        </div>
        <?
		}
		?>
        
        
        </div>
           
            
        <div class="row">
               <?	

			$vlpadre= buscarpadre2($vlpadre, -5);		
			
			$vlpermiso = permisocarpeta( $_SESSION["vg_iduc"] , $vlpadre);

	if ($vlpermiso == 1){
			
		for ($id=0; $id<$totald; $id++)
		{
			if ($fondo == "background-color: #F5F5F5") $fondo = "background-color: white;";
			else $fondo = "background-color: #F5F5F5";
			$datosd = $dbcond->fetch_array($resultadod);
			$vlicono = "documento.png";
        if (strtoupper(substr($datosd["nombre"], -3)) == "PDF"){
			$vlicono = "pdf.png";
		}
		?>
        <section>
        <div class="col-md-8 " style="<?=$fondo?>">
        <a href="../HapAdmcom/docs/<?=$datosd["adjunto"]?>" target="_blank" ><img src="images/<?=$vlicono?>" width="25"  alt=""/></a> 
       	  <a href="<?=$vgpathdocsweb.$datosd["adjunto"]?>" target="_blank"><strong><? print htmlentities($datosd["nombre"], ENT_COMPAT, 'iso-8859-1')?></strong></a> 
        </div>
         <?
        if (strtoupper(substr($datosd["nombre"], -3)) == "PDF"){
		
			?>	
        <div  class="col-md-2 " style="<?=$fondo?> "><img src="images/palitoblanco.png" height="33" alt=""/><a href="<?=$vgpathdocsweb.$datosd["adjunto"]?>"  target="_blank"><i class="fa fa-eye"> Preview</i></a></div>	
        <div  class="col-md-2 " style="<?=$fondo?> "><img src="images/palitoblanco.png" height="33" alt=""/><a href="<?=$vgpathdocsweb.$datosd["adjunto"]?>"  download><i class="fa fa-download"> Download</i></a></div>
       <?
		}else{
			?>
			
        <div  class="col-md-2 " style="<?=$fondo?> "><img src="images/palitoblanco.png"  height="33"  alt=""/>&nbsp;</div>
        <div  class="col-md-2 " style="<?=$fondo?> "><img src="images/palitoblanco.png"  height="33"  alt=""/><a href="<?=$vgpathdocsweb.$datosd["adjunto"]?>" target="_blank" download><i class="fa fa-download"> Download</i></a></div>
			<?
		}
			?>
        </section>
			<?
			
			
			
		}
			
		}else{
		?>
	<section>
        <div class="col-md-10 " style="<?=$fondo?>">

                            <div class="alert alert-block alert-danger fade in">
                                <button type="button" class="close close-sm" data-dismiss="alert">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>Alerta!</strong> No posee permisos para ver el contenido de esta carpeta.
                            </div>
        </div>
	</section>
		
		<?
		
		
	}	/*
			
			
			*/
		?>
        
        </div>               
       
			<div class="row">&nbsp;</div>  
         
	<div class="row">
	</div>
         
        <div  class="sticky-footer">
        <div class="row">
        
			
        <div class="col-md-6">
        <section class="panel panel-primary"> 
                                <div class="panel-heading">
                            <h3 class="panel-title">Subir Archivo</h3>
                        </div>
                                <div class="panel-body">
                               
                                       
                                               
                <form action="subirdocm.php" method="post" enctype="multipart/form-data" name="subedoc">
                    <input type="hidden" name="idc" value="<?=$vlidc?>">
                    <input type="hidden" name="padre" value="<?=$vlpadre?>">
                   <div class="form-group">
                                    <label for="vltotal" class="control-label col-lg-2">Archivo</label>
                                    <div class="col-md-4">
                                        <input name="documento[]" type="file" multiple required class="form-control" id="documento">
                                    </div>
                                    
                                </div>
                     <div class="form-group">           
                    <button class="btn btn-primary" type="submit">Subir</button>
					</div>
                </form>
            </div>
       </section>
        </div>
      
                <div class="col-md-6">
        <section class="panel panel-primary"> 
                                <div class="panel-heading">
                            <h3 class="panel-title">Crear Carpeta</h3>
                        </div>
                                <div class="panel-body">
                                   
                <form action="crearcarpeta.php" method="post"  name="creac">
                    <input type="hidden" name="idc" value="<?=$vlidc?>">
                    <input type="hidden" name="padre" value="<?=$vlpadre?>">
                   <div class="form-group">
                                    <label for="vltotal" class="control-label col-lg-2">Nombre</label>
                                    <div class="col-md-4">
                                        <input type="text" name="nombre" id="nombre" required class="form-control">
                                    </div>
                                    
                                </div>
                   
                     <div class="form-group">           
                    <button class="btn btn-primary" type="submit">Crear</button>
					</div>
                </form>
            </div>
       </section>
        </div>
        
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

                <form name="ffolder" action="navegam.php" method="get">
                    <input type="hidden" name="idc" value="<?=$vlidc?>">
                    <input type="hidden" name="padre" value="">
                    <input type="hidden" name="padreactual" value="<?=$vlpadre?>">
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
