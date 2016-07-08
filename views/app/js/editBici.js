function editarBici() {
  var connect, form, response, result, numConsecutivo, numConsecutivoD, numBoletaBici,
  numMarcoBici, tipoBici, llaveBici, marcaBici, colorBici, obsBici;

// Parametros capturados del formulario

  numConsecutivo= __('numConsecutivo').value;
  numConsecutivoD= __('numConsecutivoD').value;
  numBoletaBici= __('numBoletaBici').value;
  numMarcoBici= __('numMarcoBici').value;
  tipoBici= __('tipoBici').value;
  llaveBici= __('llaveBici').value;
  marcaBici= __('marcaBici').value;
  colorBici= __('colorBici').value;
  obsBici= __('obsBici').value;


  //************** Se abre la conexion, si todo esta bien
      form ='numConsecutivo=' + numConsecutivo +
      '&numConsecutivoD=' + numConsecutivoD +
      '&numBoletaBici=' + numBoletaBici +
      '&numMarcoBici=' + numMarcoBici +
      '&tipoBici=' + tipoBici +
      '&llaveBici=' + llaveBici +
      '&marcaBici=' + marcaBici +
      '&colorBici=' + colorBici +
      '&obsBici=' + obsBici;

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
        __('_AJAX_editBici_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_editBici_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Registrando datos...</strong></p>';
      result += '</div>';
      __('_AJAX_editBici_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=editarBici',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

}



function mostrar(){

__('numMarcoBici').disabled=false;
__('tipoBici').disabled=false;
__('llaveBici').disabled=false;
__('marcaBici').disabled=false;
__('colorBici').disabled=false;
__('obsBici').disabled=false;
$("#btnGuardarBici").show();

}

window.onload= function(){

  var btnGuardarBici= __('btnGuardarBici');
  var btnEditarBici= __('btnEditarBici');

  btnGuardarBici.addEventListener("click",  editarBici);
btnEditarBici.addEventListener("click", mostrar);
};
