function editarUsuario() {
  var connect, form, response, result, codOficial, tipoUsuario, correo, pass1,
  pass2, consecutivo;
// Parametros capturados del formulario

codOficial=  __('codOficial').value;
tipoUsuario =  __('tipoUsuario').value;
correo=       __('correo').value;
pass1 =      __('pass1').value;
pass2=       __('pass2').value;
consecutivo=       __('consecutivo').value;


  //************** Se abre la conexion, si todo esta bien
      form ='codOficial=' + codOficial +
      '&tipoUsuario=' + tipoUsuario +
      '&correo=' + correo +
      '&pass1=' + pass1 +
      '&pass2=' + pass2 +
      '&consecutivo=' + consecutivo;


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
        result += '<h4>Actualización completada !</h4>';
        result += '</div>';
        __('_AJAX_Editar_Usuario_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_Editar_Usuario_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Registrando datos...</strong></p>';
      result += '</div>';
      __('_AJAX_Editar_Usuario_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=editUsuario',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

}

window.onload= function(){

  var btnGuardarUsuario= __('btnGuardarUsuario');

  btnGuardarUsuario.addEventListener("click", editarUsuario);

};
