<div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="inicio.php"><img src="images/logo.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="inicio.php"><img src="images/logo_icon.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->


        <div class="left-side-inner">

            <!-- visible to small devices only -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="images/photos/user-avatar.png" class="media-object">
                    <div class="media-body">
                        <h4><a href="#"><?php echo $_SESSION["vg_nombre"]?></a></h4>
                        <span>"La Pétala."</span>
                    </div>
                </div>

                <h5 class="left-nav-title">Cuenta</h5>
                <ul class="nav nav-pills nav-stacked custom-nav">
                    <li><a href="cambiar_clave.php?mn=8"><i class="fa fa-cog"></i> <span>Cambiar Clave</span></a></li>
                    <li><a href="salir.php"><i class="fa fa-sign-out"></i> <span>Salir</span></a></li>
                </ul>
            </div>
          
            <!--sidebar nav start--><?php
				if ($mn == 1) $lnkselmenu = "class=\"active\"";
				else $lnkselmenu = "";
				?>  
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li<?php print(" ".$lnkselmenu)?>>
                
                
                
                <a href="inicio.php?mn=1"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
                <?php
				if ($mn == 2) $lnkselmenu = "class=\"active\"";
				else $lnkselmenu = "";
				?>
                <li <?php print(" ".$lnkselmenu)?>><a href="buscprod.php?mn=2"><i class="fa fa-search"></i> <span>Buscar Documento</span></a></li>
			
 				<?php
					menubase($_SESSION["vg_idc"]);
				
				?>
 				
 				<?php
				if ($mn == 8) $lnkselmenu = "class=\"active\"";
				else $lnkselmenu = "";
				?>
                <li <?php print(" ".$lnkselmenu)?>><a href="cambiar_clave.php?mn=8"><i class="fa fa-key"></i> <span>Cambiar clave</span></a></li>
                
                <li><a href="salir.php"><i class="fa fa-sign-in"></i> <span>Salir</span></a></li>

            </ul>
            <!--sidebar nav end-->
            

        </div>
        	
    </div>