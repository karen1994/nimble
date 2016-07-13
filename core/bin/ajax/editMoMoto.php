<?php
$db= new Conexion();

//Datos del Registro ********
$numConsecutivo= $_POST['numConsecutivo'];
$numArticulo= $_POST['numArticulo'];
$desMotivo= $_POST['desMotivo'];




//************************************
$query= mysqli_query($db," CALL sp_editar_Motivo('$numConsecutivo','$numArticulo','$desMotivo')");

$resultado= mysqli_fetch_assoc($query);


if($resultado['errno'] ==0){

 $HTML=1;
}


//$statement->close();
$db->close();

echo $HTML;
?>
