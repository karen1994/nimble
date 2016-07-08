function editarSalidaBici() {
  var connect, form, response, result, numConsecutivo, autSalMoto, oficialSalMoto, fecSalMoto,
  oficioSalMoto, tomoSalMoto, folioSalMoto;
  //Parametros capturados del formulario de HTML
  numConsecutivo= __('numConsecutivo').value;
  autSalMoto= __('autSalMoto').value;
  oficialSalMoto= __('oficialSalMoto').value;
  fecSalMoto= __('fecSalMoto').value;
  oficioSalMoto= __('oficioSalMoto').value;
  tomoSalMoto= __('tomoSalMoto').value;
  folioSalMoto= __('folioSalMoto').value;


      form = 'numConsecutivo=' + numConsecutivo +
       '&autSalMoto=' + autSalMoto +
       '&oficialSalMoto=' + oficialSalMoto +
       '&fecSalMoto=' + fecSalMoto +
       '&oficioSalMoto=' + oficioSalMoto +
       '&tomoSalMoto=' + tomoSalMoto +
       '&folioSalMoto=' + folioSalMoto;

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
                  __('_AJAX_EditSalBici_').innerHTML = result;
                  location.reload();
                } else {
                  __('_AJAX_EditSalBici_').innerHTML = connect.responseText; //Se muestran los errores
                }
              } else if(connect.readyState != 4) {
                  //Muestra mensaje de procesamiento.
                result = '<div class="alert alert-dismissible alert-warning">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>Procesando...</h4>';
                result += '<p><strong>Registrando datos...</strong></p>';
                result += '</div>';
                __('_AJAX_EditSalBici_').innerHTML = result;
              }
  }
  connect.open('POST','ajax.php?mode=editSalBici',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

}

function mostrar(){

__('autSalMoto').disabled=false;
__('oficialSalMoto').disabled=false;
__('fecSalMoto').disabled=false;
__('oficioSalMoto').disabled=false;
__('tomoSalMoto').disabled=false;
__('folioSalMoto').disabled=false;
$("#btnGuardarEditSalBici").show();

}

window.onload= function(){
  var btnGuardarEditSalBici= __('btnGuardarEditSalBici');
  var btnEditarSalBici= __('btnEditarSalBici');

btnGuardarEditSalBici.addEventListener("click", editarSalidaBici);
btnEditarSalBici.addEventListener("click", mostrar);

}
