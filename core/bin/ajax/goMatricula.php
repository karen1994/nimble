<?php
$db= new Conexion();

//Datos del Registro *********
$cedPersona= $_POST['cedPersona'];
$nomPersona= $_POST['nomPersona'];
$ape1= $_POST['ape1'];
$ape2= $_POST['ape2'];
$numArticulo= $_POST['numArticulo'];
$desMotivo= $_POST['desMotivo'];
$numBoletaMatricula= $_POST['numBoletaMatricula'];
$fecBoleta= $_POST['fecBoleta'];
$numPlaca= $_POST['numPlaca'];
$marcVehiculo= $_POST['marcVehiculo'];
$fecDetMatricula= $_POST['fecDetMatricula'];
$horDetMatricula= $_POST['horDetMatricula'];
$tomEntMatricula= $_POST['tomEntMatricula'];
$folEntMatricula= $_POST['folEntMatricula'];
$ofiDetMatricula= $_POST['ofiDetMatricula'];
$ofiRecMatricula= $_POST['ofiRecMatricula'];
$estado=1;
$obsMatricula= $_POST['obsMatricula'];


//************************************
$query= mysqli_query($db,"call sp_Registro_Detencion_Matricula('$numArticulo','$desMotivo','$cedPersona','$nomPersona',
'$ape1','$ape2','$numPlaca','$marcVehiculo','$numBoletaMatricula','$fecBoleta','$tomEntMatricula',
'$folEntMatricula','$horDetMatricula','$fecDetMatricula','$ofiDetMatricula','$ofiRecMatricula',
'$estado','$obsMatricula')");

$resultado= mysqli_fetch_assoc($query);

if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El número de placa esta activa.</strong></p>
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
        <p><strong>El código del oficial que recibe no existe.</strong></p>
        </div>';
}else if($resultado['errno'] ==0){

 $HTML=1;
}


//$statement->close();
$db->close();

echo $HTML;
?>
