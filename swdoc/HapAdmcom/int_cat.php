<?php
include "dbclass.php";
include "validasession.php";
session_start();
if (!$id_cliente) $id_cliente = "-1";

$dbcon = new connection($ip, $login, $pass, $db, $query);

$query = "SELECT * FROM categorias order by idacat";
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
  
<script language="JavaScript">
function nuevacat(){
forma = document.signupForm2;
forma2 = document.ncat;
 forma2.submit();
}

</script>
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
               Category
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Categories</a>
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
            <th>Category</th>
            <th>Optios</th>
        </tr>
        </thead>
        <tbody>
           
		<?php
		for ($i=0; $i<$total; $i++)
		{
			$datos = $dbcon->fetch_array($resultado);
		?>
        <tr >
          <td ><?php print $datos["categoria"]?></td>
          <td ><a href="editarcat.php?idc=<?php echo $datos["idacat"]?>" >Edit</a>&nbsp;&nbsp;-&nbsp;&nbsp;<a href="int_subcat.php?idc=<?php echo $datos["idacat"]?>&nom=<?php echo $datos["categoria"]?>" >Sub Cat </a></td>
        </tr>
        <?php
		}
		?>
                
        </tbody>
        </table>
        </div>
            
      </div>
      
      
      <div class="form-group">
      <div class="col-lg-offset-2 col-lg-12">
                        <button class="btn btn-primary" type="button" onClick="nuevacat();">Add Category</button>
                    </div>
                </div>
    </form>
    
      
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

<!--dynamic table-->
<script type="text/javascript" language="javascript" src="js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/data-tables/DT_bootstrap.js"></script>
<!--dynamic table initialization -->
<script src="js/dynamic_table_init.js"></script>

<!--common scripts for all pages-->
<script src="js/scripts.js"></script>

               
 
<form name="ncat" method="post" action="nuevacat.php">
  <input name="id_cliente" type="hidden" id="id_cliente">
  <input name="nom_cliente" type="hidden" id="nom_cliente">
</form>
</body>
</html>
