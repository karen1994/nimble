<?php
$db= new Conexion();

//Datos del Registro ********
$numConsecutivo= $_POST['numConsecutivo'];
$numConsecutivoD= $_POST['numConsecutivoD'];
$numBoletaMoto= $_POST['numBoletaMoto'];
$identMoto= $_POST['identMoto'];
$llaveMoto= $_POST['llaveMoto'];
$marcaMoto= $_POST['marcaMoto'];
$colorMoto= $_POST['colorMoto'];
$obsMoto= $_POST['obsMoto'];
$estado= $_POST['estado'];;



//************************************
$query= mysqli_query($db,"call sp_editar_Motocicleta('$numConsecutivo','$numConsecutivoD',
'$numBoletaMoto', '$llaveMoto','$identMoto','$marcaMoto','$colorMoto', '$estado', '$obsMoto')");

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
