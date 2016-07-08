<?php
$db= new Conexion();

//Datos del Registro *********

$Nombre= $_POST ['Nombre'];
$PrimerApell= $_POST ['PrimerApell'];
$SegundoApell= $_POST ['SegundoApell'];
$Cedula= $_POST ['Cedula'];
$Edad= $_POST ['Edad'];
$Direccion= $_POST ['Direccion'];
$Escolaridad= $_POST ['Escolaridad'];
$NumeroTelefono= $_POST ['NumeroTelefono'];
$Correo= $_POST ['Correo'];
$FechaNac= $_POST ['FechaNac'];
$IngresoDele= $_POST ['IngresoDele'];
$NombraOficial= $_POST ['NombraOficial'];
$NombrePuesto=$_POST ['NombrePuesto'];
$CodigoOficial= $_POST ['CodigoOficial'];
$TipoLicenciaConducir= $_POST ['TipoLicenciaConducir'];
$VenciLicenciaConducir= $_POST ['VenciLicenciaConducir'];
$NumPermisoPortacionArmas= $_POST ['NumPermisoPortacionArmas'];
$VenciPermisoPortacionArmas= $_POST ['VenciPermisoPortacionArmas'];
$NumPermisoConducirCOSEVI= $_POS ['NumPermisoConducirCOSEVI'];
$VenciPermisoConducirCOSEVI= $_POST ['VenciPermisoConducirCOSEVI'];
$NumPermisoConducirMOPT= $_POST ['NumPermisoConducirMOPT'];
$VenciPermisoConducirMOPT= $_POST ['VenciPermisoConducirMOPT'];
$EstadoOficial=1;
$Observaciones= $_POST ['Observaciones'];
$IdDelegacion=20;



$query= mysqli_query($db,"call RegistrarOficiales('$Nombre','$PrimerApell','$SegundoApell','$Cedula',
'$Edad','$Direccion','$Escolaridad','$NumeroTelefono','$Correo','$FechaNac','$IngresoDele','$NombraOficial',
'$NombrePuesto','$CodigoOficial','$TipoLicenciaConducir','$NumPermisoPortacionArmas','$VenciPermisoPortacionArmas',
'$VenciPermisoPortacionArmas','$NumPermisoConducirCOSEVI','$VenciPermisoConducirCOSEVI','$NumPermisoConducirMOPT',
'$VenciPermisoConducirMOPT','$Observaciones','$IdDelegacion')");

/*$resultado= mysqli_fetch_assoc($query);*/

/*if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El Oficial ya existe.</strong></p>
        </div>';


}
if($resultado['errno'] == 0){

   $HTML=1;
}*/

//$statement->close();
$db->close();

echo $HTML;

?>
