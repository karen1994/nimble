<?php
$db= new Conexion();

//Datos del Registro ********
$numConsecutivo= $_POST['numConsecutivo'];
$numConsecutivoA= $_POST['numConsecutivoA'];
$numBoletaMatricula= $_POST['numBoletaMatricula'];
$fecBoleta= $_POST['fecBoleta'];
$identAuto= $_POST['identAuto'];
$tomEntMatricula= $_POST['tomEntMatricula'];
$folEntMatricula= $_POST['folEntMatricula'];
$ofiDetMatricula= $_POST['ofiDetMatricula'];
$ofiRecMatricula= $_POST['ofiRecMatricula'];
$estado= $_POST['estado'];



//************************************
$query= mysqli_query($db,"call sp_Editar_Detencion_Automovil('$numConsecutivo', '$numConsecutivoA',
'$identAuto','$numBoletaMatricula','$fecBoleta','$tomEntMatricula','$folEntMatricula',
'$ofiDetMatricula','$ofiRecMatricula', '$estado')");

$resultado= mysqli_fetch_assoc($query);

if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>Ya existe un automóvil con el mismo numero de placa, vin motor u otro en estado activo ...!</strong></p>
        </div>';
}
else if($resultado['errno'] ==2){
     $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>Existe un registro con ese número de boleta.</strong></p>
        </div>';
}else if($resultado['errno'] ==3){
     $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El código del oficial que detiene no existe.</strong></p>
        </div>';
}else if($resultado['errno'] ==4){
     $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El código del oficial que recibe la detención no existe.</strong></p>
        </div>';
}else if($resultado['errno'] ==0){

 $HTML=1;
}


//$statement->close();
$db->close();

echo $HTML;
?>
