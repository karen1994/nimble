function editarMotivoBici() {
  var connect, form, response, result, numConsecutivo, numArticulo, desMotivo;

// Parametros capturados del formulario

  numConsecutivo= __('numConsecutivo').value;
  numArticulo= __('numArticulo').value;
  desMotivo= __('desMotivo').value;


  //************** Se abre la conexion, si todo esta bien
      form ='numConsecutivo=' + numConsecutivo +
      '&numArticulo=' + numArticulo +
      '&desMotivo=' + desMotivo;


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
        __('_AJAX_Motivo_Bici_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_Motivo_Bici_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Registrando datos...</strong></p>';
      result += '</div>';
      __('_AJAX_Motivo_Bici_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=editMoBici',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

}

function mostrar(){

__('numArticulo').disabled=false;
__('desMotivo').disabled=false;
$("#btnGuardarMotivo").show();

}

window.onload= function(){

  var btnGuardarMotivo= __('btnGuardarMotivo');
  var btnEditarMotivo= __('btnEditarMotivo');

  btnGuardarMotivo.addEventListener("click", editarMotivoBici);
  btnEditarMotivo.addEventListener("click", mostrar);

};
