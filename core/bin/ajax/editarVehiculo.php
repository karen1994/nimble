<?php
$db= new Conexion();


//Datos del Registro *********
$delegacion= 20;
$consecutivo= $_POST['consecutivo'];
$numPlaca= $_POST['numPlaca'];
$TipoVehiculo=  $_POST['TipoVehiculo'];
$MarcaVehiculo=  $_POST['MarcaVehiculo'];
$KmInicial=  $_POST['KmInicial'];
$estadoVehiculoO= 1;
$Observaciones= $_POST['Observaciones'];
$ServicioVehiculo=  $_POST['ServicioVehiculo'];



$query= mysqli_query($db,"call ModificarRegVehiculoOfic('$consecutivo','$numPlaca','$TipoVehiculo','$MarcaVehiculo',
'$KmInicial','$estadoVehiculoO','$Observaciones','$ServicioVehiculo')");

if(!$query){
  $HTML='<div class="alert alert-dismissible alert-danger">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <h4>ERROR</h4>
    <p><strong>Error al actualizar.</strong></p>
    </div>';
}else{
  $HTML=1;
}
//$resultado= mysqli_fetch_assoc($query);

/*if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>Ya existe un vehículo con la misma placa.</strong></p>
        </div>';


}else if($resultado['errno'] == 0){*/


//}

//$statement->close();
$db->close();
echo $HTML;
?>
