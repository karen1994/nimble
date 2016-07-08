<?php
$db= new Conexion();

//Datos del Registro ********
$numConsecutivo= $_POST['numConsecutivo'];
$cedPersona= $_POST['cedPersona'];
$nomPersona= $_POST['nomPersona'];
$ape1= $_POST['ape1'];
$ape2= $_POST['ape2'];




//************************************
$query= mysqli_query($db," CALL sp_editarPeMatricula('$numConsecutivo','$cedPersona','$nomPersona','$ape1','$ape2')");

$resultado= mysqli_fetch_assoc($query);


if($resultado['errno'] ==0){

 $HTML=1;
}


//$statement->close();
$db->close();

echo $HTML;
?>
