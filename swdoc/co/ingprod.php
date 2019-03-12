<?
// calc an offset of 24 hours
header('Content-Type: text/html; charset=iso-8859-1');
  $offset = 0;	
// calc the string in GMT not localtime and add the offset
  $expire = "Expires: " . gmdate("D, d M Y H:i:s", time() - 186400) . " GMT";
//output the HTTP header
  Header($expire);

include "dbclass.php";
include "validasession.php";
session_start();

$dbcon = new connection($ip, $login, $pass, $db, $query);
$query = "select idacat,categoria from categorias ";
$dbcon->query($query);
$total = $dbcon->num_rows($resultado);

if ($msg == 2) $msgtxt="El producto se actualiz&oacute; con �xito";
else $msgtxt = ""; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content=""> <meta name="author" content="">
  <link rel="shortcut icon" href="#" type="image/png">
  
  
  
    

    <!--file upload-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-fileupload.min.css" />


  <title>SEARCH</title>

  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
<script type="text/javascript" src="jquery.min.js"></script>
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
                Ingresar Producto
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Productos</a>
                </li>
                <li class="active"> Nuevo Producto </li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
          <div class="row">
          <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">Ingrese la informacion solicitada.</header>
                        <div class="panel-body">
                            <div class="form">
                                <form action="guardaproducto.php" method="post" enctype="multipart/form-data" class="cmxform form-horizontal adminex-form" id="guardarp">
                                <div class="form-group ">
                                    <label for="categoria" class="control-label col-lg-2">Categor&iacute;a</label>
                                        <div class="col-lg-10">
                                        <div class="selector-pais">
<select name="categoria" class="form-control input-sm m-bot15" id="categoria" required>
                                                <option value="">Select</option>
                           <?
		for ($i=0; $i<$total; $i++)
		{
			$datos = $dbcon->fetch_array($resultado);
		?>
              <option value="<?=$datos["idacat"]?>" >
              <?=$datos["categoria"]?>
              </option>
              <?
	  }
	  ?>
                                            </select>
										  </div>
                                        </div>
                                  </div>
                                  
                                  
                                  
                                  <div class="form-group ">
                                    <label for="subcategoria" class="control-label col-lg-2">Sub Categor&iacute;a</label>
                                        <div class="col-lg-10">
