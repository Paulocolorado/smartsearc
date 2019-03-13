<?php

include "../dbclass.php";
include "../funciones.php";


print "idcliente: ".$_POST["idcliente"];



function listar_directorios_ruta($ruta, $vlpadre){ 
   // abrir un directorio y listarlo recursivo 
   if (is_dir($ruta)) { 
      if ($dh = opendir($ruta)) { 
		$tmstmp = time();
		  $rutabase = "../docs/".$_POST["idcliente"]."/";
		mkdir($rutabase, 0777); 
		  
         while (($file = readdir($dh)) !== false) { 
            //esta l�nea la utilizar�amos si queremos listar todo lo que hay en el directorio 
            //mostrar�a tanto archivos como directorios 
            //echo "<br>Nombre de archivo: $file : Es un: " . filetype($ruta . $file); 
            if (is_dir($ruta . $file) && $file!="." && $file!=".."){ 
               //solo si el archivo es un directorio, distinto que "." y ".." 
               echo "<br>Directorio: ".$ruta." --".$file; 
				$carpeta = creacarpetacliente($_POST["idcliente"], substr($ruta,2).$file, $vlpadre );
				//print "<br>EL Id de carpeta es: ".$carpeta;
				//exit;
				mkdir($rutabase.$carpeta, 0777);
               listar_directorios_ruta($ruta . $file . "/", $carpeta); 
            } elseif($file!="." && $file!=".." && $file!="cmasivo.php" && $file!="proceso.php"){
			$arrfile =split("/",substr($ruta,1).$file );
				$totarr = count($arrfile)-1;

				$tamano= filesize($rutabase.$vlpadre."/".$arrfile[$totarr]);
				copy($ruta.$file , $rutabase.$vlpadre."/".$arrfile[$totarr] );
				 echo "<br>Copiar y subir a BD Archivo: $ruta$file"." -- ".$rutabase.$vlpadre."/".$arrfile[$totarr];
				$pathtofile = $_POST["idcliente"]."/".$vlpadre."/".$arrfile[$totarr];
				insertaarchivobd($_POST["idcliente"], substr($ruta,1).$file, $pathtofile, $vlpadre, $tamano );
				
			}
         } 
      closedir($dh); 
      } 
   }else 
      echo "<br>No es ruta valida"; 
}

listar_directorios_ruta("./", 0);

?>