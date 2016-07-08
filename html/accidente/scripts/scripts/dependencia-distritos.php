<?php
include("../clases/class.mysql.php");
include("../clases/class.combos.php");
$distritos = new selects();
$distritos->code = $_GET["code"];
$distritos = $distritos->cargarDistritos();
foreach($distritos as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}
?>