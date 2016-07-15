function editarSalidaMoto() {
  var connect, form, response, result, numConsecutivo, autSalMoto, oficialSalMoto, fecSalMoto,
  oficioSalMoto, tomoSalMoto, folioSalMoto;
  //Parametros capturados del formulario de HTML
  numConsecutivo= __('numConsecutivo');
  autSalMoto= __('autSalMoto');
  oficialSalMoto= __('oficialSalMoto');
  fecSalMoto= __('fecSalMoto');
  oficioSalMoto= __('oficioSalMoto');
  tomoSalMoto= __('tomoSalMoto');
  folioSalMoto= __('folioSalMoto');


      form = 'numConsecutivo=' + numConsecutivo.value +
       '&autSalMoto=' + autSalMoto.value +
       '&oficialSalMoto=' + oficialSalMoto.value +
       '&fecSalMoto=' + fecSalMoto.value +
       '&oficioSalMoto=' + oficioSalMoto.value +
       '&tomoSalMoto=' + tomoSalMoto.value +
       '&folioSalMoto=' + folioSalMoto.value;

       if(autSalMoto.value == ""){
               alert("El campo autoridad que entrega es requerido");
               autSalMoto.focus();
               $("#autEnt").addClass('has-error');
            }else if (oficialSalMoto.value == ""){
                alert("El campo código del oficial que entrega es requerido");
             oficialSalMoto.focus();
                 $("#ofiEnt").addClass('has-error');
          }else if (fecSalMoto.value == ""){
              alert("El campo fecha de entrega es requerido");
           fecSalMoto.focus();
               $("#fecEntr").addClass('has-error');
        }else if (oficioSalMoto.value == ""){
            alert("El campo número de oficio es requerido");
         oficioSalMoto.focus();
             $("#oficio").addClass('has-error');
      }else if (tomoSalMoto.value == ""){
          alert("El campo tomo es requerido");
       tomoSalMoto.focus();
           $("#tomo").addClass('has-error');
     }else if (folioSalMoto.value == ""){
         alert("El campo folio es requerido");
      folioSalMoto.focus();
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
                  __('_AJAX_EditSalMoto_').innerHTML = result;
                  location.reload();
                } else {
                  __('_AJAX_EditSalMoto_').innerHTML = connect.responseText; //Se muestran los errores
                }
              } else if(connect.readyState != 4) {
                  //Muestra mensaje de procesamiento.
                result = '<div class="alert alert-dismissible alert-warning">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>Procesando...</h4>';
                result += '<p><strong>Registrando datos...</strong></p>';
                result += '</div>';
                __('_AJAX_EditSalMoto_').innerHTML = result;
              }
  }
  connect.open('POST','ajax.php?mode=editSalMoto',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax
}
}

function datosCorrectos(){

     if (autSalMoto.value != ""){
           $("#autEnt").removeClass('has-error');
            $("#autEnt").addClass('has-success');
     }
     if (oficialSalMoto.value != ""){
            $("#ofiEnt").removeClass('has-error');
             $("#ofiEnt").addClass('has-success');
     }
     if (fecSalMoto.value != ""){
             $("#fecEntr").removeClass('has-error');
              $("#fecEntr").addClass('has-success');
     }
     if (oficioSalMoto.value != ""){
             $("#oficio").removeClass('has-error');
              $("#oficio").addClass('has-success');
     }
     if (tomoSalMoto.value != ""){
             $("#tomo").removeClass('has-error');
              $("#tomo").addClass('has-success');
     }
     if (folioSalMoto.value != ""){
             $("#folio").removeClass('has-error');
              $("#folio").addClass('has-success');
     }
}


function mostrar(){

__('autSalMoto').disabled=false;
__('oficialSalMoto').disabled=false;
__('fecSalMoto').disabled=false;
__('oficioSalMoto').disabled=false;
__('tomoSalMoto').disabled=false;
__('folioSalMoto').disabled=false;
$("#btnGuardarEditSalMoto").show();

}

window.onload= function(){
  var btnGuardarEditSalMoto= __('btnGuardarEditSalMoto');
  var btnEditarSalMoto= __('btnEditarSalMoto');

btnGuardarEditSalMoto.addEventListener("click", editarSalidaMoto);
btnEditarSalMoto.addEventListener("click", mostrar);

}
