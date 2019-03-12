	 <?

include "dbclass.php";
session_start();

$dbcon = new connection($ip, $login, $pass, $db, $query);
$query = "select * from subcategorias where idcat = ".$_REQUEST["categoria"]." order by nombre";;
//print $query;
$dbcon->query($query);
$total = $dbcon->num_rows($resultado);
echo '<option value="">Seleccione una subcategoria</option>';
for ($i=0; $i<$total; $i++)
{
$datos = $dbcon->fetch_array($resultado);
?>
  <option value="<?=$datos["idsubcat"]?>" >
  <?=htmlentities($datos["nombre"], ENT_COMPAT, 'iso-8859-1')?>
  </option>
  <?
}
?>