<?php 
$db= new Conexion();


//Datos del Registro ********* 
$delegacion= 20;
$numPlaca= $_POST['numPlaca'];
$TipoVehiculo=  $_POST['TipoVehiculo'];
$MarcaVehiculo=  $_POST['MarcaVehiculo'];
$KmInicial=  $_POST['KmInicial'];
$estadoVehiculoO= 1;
$Observaciones= $_POST['Observaciones'];
$estadoServicioVehiculo= $_POST['estadoServicioVehiculo'];


//************************************
/*$statement = $db->prepare("call registrarAlcoholimetro(?,?,?,?,?,?)");
$statement->bind_param("iiiiss",$delegacion, $numPatrimonio,$NumUltimaPrueba,$estadoAlcoholimetro,$observaciones,$EstaServicioAlcoholimetro);
$statement->execute();
$fila= $statement->get_result();
$resultado= $fila->fetch_assoc();*/

$query= mysqli_query($db,"call registrarVehiculoO('$delegacion','$numPlaca','$TipoVehiculo','$MarcaVehiculo',
'$KmInicial','$estadoVehiculoO','$Observaciones','$estadoServicioVehiculo')");

$resultado= mysqli_fetch_assoc($query);

if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="subimt" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El Vehiculo ya existe.</strong></p>
        </div>';
    
   
}
if($resultado['errno'] == 0){ 
    
   $HTML=1;
}

//$statement->close();
$db->close();

echo $HTML;