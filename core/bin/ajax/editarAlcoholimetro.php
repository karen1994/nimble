<?php
$db= new Conexion();

//Datos del Registro *********
$delegacion= 20;
$consecutivo= $_POST['consecutivo'];
$numPatrimonio= $_POST['numPatrimonio'];
$NumUltimaPrueba=  $_POST['numUltimaPrueba'];
$estadoAlcoholimetro= 1;
$observaciones= $_POST['Observaciones'];
$EstaServicioAlcoholimetro=$_POST['EstaServicioAlcoholimetro'];



$query= mysqli_query($db,"call ModificarRegAlcoholimetro('$consecutivo','$numPatrimonio','$NumUltimaPrueba',
'$estadoAlcoholimetro','$observaciones','$EstaServicioAlcoholimetro')");


$resultado= mysqli_fetch_assoc($query);

if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El número de patrimonio ya existe.</strong></p>
        </div>';
}else if($resultado['errno'] ==0){

 $HTML=1;
}

$db->close();

echo $HTML;
?>
