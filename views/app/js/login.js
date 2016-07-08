
function goLogin() {
  var connect, form, response, result, user, pass, sesion;
  user = __('user_login').value;
  pass = __('pass_login').value;
  sesion = true;


  if(user != "" && pass != ""){
      form = 'user=' + user + '&pass=' + pass + '&sesion=' + sesion;
  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'); //Función que permite que se visualice en todos los  navegadores
  connect.onreadystatechange = function() {
      /*Estados del objeto connect:
      1= Esta desactivado.
      2= Esta enviando los datos desde cero.
      3= PHP recibe los datos.
      4= PHP devuelve los datos a JavaScript
      STATUS: 404= Cuando no se encuentra ajax.php?mode=login
              200= Cuando si se encuentra el archivo*/
    if(connect.readyState == 4 && connect.status == 200) { //Revisa el estado de la conexión con ajax
      if(connect.responseText == 1) {

        result = '<div class="alert alert-dismissible alert-success">';
        result += '<h4>Conectado!</h4>';
        result += '<p><strong>Estamos redireccionandote...</strong></p>';
        result += '</div>';
        __('_AJAX_LOGIN_').innerHTML = result;
        window.location.assign("?view=menuPrincipal");
      } else {
        __('_AJAX_LOGIN_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Estamos intentando logearte....</strong></p>';
      result += '</div>';
      __('_AJAX_LOGIN_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=login',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax
} else{

       result = '<div class="alert alert-dismissible alert-warning">';
         result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Cuidado!</h4>';
        result += '<p><strong>Debes llenar los campos para iniciar sesión</strong></p>';
        result += '</div>';
        __('_AJAX_LOGIN_').innerHTML = result;




  }
}
function runScriptLogin(e) { //Método par detectar la tecla enter
  if(e.keyCode == 13) {
    goLogin(); //Llama el método goLogin
  }
}
