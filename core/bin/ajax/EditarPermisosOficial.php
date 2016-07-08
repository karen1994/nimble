<?php
$db= new Conexion();

//Datos del Registro *********

$numConsecutivo=$_POST['numConsecutivo'];
$TipoLicenciaConducir= $_POST ['TipoLicenciaConducir'];
$VenciLicenciaConducir= $_POST ['VenciLicenciaConducir'];
$NumPermisoPortacionArmas= $_POST ['NumPermisoPortacionArmas'];
$VenciPermisoPortacionArmas= $_POST ['VenciPermisoPortacionArmas'];
$NumPermisoConducirCOSEVI= $_POST ['NumPermisoConducirCOSEVI'];
$VenciPermisoConducirCOSEVI= $_POST ['VenciPermisoConducirCOSEVI'];
$NumPermisoConducirMOPT= $_POST ['NumPermisoConducirMOPT'];
$VenciPermisoConducirMOPT= $_POST ['VenciPermisoConducirMOPT'];
$Observaciones= $_POST ['Observaciones'];



$query= mysqli_query($db,"call ModificarPermisosOficial('$numConsecutivo','$TipoLicenciaConducir','$VenciLicenciaConducir',
'$NumPermisoPortacionArmas','$VenciPermisoPortacionArmas','$NumPermisoConducirCOSEVI','$VenciPermisoConducirCOSEVI',
'$NumPermisoConducirMOPT','$VenciPermisoConducirMOPT','$Observaciones')");

$resultado= mysqli_fetch_assoc($query);


if($resultado['errno'] == 0){

   $HTML=1;
}

//$statement->close();
$db->close();

echo $HTML;

?>
