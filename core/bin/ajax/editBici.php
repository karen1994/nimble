<?php
$db= new Conexion();

//Datos del Registro ********
$numConsecutivo= $_POST['numConsecutivo'];
$numConsecutivoD= $_POST['numConsecutivoD'];
$numBoletaBici= $_POST['numBoletaBici'];
$numMarcoBici= $_POST['numMarcoBici'];
$tipoBici= $_POST['tipoBici'];
$llaveBici= $_POST['llaveBici'];
$marcaBici= $_POST['marcaBici'];
$colorBici= $_POST['colorBici'];
$obsBici= $_POST['obsBici'];
$estado=1;



//************************************
$query= mysqli_query($db,"call sp_editarBicicleta('$numConsecutivo','$numConsecutivoD',
'$numBoletaBici', '$llaveBici','$tipoBici','$marcaBici','$colorBici', '$numMarcoBici',
'$estado', '$obsBici')");

$resultado= mysqli_fetch_assoc($query);

if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El número de marco esta activo.</strong></p>
        </div>';


}else if($resultado['errno'] ==0){

 $HTML=1;
}


//$statement->close();
$db->close();

echo $HTML;
?>
