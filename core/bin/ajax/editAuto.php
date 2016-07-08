<?php
$db= new Conexion();

//Datos del Registro ********
$numConsecutivo= $_POST['numConsecutivo'];
$numConsecutivoD= $_POST['numConsecutivoD'];
$numBoletaAuto= $_POST['numBoletaAuto'];
$identAuto= $_POST['identAuto'];
$llaveAuto= $_POST['llaveAuto'];
$marcaAuto= $_POST['marcaAuto'];
$colorAuto= $_POST['colorAuto'];
$obsAuto= $_POST['obsAuto'];
$estado= $_POST['estado'];



//************************************
$query= mysqli_query($db,"call sp_editar_Automovil('$numConsecutivo','$numConsecutivoD', '$numBoletaAuto',
'$llaveAuto','$identAuto','$marcaAuto','$colorAuto', '$estado', '$obsAuto')");

$resultado= mysqli_fetch_assoc($query);

if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>Ya existe un automóvil con el mismo numero de placa, vin motor u otro en estado activo ...!</strong></p>
        </div>';


}else if($resultado['errno'] ==0){

 $HTML=1;
}


//$statement->close();
$db->close();

echo $HTML;
?>