<div class="sel-ciudad">                                        
<select name="subcategoria" class="form-control input-sm m-bot15" id="subcategoria" required></select>
                                          <script type="text/javascript">
                $(document).ready(function() {
                    $(".selector-pais select").change(function() {
                        var form_data = {
                                is_ajax: 1,
                                categoria: $(".selector-pais select").val()
                        };
                        $.ajax({
                                type: "POST",
                                url: "subcategorias.php",
                                data: form_data,
                                success: function(response)
                                {
                                    $('.sel-ciudad select').html(response).fadeIn();
                                }
                        });
                    });

                });
            </script>
										  </div>
                                        </div>
                                  </div>
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  <div class="form-group ">
                                    <label for="nombre" class="control-label col-lg-2">Nombre</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="nombre" name="nombre" type="text" required />
                                        </div>
                                  </div>
                                  <div class="form-group ">
                                        <label for="codigo" class="control-label col-lg-2">C&oacute;digo</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="codigo" name="codigo" type="text" />
                                        </div>
                                    </div>
                                  <div class="form-group ">
                                    <label for="codigo" class="control-label col-lg-2">Descripci&oacute;n Completa</label>
                                        <div class="col-lg-10">
                                            <textarea rows="6" class="form-control form-control ckeditor" name="descripcion"></textarea>
                                        </div>
                                    </div>
                                    <?
									/*
                                    <div class="form-group ">
                                        <label for="codigo" class="control-label col-lg-2">Cantidad Maxima a solicitar</label>
                                        <div class="col-lg-2">
                                            <input class=" form-control" id="qtymax" name="qtymax" type="number" size="5"/>
                                        </div>
                                    </div>
                                    */
                                    ?>
                                    
                                    <div class="form-group ">
                                        <label for="codigo" class="control-label col-lg-2">Alto</label>
                                        <div class="col-lg-2">
                                            <input name="alto" type="text" required class=" form-control" id="alto"  value="" />
                                            </div>
                                    <label for="vlbase" class="control-label col-lg-2">Ancho</label>
                                            <div class="col-lg-2">
                                              <input name="ancho" type="text" required class=" form-control" id="ancho"  value="" />
                                            </div>
                                    </div>
                                    
                                  <div class="form-group ">
                                    <label for="vlbase" class="control-label col-lg-2">Valor Base</label>
                                        <div class="col-lg-2">
                                            <input class=" form-control" id="vlbase" name="vlbase" type="text" />
                                        </div>
                                    <label for="vltotal" class="control-label col-lg-2">IVA</label>
                                        <div class="col-lg-2">
                                            <input name="vliva" type="text" class=" form-control" id="vliva" value="0" />
                                        </div>
                                    <label for="vltotal" class="control-label col-lg-2">Valor Total</label>
                                        <div class="col-lg-2">
                                            <input name="vltotal" type="text" class=" form-control" id="vltotal"   />
                                        </div>
                                  </div>

								<div class="form-group">
                                    <label for="vltotal" class="control-label col-lg-2">Imagen</label>
                                    <div class="col-md-3">
                                        <input name="imagen" type="file" class="default" id="imagen" />
                                    </div>
                                    
                                </div>
                               
								<div class="form-group">
                                    <label for="vltotal" class="control-label col-lg-2">Destacado</label>
                                    <div class="col-md-3">
                                        <input  type="radio"  name="destacado" value="1">
                                        <label>Si. </label>
                                        <input  name="destacado"  type="radio" value="0" checked>
                                        <label>No. </label>
                                       
                                  </div>
                                  </div>
								
                                    <div class="form-group">
                                    <label for="vltotal" class="control-label col-lg-2">Activo</label>
                                    <div class="col-md-3">
                                        <input  type="radio"  name="activo" value="1" checked>
                                        <label>Si. </label>
                                        <input  name="activo"  type="radio" value="0">
                                        <label>No. </label>
                                       
                                  </div>
                                  </div>

                                   
                                   
                                   
                                   
                                    <div class="form-group">
                                    <label for="vltotal" class="control-label col-lg-2">Lista 1</label>
                                    <div class="col-md-2" >
                                        <input  type="radio"  name="lista1" value="1"  onClick="document.getElementById('li1').style.display = 'block';">
                                        <label>Si. </label>
                                        <input  name="lista1"  type="radio" value="0" checked onClick="document.getElementById('li1').style.display = 'none'; document.getElementById('l1tit').value ='-1'; document.getElementById('l1txt').value ='';">
                                        <label>No. </label>
                                       
                                  </div>
                                  </div>
                                  
									  <div id="li1" style="display: none">
                                  <div class="form-group">
                                    <label for="vltotal" class="control-label col-lg-2">Titulo</label>
										   <div class="col-md-2" >
												<input class=" form-control" id="l1tit" name="l1tit" type="text" value="-1" />
										   </div>
										   
                                    <label for="vltotal" class="control-label col-md-1">Contenido</label>
										   <div class="col-md-2" >
												<textarea name="l1txt" class="col-md-2 form-control" rows="10" id="l1txt"></textarea>
										   </div>
									  </div>
									</div>
                                  
                                  
                                  <div class="form-group">
                                    <label for="vltotal" class="control-label col-lg-2">Lista 2</label>
                                    <div class="col-md-2" >
                                        <input  type="radio"  name="lista2" value="1"  onClick="document.getElementById('li2').style.display = 'block';">
                                        <label>Si. </label>
                                        <input  name="lista2"  type="radio" value="0" checked onClick="document.getElementById('li2').style.display = 'none'; document.getElementById('l2tit').value ='-1'; document.getElementById('l2txt').value ='';">
                                        <label>No. </label>
                                       
                                  </div>
                                  </div>
                                  
									  <div id="li2" style="display: none">
                                  <div class="form-group">
                                    <label for="vltotal" class="control-label col-lg-2">Titulo</label>
										   <div class="col-md-2" >
												<input class=" form-control" id="l2tit" name="l2tit" type="text" value="-1" />
										   </div>
										   
                                    <label for="vltotal" class="control-label col-md-1">Contenido</label>
										   <div class="col-md-2" >
												<textarea name="l2txt" class="col-md-2 form-control" rows="10" id="l2txt"></textarea>
										   </div>
									  </div>
									</div>
                                  
                                   
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Guardar</button>
                                            <button class="btn btn-default" type="button">Cancelar</button>
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


<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
<!--common scripts for all pages-->
<script src="js/scripts.js"></script>

</body>
</html>
