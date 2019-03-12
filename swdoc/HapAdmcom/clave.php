<?
ERROR_REPORTING("E_ERROR");
$ip = "localhost"; //servidor mysql
$login = "haptrack_docu";
$pass = "*SmartApp135";
$db = "haptrack_docu";
 
$vg_title = "Tienda Virtual HAP eShop";
 $vgpathdocs = "/var/www/html/swdoc/HapAdmcom/docs/";
 $vgpathdocsweb = "https://www.smartsearch.com.co/swdoc/HapAdmcom/docs/";

$arrmeses[1] = "Enero";
$arrmeses[2] = "Febrero";
$arrmeses[3] = "Marzo";
$arrmeses[4] = "Abril";
$arrmeses[5] = "Mayo";
$arrmeses[6] = "Junio";
$arrmeses[7] = "Julio";
$arrmeses[8] = "Agosto";
$arrmeses[9] = "Septiembre";
$arrmeses[10] = "Octubre";
$arrmeses[11] = "Noviembre";
$arrmeses[12] = "Diciembre";


function htmlXspecialchars($string, $ent=ENT_COMPAT, $charset='ISO-8859-1') {
return htmlspecialchars($string, $ent, $charset);
}

function htmlXentities($string, $ent=ENT_COMPAT, $charset='ISO-8859-1') {
return htmlentities($string, $ent, $charset);
}

function htmlX_entity_decode($string, $ent=ENT_COMPAT, $charset='ISO-8859-1') {
return html_entity_decode($string, $ent, $charset);
}

?>
