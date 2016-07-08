<?php 
$db= new Conexion();


  $fechaSalidaVehi = $_POST['fechaSalidaVehi'];
  $horaSalidaVehi = $_POST['horaSalidaVehi'];
  $OficEntregaVehiSalida = $_POST['OficEntregaVehiSalida'];
  $OficRecibeVehiSalida = $_POST['OficRecibeVehiSalida'];
  $fechaEntradaVehi = $_POST['fechaEntradaVehi'];
  $horaEntradaVehi = $_POST['horaEntradaVehi'];
  $kmFinal = $_POST['kmFinal'];
  $recorridoVehi = $_POST['recorridoVehi'];
  $numFactura = $_POST['numFactura'];
  $autorizacion = $_POST['autorizacion'];
  $horaFactura = $_POST['horaFactura'];
  $litrosFacturados = $_POST['litrosFacturados'];
  $km = $_POST['km'];
  $montoFactura = $_POST['montoFactura'];
  $pernote = $_POST['pernote'];
  $OficEntregaVehiEntrada = $_POST['OficEntregaVehiEntrada'];
  $OficRecibeVehiEntrada = $_POST['OficRecibeVehiEntrada'];
  $observEntVehi = $_POST['observEntVehi '];
  $observSalVehi = $_POST['observSalVehi'];
  $numPlaca = $_POST['numPlaca'];
  
  
  
$query= mysqli_query($db,"call ModificarEntradaSalidaVehiculoOfic('$fecSalidaVehi','$horaSalidaVehi','$codOficEntregaVehiSalida',
  '$codOficRecibeVehiSalida','$fecEntradaVehi','$horaEntradaVehi','$kmFinal','$recorridoVehi','$numFactura','$autorizacion',
  '$horaFactura','$litrosFacturados','$km','$montoFactura','$pernote','$codOficEntregaVehiEntrada','$codOficRecibeVehiEntrada',
'$observEntVehi','$observSalVehi','$numPlacaVehiculoOfic')");


    
   $HTML=1;


//$statement->close();
$db->close();

echo $HTML;

?>
  
  
   