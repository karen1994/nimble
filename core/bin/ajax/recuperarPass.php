<?php
$db= new Conexion();

//Datos del Registro ********
$correo= $_POST['correo'];
$pass1= Encrypt($_POST['pass1']);

//************************************
$query= mysqli_query($db,"call sp_recuperar_contraseña_Usuario('$correo','$pass1')");

$resultado= mysqli_fetch_assoc($query);

 if($resultado['errno'] ==0){

 $HTML=1;
}


//$statement->close();
$db->close();

echo $HTML;
?>
