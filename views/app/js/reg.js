function goReg() {
  var connect, form, response, result, user,tipoUsuario, pass, email, tyc, pass_dos;
  //Parametros capturados del formulario de HTML
  user =       __('user_reg').value;
  tipoUsuario= __('tipo_usuario').checked.value ? true : false;
  pass =       __('pass_reg').value;
  email =      __('email_reg').value;
  pass_dos =    __('pass_reg_dos').value;
  tyc =         __('tyc_reg').checked ? true : false;

//**********************************

    if(user != '' && pass != '' && pass_dos != '' && email != '') {
      if(pass == pass_dos) {
          var a = 0, rdbtn=document.getElementsByName("tipo_usuario") 
        for(i=0; i<rdbtn.length;i++){
         if(rdbtn.item(i).checked== false){
           a++;
     }
 }
if(a==rdbtn.length){
    result = '<div class="alert alert-dismissible alert-danger">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>ERROR</h4>';
      result += '<p><strong>Seleccione el tipo de Usuario.</strong></p>';
      result += '</div>';
      __('_AJAX_REG_').innerHTML = result;
      return false;
}else{
  

          //***************
        form =  'user=' + user + '&pass=' + pass + '&email=' + email +'&tipoUsuario='+tipoUsuario;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function() {
          if(connect.readyState == 4 && connect.status == 200) {
            if(connect.responseText == 1) {
              result = '<div class="alert alert-dismissible alert-success">';
              result += '<h4>Registro completado!</h4>';
              result += '<p><strong>Estamos redireccionandote...</strong></p>';
              result += '</div>';
              __('_AJAX_REG_').innerHTML = result;
              location.reload();
            } else {
              __('_AJAX_REG_').innerHTML = connect.responseText;
            }
          } else if(connect.readyState != 4) {
            result = '<div class="alert alert-dismissible alert-warning">';
            result += '<button type="button" class="close" data-dismiss="alert">x</button>';
            result += '<h4>Procesando...</h4>';
            result += '<p><strong>Estamos procesando tu registro...</strong></p>';
            result += '</div>';
            __('_AJAX_REG_').innerHTML = result;
          }
        }}
        //************** Se abre la conexion, si todo esta bien
        connect.open('POST','ajax.php?mode=reg',true);
        connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        connect.send(form);
        //***********************************
      } else {
        result = '<div class="alert alert-dismissible alert-danger">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>ERROR</h4>';
        result += '<p><strong>Las contraseñas no coinciden.</strong></p>';
        result += '</div>';
        __('_AJAX_REG_').innerHTML = result;
      }
    } else {
      result = '<div class="alert alert-dismissible alert-danger">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>ERROR</h4>';
      result += '<p><strong>Todos los campos deben estar llenos.</strong></p>';
      result += '</div>';
      __('_AJAX_REG_').innerHTML = result;
    }
 //******************************************************************
 
 
}

function runScriptReg(e) {
  if(e.keyCode == 13) {
    goReg();
  }
}


//******************** 