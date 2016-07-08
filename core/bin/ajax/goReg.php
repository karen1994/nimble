<?php 
$db= new Conexion();

//Datos del Registro ********* 
$user= $_POST['user'];
$delegacion=  $_POST['delegacion'];
$tipoUsuario= $_POST['tipoUsuario'];
$email= $_POST['email'];
$pass= Encrypt($_POST['pass']);
$estado=1;

//************************************
$statement = $db->prepare("call registroUsuario(?,?,?,?,?,?)");
$statement->bind_param("iiissi", $user,$delegacion,$tipoUsuario,$email,$pass,$estado);
$statement->execute();
$fila= $statement->get_result();
$resultado= $fila->fetch_assoc();

/*$consulta = mysqli_query("call registroUsuario('$user','$delegacion','$tipoUsuario','$email','$pass','$estado')",$db);
$statement= mysqli_fetch_assoc($consulta);*/

if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El código del oficial no existe.</strong></p>
        </div>';
    
   
}
else if($resultado['errno'] ==2){
     $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El código de la delegación no existe.</strong></p>
        </div>';
        
}else if($resultado['errno'] ==3){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>Ya existe un usuario con el mismo código de Oficial.</strong></p>
        </div>';
}else if($resultado['errno'] ==4){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>Ya existe un usuario con el mismo correo electronico.</strong></p>
        </div>';
}else if($resultado['errno'] ==0){
    
   /* $keyreg= md5(time());
    $link= APP_URL .'?view=activar&key=' .$keyreg ;
    $mail= new PHPMailer;

$mail->Charset= "UTF-8";
$mail->Encoding= "quoted-printable";
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = PHPMAILER_HOST;  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = PHPMAILER_USER;                 // SMTP username
$mail->Password = PHPMAILER_PASS;                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = PHPMAILER_PORT;                                    // TCP port to connect to

$mail->setFrom( PHPMAILER_USER, APP_TITLE);       //quien manda el correo
$mail->addAddress($email, $user);     // Add a recipient , quien lo recibe
/*$mail->addAddress('karen12gomez@hotmail.com');*/               // Name is optional


/*$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Activación de tu cuenta';
$mail->Body    = EmailTemplate($user,$link);
$mail->AltBody = ' Oficial con el código de usuario :'.$user.' para activar tu cuenta accede al siguiente enlace' . $link;

if(!$mail->send()) {
    
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>. $mail->ErrorInfo.</strong></p>
        </div>';
    
} else {
    
    //Se inserta en la base de datos
   /* $statement1 = $db->prepare("INSERT INTO usuario (keyreg) VALUES ('$keyreg');");
    $statement1->execute();
    $statement1->close();
    
    $statement2 = $db->prepare("SELECT MAX(id) AS id FROM usuario;");
    $statement2->execute();
    $_SESSION['app_id']= $db->recorrer($sql_2)[0];
    $statement2->close();*/
    
     $HTML=1;
//}
    
   


  
}


/*$model= new Crud;
    $model->insertInto='usuario';
    $model->insertColumns='codigoOficial,idTipoUsuario,claveUsuario,correoUsuario,rolUsuario,numIntentos,estadoUsuario';
    $model->insertValues= "'$user','$tipoUsuario','$pass','$email','2','1','activo'";
    $model->Create();
    $mensaje= $model->mensaje;*/
/*if($db->rows($sql)==0){
//INSERT de los datos    
//$db->query("INSERT INTO usuario (codigoOficial,idTipoUsuario,claveUsuario,correoUsuario,estadoUsuario) VALUES ('$user','$tipoUsuario','$pass','$email','activo');");
$db->query("Call `sp_ingresarUsuario`('$user','$tipoUsuario','$pass','$email',1);");
//*************************    
} else{
    $usuario= $db->recorrer($sql)[0];
    if(strtolower($user)== strtolower($usuario)){
      $echo= '<div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">x</button>
     <strong>ERROR</strong>El usuario ingresado ya existe</p>
      </div>';  
    }else{
        $echo= '<div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">x</button>
     <strong>ERROR</strong>El correo electronico ingresado ya existe</p>
      </div>';  
    }
}*/
$statement->close();
$db->close();
echo $HTML;
?>