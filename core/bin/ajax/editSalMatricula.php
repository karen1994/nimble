<?php
$db= new Conexion();

//Datos de la salida *********
 $numConsecutivo= $_POST['numConsecutivo'];
 $oficioSalMatricula= $_POST['oficioSalMatricula'];
 $nomPerCorreo= $_POST['nomPerCorreo'];
 $ape1PerCorreo= $_POST['ape1PerCorreo'];
 $ape2PerCorreo= $_POST['ape2PerCorreo'];
 $estado= $_POST['estado'];
 $tomSalMatricula= $_POST['tomSalMatricula'];
 $folSalMatricula= $_POST['folSalMatricula'];
 $fecSalMatricula= $_POST['fecSalMatricula'];



//************************************
$query= mysqli_query($db," CALL sp_editar_Salida_Matricula('$numConsecutivo','$oficioSalMatricula',
'$nomPerCorreo','$ape1PerCorreo', '$ape2PerCorreo', '$estado', '$tomSalMatricula',
 '$folSalMatricula', '$fecSalMatricula')");

$resultado= mysqli_fetch_assoc($query);

if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El número de oficio ya existe.</strong></p>
        </div>';


}else if($resultado['errno'] ==0){

 $HTML=1;
}

$db->close();
echo $HTML;
?>
