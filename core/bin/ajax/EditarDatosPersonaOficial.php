<?php
$db= new Conexion();

//Datos del Registro *********

$numConsecutivo= $_POST['numConsecutivo'];
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



$query= mysqli_query($db,"call ModificarDatosPersonalOficial('$numConsecutivo','$Nombre','$PrimerApell','$SegundoApell',
'$Cedula','$Edad','$Direccion','$Escolaridad','$NumeroTelefono','$Correo','$FechaNac')");

$resultado= mysqli_fetch_assoc($query);

if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El Oficial ya existe.</strong></p>
        </div>';


}
else if($resultado['errno'] == 0){

   $HTML=1;
}

//$statement->close();
$db->close();

echo $HTML;

?>
