<?php
$db= new Conexion();

//Datos del Registro ********
$numConsecutivo= $_POST['numConsecutivo'];
$numBoletaMatricula= $_POST['numBoletaMatricula'];
$numPlaca= $_POST['numPlaca'];
$marcVehiculo= $_POST['marcVehiculo'];
$fecDetMatricula= $_POST['fecDetMatricula'];
$horDetMatricula= $_POST['horDetMatricula'];
$estado= $_POST['estado'];
$obsMatricula= $_POST['obsMatricula'];


//************************************
$query= mysqli_query($db,"call sp_editar_Placa('$numConsecutivo','$numPlaca',
'$marcVehiculo','$numBoletaMatricula','$horDetMatricula','$fecDetMatricula', '$estado', '$obsMatricula')");

$resultado= mysqli_fetch_assoc($query);

if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El número de placa esta activa.</strong></p>
        </div>';


}else if($resultado['errno'] ==0){

 $HTML=1;
}


//$statement->close();
$db->close();

echo $HTML;
?>
