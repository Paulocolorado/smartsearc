<?php

$dbconft = new connection();



function ftree($padreactual,$idc,$dbconft)
{
    
$queryft = "select idcarpeta, nombre, padre from carpetas where idcliente = ".$idc." and idcarpeta = ".$padreactual;
	//print $queryft ;
	//exit;
$dbconft->query($queryft);
$totalft = $dbconft->num_rows($resultadoft);
$datosft = $dbconft->fetch_array($resultadoft);
//print $login."<br>";
echo($datosft["nombre"].">>".$datosft["padre"]);
 
	//print "<br>".$queryft;
	//exit;
    if($datosft["padre"]!=0)
    {
        # llamamos nuevamente esta misma función pasando el nuevo padre hast allegar a la raiz
        funcionRecursiva($datosft["padre"], $idc);
    }
}
 
# iniciamos la función recursiva...
//funcionRecursiva(10);




function conexion(){
    $conexion = mysqli_connect($ip,$login, $pass) or die ('No se ha podido conectar al servidor');
    mysqli_select_db($db) or die ('No se pudo seleccionar la base de datos');
}
 
function menu($idc,$id){
	//print $idc."--".$id;
    $url=""; //este es la url_raiz, ideal cuando tu web esta en otros niveles de carpetas
	//print $id;
    function cargarmenu($idc,$id)
        {
        $query="SELECT nombre,padre,idcarpeta from carpetas where idcliente = ".$idc." and idcarpeta=".$id;
			//print $query;
        $result=mysqli_query($query);
 
        while($fila=mysqli_fetch_array($result)){
            $nombre=$fila['nombre']; 
            $url=$fila['idcarpeta'];
            
            $query2="select padre from carpetas where idcliente = ".$idc." and idcarpeta='".$fila['padre']."'";
            $result2=mysqli_query($query2);
 
            if ($fila2=mysqli_fetch_array($result2)){
                echo "<li><a href='navega.php?idc=".$idc."&padre=".$url."'>".htmlentities($nombre, ENT_COMPAT, 'iso-8859-1')."</a></li>"; 
                        cargarmenu($idc,$fila['padre']);
                      
            }else{
                echo "<li><a href='navega.php?idc=".$idc."&padre=".$url."'>".htmlentities($nombre, ENT_COMPAT, 'iso-8859-1')."</a></li>";
                }          
          }
               
       }
  
    cargarmenu($idc,$id);// Donde 0 es el Idseccion principal
}  


function menu7($dbcon, $idc,$id){
    //print $idc."--".$id;
    $url=""; //este es la url_raiz, ideal cuando tu web esta en otros niveles de carpetas
    //print $id;
    function cargarmenu7($dbcon, $idc,$id)
    {
        $query="SELECT nombre,padre,idcarpeta from carpetas where idcliente = ".$idc." and idcarpeta=".$id;
        print_r($query);        
        $result=mysqli_query($dbcon,$query);
        
        while($fila=mysqli_fetch_array($result)){
            $nombre=$fila['nombre'];
            $url=$fila['idcarpeta'];
            
            $query2="select padre from carpetas where idcliente = ".$idc." and idcarpeta='".$fila['padre']."'";
            $result2=mysqli_query($dbcon, $query2);
            
            if ($fila2=mysqli_fetch_array($result2)){
                echo "<li><a href='navega.php?idc=".$idc."&padre=".$url."'>".htmlentities($nombre, ENT_COMPAT, 'iso-8859-1')."</a></li>";
                cargarmenu7($dbcon, $idc,$fila['padre']);
                
            }else{
                echo "<li><a href='navega.php?idc=".$idc."&padre=".$url."'>".htmlentities($nombre, ENT_COMPAT, 'iso-8859-1')."</a></li>";
            }
        }
        
    }
    
    cargarmenu7($dbcon, $idc,$id);// Donde 0 es el Idseccion principal
}


function menubase($idc){
	//print $idc."--".$id;
    $url=""; //este es la url_raiz, ideal cuando tu web esta en otros niveles de carpetas
	//print $id;

        $query="SELECT nombre,padre,idcarpeta from carpetas where idcliente = ".$idc." and padre = 0";
			//print $query;
        $result=mysqli_query($query);
 
        while($fila=mysqli_fetch_array($result)){
            $nombre=$fila['nombre']; 
            $url=$fila['idcarpeta'];
			
			echo("<li ><a href='navegam.php?idc=".$idc."&padre=".$url."'><i class='fa fa-folder'></i> <span>".htmlentities($nombre, ENT_COMPAT, 'iso-8859-1'));
            
			echo("</span></a></li>");
          }
          
		
  
}  


function tamanodocs($idc){
	//print $idc."--".$id;
    $url=""; //este es la url_raiz, ideal cuando tu web esta en otros niveles de carpetas
	//print $id;

        $query="SELECT sum(tamano) tamanores from documentos where idcliente = ".$idc;
			//print $query;
        $result=mysqli_query($query);
        print($result);
        while($fila=mysqli_fetch_array($result)){
            $vgtam=$fila['tamanores']; 
          }
		return($vgtam);
  
}  


function tamanodocs7($dbcon, $idc){
    //print $idc."--".$id;
    $url=""; //este es la url_raiz, ideal cuando tu web esta en otros niveles de carpetas
    
    $consulta="SELECT sum(tamano) tamanores from documentos where idcliente = ".$idc;
    //print $query;
    $resultado = $dbcon->query($consulta);
    $fila = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
    if($fila){
        $vgtam=$fila['tamanores'];
    }
    return($vgtam);
    
}  

function permisocarpeta($idcli, $idcar){

        $query="SELECT permiso from usrpermiso where iducp = ".$idcli." and idcarpeta = ".$idcar;
			//print $query;
	//exit;
        $result=mysqli_query($query);
 		
	$vgpermiso = 0;
        while($fila=mysqli_fetch_array($result)){
            $vgpermiso=$fila['permiso']; 
          }
          
		return($vgpermiso);
  
}

function permisocarpeta7($dbcon, $idcli, $idcar){
    
    $query="SELECT permiso from usrpermiso where iducp = ".$idcli." and idcarpeta = ".$idcar;
    //print $query;
    //exit;
    $result=$dbcon->query($query);
    $fila = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $vgpermiso = 0;
    if($fila){
        $vgpermiso=$fila['permiso'];
    }
    
    return($vgpermiso);
    
}

function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}




function creacarpetacliente($idcliente, $nombrecarp, $padre){
	
	
        $query="insert into  carpetas (idcliente, nombre, padre) values (".$idcliente.", '".$nombrecarp."', ".$padre.")";
			print $query."<br>";

        $result=mysqli_query($query);
		$idcarpetita = mysqli_insert_id();
	
		return($idcarpetita);
}



function insertaarchivobd($idcliente, $nombrea, $adjuntoa, $padrea , $tamanoa){
 	$query="insert into  documentos (idcliente, nombre, adjunto, padre, tamano, fecha) values (".$idcliente.", '".$nombrea."', '".$adjuntoa."', ".$padrea.", '".$tamanoa."', now())";
			
        $result=mysqli_query($query);


}

?>