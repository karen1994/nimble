<?php
$db= new Conexion();

//Datos del Registro *********
$numConsecutivo=$_POST['numConsecutivo'];
$IngresoDele= $_POST ['IngresoDele'];
$NombraOficial= $_POST ['NombraOficial'];
$NombrePuesto=$_POST ['NombrePuesto'];
$CodigoOficial= $_POST ['CodigoOficial'];
$EstadoOficial=1;




$query= mysqli_query($db,"call ModificarDatosProfesionOficial($numConsecutivo,'$IngresoDele','$NombraOficial','$NombrePuesto',
'$CodigoOficial','$EstadoOficial')");

$resultado= mysqli_fetch_assoc($query);


if($resultado['errno'] == 0){

   $HTML=1;
}

//$statement->close();
$db->close();

echo $HTML;

?>
