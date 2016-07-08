<?php
$db= new Conexion();

//Datos del Registro *********
$delegacion= 20;
$numPatrimonio= $_POST['numPatrimonio'];
$NumUltimaPrueba=  $_POST['numUltimaPrueba'];
$estadoAlcoholimetro= 1;
$observaciones= $_POST['Observaciones'];
$EstaServicioAlcoholimetro= 'Libre';


$query= mysqli_query($db,"call registrarAlcoholimetro('$delegacion','$numPatrimonio','$NumUltimaPrueba','$estadoAlcoholimetro',
'$observaciones','$EstaServicioAlcoholimetro')");

$resultado= mysqli_fetch_assoc($query);

if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El Alcoholimetro ya existe.</strong></p>
        </div>';


}
if($resultado['errno'] == 0){

   $HTML=1;
}

//$statement->close();
$db->close();
echo $HTML;
?>
