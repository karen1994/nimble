<?php 
$db= new Conexion();

$FechaSalidaAlcohol=$_POST['FechaSalidaAlcohol'];
$HoraSalidaAlcohol=$_POST['HoraSalidaAlcohol'];
$OfiEntregaSalida=$_POST['observacionesEntrada'];
$OfiRecibeSalida=$_POST['observacionesEntrada'];
$FechaEntradaAlcohol=$_POST['observacionesEntrada'];
$HoraEntradaAlcohol=$_POST['observacionesEntrada'];
$UltimaPrueba=$_POST['observacionesEntrada'];
$OfiEntregaEntrada=$_POST['observacionesEntrada'];
$OfiRecibeEntrada=$_POST['observacionesEntrada'];
$ObservacionesSalida=$_POST['observacionesEntrada'];
$observacionesEntrada= $_POST['observacionesEntrada'];
$NumeroPatrimonio= $_POST['numPatrimonio'];

$query= mysqli_query($db,"call ModificarEntradaSalidaAlcohol('$FechaSalidaAlcohol','$HoraSalidaAlcohol','$OfiEntregaSalida',
'$OfiRecibeSalida','$FechaEntradaAlcohol','$HoraEntradaAlcohol','$UltimaPrueba','$OfiEntregaEntrada','$OfiRecibeEntrada',
'$ObservacionesSalida','$observacionesEntrada','$NumeroPatrimonio')");


    
   $HTML=1;


//$statement->close();
$db->close();

echo $HTML;

?>