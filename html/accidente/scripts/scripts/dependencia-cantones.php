<?php
include("../clases/class.mysql.php");
include("../clases/class.combos.php");
$cantones = new selects();
$cantones->code = $_GET["code"];
$cantones = $cantones->cargarCantones();
foreach($cantones as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}
?>