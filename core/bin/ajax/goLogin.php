 <?php
 $db= new Conexion();
 
 //Datos del Login
 $user = $_POST['user'];
 $pass= Encrypt($_POST['pass']);
 $sesion = $_POST['sesion'];
 
 //************************************
$statement = $db->prepare("call sp_login(?,?)");
$statement->bind_param("is", $user,$pass);
$statement->execute();
$fila= $statement->get_result();
$resultado= $fila->fetch_assoc();
$statement->close();
$db->close();
if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>No existe un usuario con el código ingresado.</strong></p>
        </div>';
    
    }else if ($resultado['errno'] == 2){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>La contraseña no es valida.</strong></p>
        </div>';
    
    }else if ($resultado['errno'] == 0){
        //Todo Bien 
    $db1 = new Conexion();
   $sql = $db1->query("SELECT codigoOficial FROM usuario WHERE codigoOficial = '$user' LIMIT 1 ");
    
    if($sql->num_rows>0){
      
         if($_POST['sesion']){   ini_set('session.cookie_lifetime', time()+(60*60*24));}
          $_SESSION['app_id']= $db1->recorrer($sql)[0];
        $db1->close();
        $HTML=1; 
    } else {
          $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>Error al iniciar sesión.</strong></p>
        </div>';
    }
    
         
             
           
             
        
        
        
    }



 echo $HTML;
 
 /*if(!empty($_POST['user'])and !empty($_POST['pass'])){
 #Se realiza la conexion que se encuentra establecida con variables constantes en
 # models/class.Conexion.php
$db= new Conexion();
 $data= $db->real_escape_string($_POST['user']);
 $pass= Encrypt($_POST['pass']);

#-------------------------------------------------------------------------------
#Query para idtentificar si el usuario y la contraseña existe
#El parentesis funciona para que evalue primero la condición dentro de ellos,
#luego evalua la siguente condición.

#Limit= Limita la cantidad de coincidencia que el query realize. Optimización.
//$QUERY= "SELECT codigoOficial FROM usuario WHERE (codigoOficial='$data' OR correoUsuario='$data') AND claveUsuario='$pass' LIMIT 1;";
$sql= $db->query("SELECT codigoOficial FROM usuario WHERE (codigoOficial='$data' OR correoUsuario='$data') AND claveUsuario='$pass' LIMIT 1;");
if($db->rows($sql)>0){
    $_SESSION['app_id']= $db->recorrer($sql)[0];
     ini_set('session.cookie_lifetime', time()+(60*60*24));
    echo 1;
}else {
     echo '<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>ERROR:</strong> Las credenciales son incorrectas.
    </div>';
}
$db->close(); # IMPORTANTE Siempre cerrar la conexión 
 }else {
    echo '<div class="alert alert-dismissible alert-danger
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>ERROR:</strong> Todos los campos deben de estar llenos. 
    </div>';
 }*/
 
 
