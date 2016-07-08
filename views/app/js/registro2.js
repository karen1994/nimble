function registro(){
  var connect, form, response, result, usuario,delegacion,tipoUsuario, pass1,pass2, correo ;
  //Parametros capturados del formulario de HTML

  usuario=  __('codOficial').value;
  delegacion =  __('codDelegacion').value;
  tipoUsuario =  __('tipoUsuario').value;
  correo=       __('email').value;
  pass1 =      __('pass1').value;
  pass2=       __('pass2').value;
    
   // alert(usuario + delegacion + tipoUsuario + correo + pass1 + pass2);

 if(usuario != "" && delegacion != "" && tipoUsuario != "" &&
           correo != "" && pass1 != "" && pass2 != ""){

      if(pass1 != pass2){

       result = '<div class="alert alert-dismissible alert-danger">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>ERROR</h4>';
        result += '<p><strong>Las contraseñas no coinciden.</strong></p>';
        result += '</div>';

        __('_AJAX_REG_').innerHTML = result;

               }else{
                   //Tod Bien
       form =  'user=' + usuario +'&delegacion='+delegacion +'&tipoUsuario='+ tipoUsuario + '&pass=' + pass1 + '&email=' + correo;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function() {
        if(connect.readyState == 4 && connect.status == 200) {
            if(connect.responseText == 1) {

               result = '<div class="alert alert-dismissible alert-success">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Registro Completado</h4>';
        result += '<p><strong>Se ha enviado un correo electronico a la dirección que se definio.</strong></p>';
        result += '</div>';

              __('_AJAX_REG_').innerHTML = result;
              //location.reload();
              connect.close();
            } else {
              __('_AJAX_REG_').innerHTML = connect.responseText;
            }
          } else if(connect.readyState != 4) {

             result= ' <div class="alert alert-success"> ';
              result+= ' <button class= "close" data-dismiss="alert"><span>&times;</span>';
               result += '<h4>Procesando...</h4>';
              result+= ' <strong>Estamos procesando tu registro...</strong>';
              result+= '</div>';

            __('_AJAX_REG_').innerHTML = result;
          }
        }


         /*alert("Datos enviados"+ usuario+  delegacion  + tipoUsuario +
           correo  + pass1  + pass2 );*/
        //************** Se abre la conexion, si todo esta bien
        connect.open('POST','ajax.php?mode=reg',true);
        connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        connect.send(form);

        //***********************************



                   }


           }else{
       result = '<div class="alert alert-dismissible alert-warning">';
         result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Cuidado!</h4>';
        result += '<p><strong>Todos los campos deben estar llenos</strong></p>';
        result += '</div>';
        __('_AJAX_REG_').innerHTML = result;


           }

 //Boton del Registro

}


function runScriptReg(e) {
  if(e.keyCode == 13) {
    registro();
  }
}
