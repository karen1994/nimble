<?php
$db= new Conexion();

//Datos del Registro ********
$numConsecutivo= $_POST['numConsecutivo'];
$numConsecutivoD= $_POST['numConsecutivoD'];
$numBoletaMoto= $_POST['numBoletaMoto'];
$numPlacaMoto= $_POST['numPlacaMoto'];
$llaveMoto= $_POST['llaveMoto'];
$marcaMoto= $_POST['marcaMoto'];
$colorMoto= $_POST['colorMoto'];
$motorMoto= $_POST['motorMoto'];
$marcoMoto= $_POST['marcoMoto'];
$obsMoto= $_POST['obsMoto'];
$estado=1;



//************************************
$query= mysqli_query($db,"call sp_editarMotocicleta('$numConsecutivo','$numConsecutivoD',
'$numBoletaMoto', '$llaveMoto','$numPlacaMoto','$marcaMoto','$colorMoto', '$motorMoto',
'$marcoMoto', '$estado', '$obsMoto')");

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
