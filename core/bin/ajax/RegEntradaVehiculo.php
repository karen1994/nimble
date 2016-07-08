<?php
$db= new Conexion();

//Datos del Registro *********

  $fechaEntrada = $_POST['fechaEntrada'];
  $horaEntrada = $_POST['horaEntrada'];
  $kmFinal = $_POST['kmFinal'];
  $recorrido = $_POST['recorrido'];
  $numeroFactura = $_POST['numeroFactura'];
  $autorizacion = $_POST['autorizacion'];
  $horaFactura = $_POST['horaFactura'];
  $litrosFacturados = $_POST['litrosFacturados'];
  $km = $_POST['km'];
  $montoFactura = $_POST['montoFactura'];
  $pernote = $_POST['pernote'];
  $OficEntregaEntrada = $_POST['OficEntregaEntrada'];
  $OficRecibeEntrada = $_POST['OficRecibeEntrada'];
  $observEntrada = $_POST['observEntrada'];
  $NumeroPlaca = $_POST['NumeroPlaca'];
  $estadoServicioVehiculo= 'Libre';
  $TipoActivo=  $_POST['TipoActivo'];



$query= mysqli_query($db,"call RegistrarEntradaVehiculo('$fechaEntrada','$horaEntrada','$kmFinal','$recorrido',
'$numeroFactura','$autorizacion','$horaFactura','$litrosFacturados','$km','$montoFactura','$pernote','$OficEntregaEntrada',
'$OficRecibeEntrada','$observEntrada','$NumeroPlaca','$estadoServicioVehiculo','$TipoActivo')");

$resultado= mysqli_fetch_assoc($query);




if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El oficial que recibe no existe.</strong></p>
        </div>';


}else if($resultado['errno'] == 2){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El oficial que entrega no existe.</strong></p>
        </div>';
}else if($resultado['errno'] == 3){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El Vehiculo esta en uso.</strong></p>
        </div>';


}else if($resultado['errno'] == 0){

   $HTML=1;
}

//$statement->close();
$db->close();
echo $HTML;
?>
