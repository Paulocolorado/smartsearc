<?php
// calc an offset of 24 hours
  $offset = 0;	
// calc the string in GMT not localtime and add the offset
  $expire = "Expires: " . gmdate("D, d M Y H:i:s", time() - 186400) . " GMT";
//output the HTTP header
  Header($expire);

include "dbclass.php";
include "validasession.php";
session_start();

$dbcon2 = new connection($ip, $login, $pass, $db, $query);
header("Content-Type: text/html;charset=utf-8");
$query2 = "SELECT * FROM productos  WHERE idprod like '%".$_GET["idprod"]."%' ";
$dbcon2->query($query2);
$total2 = $dbcon2->num_rows($resultado2);
if ($total2 > 0) {
	$datos2 = $dbcon2->fetch_array($resultado2);
}

$dbcon = new connection($ip, $login, $pass, $db, $query);
$query = "select idacat,categoria from categorias ";
$dbcon->query($query);
$total = $dbcon->num_rows($resultado);

if ($msg == 2) $msgtxt="El producto se actualiz&oacute; con Exito";
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
                Editar Producto
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Productos</a>
                </li>
                <li class="active"> Editar Producto </li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
          <div class="row">
          <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">Ingrese la informacioin solicitada.</header>
                        <div class="panel-body">
                            <div class="form">
                                <form action="actproducto.php" method="post" enctype="multipart/form-data" class="cmxform form-horizontal adminex-form" id="guardarp">
                                <div class="form-group ">
                                    <label for="categoria" class="control-label col-lg-2">Categoria</label>
                                        <div class="col-lg-10">
                                        
                                        <div class="selector-pais">
