function editarMoto() {
  var connect, form, response, result, numConsecutivo, numConsecutivoD, numBoletaMoto,
  numPlacaMoto, llaveMoto, marcaMoto, colorMoto, motorMoto, marcoMoto, obsMoto;

// Parametros capturados del formulario

  numConsecutivo= __('numConsecutivo').value;
  numConsecutivoD= __('numConsecutivoD').value;
  numBoletaMoto= __('numBoletaMoto').value;
  numPlacaMoto= __('numPlacaMoto').value;
  llaveMoto= __('llaveMoto').value;
  marcaMoto= __('marcaMoto').value;
  colorMoto= __('colorMoto').value;
  motorMoto= __('motorMoto').value;
  marcoMoto= __('marcoMoto').value;
  obsMoto= __('obsMoto').value;


  //************** Se abre la conexion, si todo esta bien
      form ='numConsecutivo=' + numConsecutivo +
      '&numConsecutivoD=' + numConsecutivoD +
      '&numBoletaMoto=' + numBoletaMoto +
      '&numPlacaMoto=' + numPlacaMoto +
      '&llaveMoto=' + llaveMoto +
      '&marcaMoto=' + marcaMoto +
      '&colorMoto=' + colorMoto +
      '&motorMoto=' + motorMoto +
      '&marcoMoto=' + marcoMoto +
      '&obsMoto=' + obsMoto;


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
        __('_AJAX_editMoto_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_editMoto_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Registrando datos...</strong></p>';
      result += '</div>';
      __('_AJAX_editMoto_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=editarMoto',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

}



function mostrar(){

__('numPlacaMoto').disabled=false;
__('llaveMoto').disabled=false;
__('marcaMoto').disabled=false;
__('colorMoto').disabled=false;
__('motorMoto').disabled=false;
__('marcoMoto').disabled=false;
__('obsMoto').disabled=false;
$("#btnGuardarMoto").show();

}

window.onload= function(){

  var btnGuardarMoto= __('btnGuardarMoto');
  var btnEditarMoto= __('btnEditarMoto');

  btnGuardarMoto.addEventListener("click",  editarMoto);
btnEditarMoto.addEventListener("click", mostrar);
};
