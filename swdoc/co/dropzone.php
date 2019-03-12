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

  <title>Dropzone</title>

  <!--dropzone css-->
  <link href="js/dropzone/css/dropzone.css" rel="stylesheet"/>

  <!--common css-->
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

        <!--search start-->
        <form class="searchform" action="index.html" method="post">
            <input type="text" class="form-control" name="keyword" placeholder="Search here..." />
        </form>
        <!--search end-->

        <!--notification menu start -->
        <? include("menusup.php")?>
        <!--notification menu end -->

        </div>
        <!-- header section end-->

        <!-- page heading start-->
        <div class="page-heading">
            <h3>
                Dropzone File Upload
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Forms</a>
                </li>
                <li class="active">Dropzone File Upload</li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">

            <section class="panel">
                <header class="panel-heading">
                    Dropzone File Upload
                    <span class="tools pull-right">
                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                        <a class="fa fa-times" href="javascript:;"></a>
                     </span>
                </header>
                <div class="panel-body">
                    <form action="js/dropzone/upload.php" class="dropzone" id="my-awesome-dropzone"></form>
                </div>
            </section>

        </div>
        <!--body wrapper end-->

        <!--footer section start-->
        <footer class="sticky-footer"> 2014 &copy; HAP Consulting.net
        </footer>
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

<!--dropzone-->
<script src="js/dropzone/dropzone.js"></script>


<!--common scripts for all pages-->
<script src="js/scripts.js"></script>

</body>
</html>
