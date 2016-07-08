function editarSalidaAuto() {
  var connect, form, response, result, numConsecutivo, autSalAuto, oficialSalAuto, fecSalAuto, oficioSalAuto,
  tomoSalAuto, folioSalAuto;
  //Parametros capturados del formulario de HTML
  numConsecutivo= __('numConsecutivo');
  autSalAuto= __('autSalAuto');
  oficialSalAuto= __('oficialSalAuto');
  fecSalAuto= __('fecSalAuto');
  oficioSalAuto= __('oficioSalAuto');
  tomoSalAuto= __('tomoSalAuto');
  folioSalAuto= __('folioSalAuto');


      form = 'numConsecutivo=' + numConsecutivo.value +
       '&autSalAuto=' + autSalAuto.value +
       '&oficialSalAuto=' + oficialSalAuto.value +
       '&fecSalAuto=' + fecSalAuto.value +
       '&oficioSalAuto=' + oficioSalAuto.value +
       '&tomoSalAuto=' + tomoSalAuto.value +
       '&folioSalAuto=' + folioSalAuto.value;

       if(autSalAuto.value == ""){
               alert("El campo autoridad que entrega es requerido");
               autSalAuto.focus();
               $("#autEnt").addClass('has-error');
            }else if (oficialSalAuto.value == ""){
                alert("El campo código del oficial que entrega es requerido");
             oficialSalAuto.focus();
                 $("#ofiEnt").addClass('has-error');
          }else if (fecSalAuto.value == ""){
              alert("El campo fecha de entrega es requerido");
           fecSalAuto.focus();
               $("#fecEntr").addClass('has-error');
        }else if (oficioSalAuto.value == ""){
            alert("El campo número de oficio es requerido");
         oficioSalAuto.focus();
             $("#oficio").addClass('has-error');
      }else if (tomoSalAuto.value == ""){
          alert("El campo tomo es requerido");
       tomoSalAuto.focus();
           $("#tomo").addClass('has-error');
     }else if (folioSalAuto.value == ""){
         alert("El campo folio es requerido");
      folioSalAuto.focus();
          $("#folio").addClass('has-error');
     }else{

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
                  __('_AJAX_EditSalAuto_').innerHTML = result;
                  location.reload();
                } else {
                  __('_AJAX_EditSalAuto_').innerHTML = connect.responseText; //Se muestran los errores
                }
              } else if(connect.readyState != 4) {
                  //Muestra mensaje de procesamiento.
                result = '<div class="alert alert-dismissible alert-warning">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>Procesando...</h4>';
                result += '<p><strong>Registrando datos...</strong></p>';
                result += '</div>';
                __('_AJAX_EditSalAuto_').innerHTML = result;
              }
  }
  connect.open('POST','ajax.php?mode=editSalAuto',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax
}
}

function datosCorrectos(){

     if (autSalAuto.value != ""){
           $("#autEnt").removeClass('has-error');
            $("#autEnt").addClass('has-success');
     }
     if (oficialSalAuto.value != ""){
            $("#ofiEnt").removeClass('has-error');
             $("#ofiEnt").addClass('has-success');
     }
     if (fecSalAuto.value != ""){
             $("#fecEntr").removeClass('has-error');
              $("#fecEntr").addClass('has-success');
     }
     if (oficioSalAuto.value != ""){
             $("#oficio").removeClass('has-error');
              $("#oficio").addClass('has-success');
     }
     if (tomoSalAuto.value != ""){
             $("#tomo").removeClass('has-error');
              $("#tomo").addClass('has-success');
     }
     if (folioSalAuto.value != ""){
             $("#folio").removeClass('has-error');
              $("#folio").addClass('has-success');
     }
}

function mostrar(){

__('autSalAuto').disabled=false;
__('oficialSalAuto').disabled=false;
__('fecSalAuto').disabled=false;
__('oficioSalAuto').disabled=false;
__('tomoSalAuto').disabled=false;
__('folioSalAuto').disabled=false;
$("#btnGuardarEditSalAuto").show();

}

window.onload= function(){
  var btnGuardarEditSalAuto= __('btnGuardarEditSalAuto');
  var btnEditarSalAuto= __('btnEditarSalAuto');

btnGuardarEditSalAuto.addEventListener("click", editarSalidaAuto);
btnEditarSalAuto.addEventListener("click", mostrar);

}
