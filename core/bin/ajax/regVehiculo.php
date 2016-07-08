<?php
$db= new Conexion();

//Datos del Registro *********
$delegacion= 20;
$numPlaca= $_POST['numPlaca'];
$TipoVehiculo=  $_POST['TipoVehiculo'];
$MarcaVehiculo= $_POST['MarcaVehiculo'];
$KmInicial= $_POST['KmInicial'];
$estadoVehiculo= 1;
$Observaciones= $_POST['Observaciones'];
$ServicioVehiculo= 'Libre';



$query= mysqli_query($db,"call registrarVehiculoO('$delegacion','$numPlaca','$TipoVehiculo','$MarcaVehiculo',
'$KmInicial','$estadoVehiculo','$Observaciones','$ServicioVehiculo')");

$resultado= mysqli_fetch_assoc($query);

if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>Ya existe un vehículo con la misma placa.</strong></p>
        </div>';


}else if($resultado['errno'] == 0){

   $HTML=1;
}

//$statement->close();
$db->close();
echo $HTML;
?>
