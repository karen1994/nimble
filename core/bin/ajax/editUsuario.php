<?php
$db= new Conexion();

//Datos del Registro ********
$codOficial= $_POST['codOficial'];
$tipoUsuario= $_POST['tipoUsuario'];
$correo= $_POST['correo'];
$pass1= Encrypt($_POST['pass1']);
$consecutivo= $_POST['consecutivo'];



//************************************
$query= mysqli_query($db,"call sp_Editar_Usuario('$codOficial','$tipoUsuario',
'$pass1','$correo','$consecutivo')");

$resultado= mysqli_fetch_assoc($query);

if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El código del oficial no existe.</strong></p>
        </div>';
}else if($resultado['errno'] ==2){
     $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>Ya existe un usuario con el mismo código.</strong></p>
        </div>';
}else if($resultado['errno'] ==3){
     $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>Ya existe un usuario con el mismo correo.</strong></p>
        </div>';
}else if($resultado['errno'] ==0){

 $HTML=1;
}


//$statement->close();
$db->close();

echo $HTML;
?>