<select name="categoria" required class="form-control input-sm m-bot15" id="categoria">
                                                <option value="" >Select</option>
                           <?php
		for ($i=0; $i<$total; $i++)
		{
			$datos = $dbcon->fetch_array($resultado);
			if ($datos["idacat"]==$datos2["idcategoria"]) $selcate = "selected";
			else  $selcate = "";
		?>
              <option value="<?php echo $datos["idacat"]?>" <?php echo $selcate?>><?php echo htmlXentities($datos["categoria"])?></option>
              <?php
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
<select name="subcategoria" class="form-control input-sm m-bot15" id="subcategoria" required>
	               <?php
	
$query = "select idsubcat,nombre from subcategorias where idsubcat = ".$datos2["idsubcat"];
$dbcon->query($query);
$total = $dbcon->num_rows($resultado);
		for ($i=0; $i<$total; $i++)
		{
			$datos = $dbcon->fetch_array($resultado);
		?>
              <option value="<?php echo $datos["idsubcat"]?>" selected><?php echo htmlXentities($datos["nombre"])?></option>
              <?php
	  }
	  ?>
</select>
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
                                            <input name="nombre" type="text" required class=" form-control" id="nombre" value="<?php echo htmlentities($datos2["nombre"], ENT_COMPAT, 'iso-8859-1')?>" />
                                        </div>
                                  </div>
                                  <div class="form-group ">
                                        <label for="codigo" class="control-label col-lg-2">Código</label>
                                        <div class="col-lg-10">
                                            <input name="codigo" type="text" class=" form-control" id="codigo" value="<?php echo $datos2["codigo"]?>" />
                                        </div>
                                    </div>
                                  <div class="form-group ">
                                        <label for="codigo" class="control-label col-lg-2">Descripci&oacute;n</label>
                                        <div class="col-lg-10">
                                            <textarea name="descripcion" rows="6" required class="form-control"><?php echo htmlentities($datos2["descripcion"], ENT_COMPAT, 'iso-8859-1')?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="codigo" class="control-label col-lg-2">Alto</label>
                                        <div class="col-lg-2">
                                            <input name="alto" type="text" required class=" form-control" id="alto"  value="<?php echo $datos2["alto"]?>" />
                                            </div>
                                    <label for="vlbase" class="control-label col-lg-2">Ancho</label>
                                            <div class="col-lg-2">
                                              <input name="ancho" type="text" required class=" form-control" id="ancho"  value="<?php echo $datos2["ancho"]?>" />
                                            </div>
                                    </div>
                                  <div class="form-group ">
                                    <label for="vlbase" class="control-label col-lg-2">Valor Base</label>
                                        <div class="col-lg-2">
                                            <input name="vlbase" type="text" required class=" form-control" id="vlbase" value="<?php echo $datos2["vlbase"]?>" />
                                        </div>
                                    <label for="vltotal" class="control-label col-lg-2">IVA</label>
                                        <div class="col-lg-2">
                                            <input name="vliva" type="text" required class=" form-control" id="vliva" value="<?php echo $datos2["vliva"]?>" />
                                        </div>
                                    <label for="vltotal" class="control-label col-lg-2">Valor Total</label>
                                        <div class="col-lg-2">
                                            <input name="vltotal" type="text" required class=" form-control" id="vltotal" value="<?php echo $datos2["vltotal"]?>" />
                                        </div>
                                  </div>

							
                               
                               <div class="form-group">
                                    <label for="vltotal" class="control-label col-lg-2">Activo</label>
                                    <div class="col-md-3"><?php
                                    if ($datos2["activo"]==1) $seldestacado ="checked";
									else $seldestacado ="";
									?>
                                        <input  type="radio"  name="activo" value="1" <?php echo $seldestacado?>>
                                        <label>Si. </label><?php
                                    if ($datos2["activo"]==0) $seldestacado ="checked";
									else $seldestacado ="";
									?>
                                        <input  name="activo"  type="radio" value="0" <?php echo $seldestacado?>>
                                        <label>No. </label>
                                       
                                  </div>
                                  </div>
                                  
                                  
                                  <?php
											$dbcon_lista = new connection($ip, $login, $pass, $db, $query);
											   $txtli1="";
											   $txtli2="";
									if ($datos2["lista1"] == "-1"){
										
										$vll1hidden = "none";
										$vlchkno1 = "checked";
										$vlchksi1 = "";
									
									}else{
											$query_lista = "select valor from contenidolista where idprod = ".$_GET["idprod"]." and idlista = 1 order by valor";
										
											$dbcon_lista->query($query_lista);
										    $total_lista = $dbcon_lista->num_rows($resultado_lista);
											for ($i_lista=0; $i_lista<$total_lista; $i_lista++)
											{
												$datos_lista = $dbcon_lista->fetch_array($resultado_lista);
												$txtli1 .= $datos_lista["valor"]."\r";
											}
										$vll1hidden = "block";
										$vlchkno1 = "";
										$vlchksi1 = "checked";
									}
									if ($datos2["lista2"] == "-1"){
										
										$vll2hidden = "none";
										$vlchkno2 = "checked";
										$vlchksi2 = "";
									}else{
											$query_lista = "select valor from contenidolista where idprod = ".$_GET["idprod"]." and idlista = 2 order by valor";
										
											$dbcon_lista->query($query_lista);
										    $total_lista = $dbcon_lista->num_rows($resultado_lista);
											for ($i_lista=0; $i_lista<$total_lista; $i_lista++)
											{
												$datos_lista = $dbcon_lista->fetch_array($resultado_lista);
												$txtli2 .= $datos_lista["valor"]."\r";
											}
										$vll2hidden = "block";
										$vlchkno2 = "";
										$vlchksi2 = "checked";
									}
									?>
                                  
                                   
                                   
                                   
                                    <div class="form-group">
                                    <label for="vltotal" class="control-label col-lg-2">Lista 1</label>
                                    <div class="col-md-2" >
                                        <input  type="radio"  name="lista1" value="1" <?php echo $vlchksi1?>  onClick="document.getElementById('li1').style.display = 'block';">
                                        <label>Si. </label>
                                        <input  name="lista1"  type="radio" value="0" <?php echo $vlchkno1?> onClick="document.getElementById('li1').style.display = 'none'; document.getElementById('l1tit').value ='-1'; document.getElementById('l1txt').value ='';">
                                        <label>No. </label>
                                       
                                  </div>
                                  </div>
                                  
									  <div id="li1" style="display: <?php echo $vll1hidden?>">
                                  <div class="form-group">
                                    <label for="vltotal" class="control-label col-lg-2">Titulo</label>
										   <div class="col-md-2" >
												<input class=" form-control" id="l1tit" name="l1tit" type="text" value="<?php echo htmlentities($datos2["lista1"], ENT_COMPAT, 'iso-8859-1')?>" />
										   </div>
										   
                                    <label for="vltotal" class="control-label col-md-1">Contenido</label>
										   <div class="col-md-2" >
												<textarea name="l1txt" class="col-md-2 form-control" rows="10" id="l1txt"><?php echo $txtli1?></textarea>
										   </div>
									  </div>
									</div>
                                  
                                  
                                  <div class="form-group">
                                    <label for="vltotal" class="control-label col-lg-2">Lista 2</label>
                                    <div class="col-md-2" >
                                        <input  type="radio"  name="lista2" value="1" <?php echo $vlchksi2?>  onClick="document.getElementById('li2').style.display = 'block';">
                                        <label>Si. </label>
                                        <input  name="lista2"  type="radio" value="0" <?php echo $vlchkno2?> onClick="document.getElementById('li2').style.display = 'none'; document.getElementById('l2tit').value ='-1'; document.getElementById('l2txt').value ='';">
                                        <label>No. </label>
                                       
                                  </div>
                                  </div>
                                  
									  <div id="li2" style="display: <?php echo $vll2hidden?>">
                                  <div class="form-group">
                                    <label for="vltotal" class="control-label col-lg-2">Titulo</label>
										   <div class="col-md-2" >
												<input class=" form-control" id="l2tit" name="l2tit" type="text" value="<?php echo htmlentities($datos2["lista2"], ENT_COMPAT, 'iso-8859-1')?>" />
										   </div>
										   
                                    <label for="vltotal" class="control-label col-md-1">Contenido</label>
										   <div class="col-md-2" >
												<textarea name="l2txt" class="col-md-2 form-control" rows="10" id="l2txt"><?php echo $txtli2?></textarea>
										   </div>
									  </div>
									</div>
                                  
                                   
                                  <div class="form-group">
                                    
                                    <label for="vltotal" class="control-label col-lg-2">Destacado</label>
                                    <div class="col-md-4"><?php
                                    if ($datos2["destacado"]==1) $seldestacado ="checked";
									else $seldestacado ="";
									?>
                                        <input  type="radio"  name="destacado" value="1" <?php echo $seldestacado?>>
                                        <label>Si. </label>
                                      <input name="idprod" type="hidden" id="idprod" value="<?php echo $_GET["idprod"]?>">
                                    <?php
                                    if ($datos2["destacado"]==0) $seldestacado ="checked";
									else $seldestacado ="";
									?>
                                        <input  name="destacado"  type="radio" value="0" <?php echo $seldestacado?>>
                                        <label>No. </label>
                                       
                                  </div>
                                </div>
                                  <div class="form-group">
                                    
                                    <label for="vltotal" class="control-label col-lg-2">Producto del mes</label>
                                    <div class="col-md-4"><?php
                                    if ($datos2["pdelmes"]==1) $seldestacado ="checked";
									else $seldestacado ="";
									?>
                                        <input  type="radio"  name="pdelmes" value="1" <?php echo $seldestacado?>>
                                        <label>Si. </label>
                                    <?php
                                    if ($datos2["pdelmes"]==0) $seldestacado ="checked";
									else $seldestacado ="";
									?>
                                        <input  name="pdelmes"  type="radio" value="0" <?php echo $seldestacado?>>
                                        <label>No. </label>
                                       
                                  </div>
                                </div>
                                  
                                  	<div class="form-group">
                                    <label for="vltotal" class="control-label col-lg-2">Imagen Principal</label>
                                    <div class="col-md-4">
                                        <input name="imagen" type="file" class="default" id="imagen" />
                                    </div>
                                    
                                </div>
                                  
                                  
                                  <div class="form-group ">
                                    <label for="vlbase" class="control-label col-lg-2">Imagen 2</label>
                                        <div class="col-lg-2">
                                            <input name="imagen2" type="file" class="default" id="imagen2" />
                                        </div>
                                    
                                  </div>
								
                                  <div class="form-group ">
                                    <label for="vlbase" class="control-label col-lg-2">Borrar Imagen 2</label>
                                        <div class="col-lg-2">
                                           <input type="checkbox" value="1" name="brrimg2">
                                        </div>
                                    
                                  </div>
                                  <div class="form-group ">
                                    
                                    <label for="vltotal" class="control-label col-lg-2">Imagen 3</label>
                                        <div class="col-lg-2">
                                            <input name="imagen3" type="file" class="default" id="imagen3" />
                                        </div>
                                    
                                  </div>
                                  <div class="form-group ">
                                    <label for="vlbase" class="control-label col-lg-2">Borrar Imagen 3</label>
                                        <div class="col-lg-2">
                                           <input type="checkbox" value="1" name="brrimg3">
                                        </div>
                                    
                                  </div>
                                  
                                <div class="form-group">
                                    <label for="vltotal" class="control-label col-lg-2">Imagen Principal</label>
                                    <div class="col-md-3">
                                    <img src="../co/img/product<?php echo $datos2["imagen"]?>" height="150" ></div>
                                    <label for="vltotal" class="control-label col-lg-2">Imagen 2 </label>
                                    <div class="col-md-3">
                                    <?php
									$vlimg2 = "/noimg.png";
									$vlimg3 = "/noimg.png";
									$vlimg4 = "/noimg.png";
											   
								if ($datos2["img2"] != "" ) $vlimg2=$datos2["img2"];

								if ($datos2["img3"] != "" ) $vlimg3=$datos2["img3"];

								if ($datos2["img4"] != "" ) $vlimg4=$datos2["img4"];
											   
											
											   
									?>
                                    <img src="../co/img/product<?php echo $vlimg2?>" height="150" ></div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="vltotal" class="control-label col-lg-2">Imagen 3</label>
                                    <div class="col-md-3">
                                    <img src="../co/img/product<?php echo $vlimg3?>" height="150" ></div>
                                </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Guardar</button>
                                            <button class="btn btn-default" type="button" onClick="history.back();">Cancel</button>
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


<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
<!--common scripts for all pages-->
<script src="js/scripts.js"></script>

</body>
</html>
