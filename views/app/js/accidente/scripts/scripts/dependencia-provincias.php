<?php
include("../clases/class.mysql.php");
include("../clases/class.combos.php");
$provincias = new selects();
$provincias->code = $_GET["code"];
$provincias = $provincias->cargarProvincias();
foreach($provincias as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}
?>