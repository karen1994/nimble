function registro(){
  var connect, form, response, result, usuario,delegacion,tipoUsuario, pass1,pass2, correo ;
  //Parametros capturados del formulario de HTML
  usuario =      __('codOficial').value;
  delegacion=    __('codDelegacion').value;
  tipoUsuario=  __('tipoUsuario').value;
  correo =       __('correoU').value;
  pass1 =        __('pass1').value;
  pass2 =  __('pass2').value;

if(pass1==pass2){
    //************************** DATOS CORRECTOS *********
      form =  'user=' + usuario +'delegacion='+delegacion +'&tipoUsuario='+ tipoUsuario + '&pass=' + pass1 + '&email=' + correo;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function() {
          if(connect.readyState == 4 && connect.status == 200) {
            if(connect.responseText == 1) {
              result= ' <div class="alert alert-success"> '; 
              result+= ' <button class= "close" data-dismiss="alert"><span>&times;</span>';
               result += '<h4>Registro Completado</h4>';
              result+= ' <strong>Estamos redireccionandote...</strong>';
              result+= '</div>';
              __('_AJAX_REG_').innerHTML = result;
              location.reload();
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
        //************** Se abre la conexion, si todo esta bien
        connect.open('POST','core/bin/ajax/ajax.php?mode=reg',true);
        connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        connect.send(form);

        //***********************************
    }else{
    
   result= ' <div class="alert alert-warning"> '; 
   result+= ' <button class= "close" data-dismiss="alert"><span>&times;</span>';
   result+= ' <strong>Alerta!</strong> Las contraseñas no coinciden';
    result+= '</div>';
    
   __('_AJAX_REG_').innerHTML = result;
   
   alert("No coinciden");
    }
} //Final de la funcion 


function runScriptReg(e) {
  if(e.keyCode == 13) {
    registro();
  } 
}

