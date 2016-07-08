function editarAuto() {
  var connect, form, response, result, numConsecutivo, numConsecutivoD, estado,
  numBoletaAuto, identAuto, llaveAuto, marcaAuto, colorAuto, obsAuto;

// Parametros capturados del formulario
  numConsecutivo= __('numConsecutivo');
  numConsecutivoD= __('numConsecutivoD');
  estado= __('estado');
  numBoletaAuto= __('numBoletaAuto');
  identAuto= __('identAuto');
  llaveAuto= __('llaveAuto');
  marcaAuto= __('marcaAuto');
  colorAuto= __('colorAuto');
  obsAuto= __('obsAuto');


  //************** Se abre la conexion, si todo esta bien
      form ='numConsecutivo=' + numConsecutivo.value +
      '&numConsecutivoD=' + numConsecutivoD.value +
      '&estado=' + estado.value +
      '&numBoletaAuto=' + numBoletaAuto.value +
      '&identAuto=' + identAuto.value +
      '&llaveAuto=' + llaveAuto.value +
      '&marcaAuto=' + marcaAuto.value +
      '&colorAuto=' + colorAuto.value +
      '&obsAuto=' + obsAuto.value;

      if(identAuto.value == ""){
              alert("El campo placa, vin, motor u otro es requerido");
              identAuto.focus();
              $("#IdAuto").addClass('has-error');
           }else if (llaveAuto.value == ""){
               alert("El campo número de llave es requerido");
            llaveAuto.focus();
                $("#llave").addClass('has-error');
         }else if (marcaAuto.value == ""){
               alert("El campo marca es requerido");
            marcaAuto.focus();
                $("#marca").addClass('has-error');
         }else if (colorAuto.value == ""){
             alert("El campo color es requerido");
          colorAuto.focus();
              $("#color").addClass('has-error');
       }
      else{

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
        __('_AJAX_editAuto_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_editAuto_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Registrando datos...</strong></p>';
      result += '</div>';
      __('_AJAX_editAuto_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=editarAuto',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax
}
}

function datosCorrectos(){
     if (identAuto.value != ""){
             $("#IdAuto").removeClass('has-error');
              $("#IdAuto").addClass('has-success');
     }
     if (llaveAuto.value != ""){
             $("#llave").removeClass('has-error');
              $("#llave").addClass('has-success');
     }
     if (marcaAuto.value != ""){
             $("#marca").removeClass('has-error');
              $("#marca").addClass('has-success');
     }
     if (colorAuto.value != ""){
             $("#color").removeClass('has-error');
              $("#color").addClass('has-success');
     }
     if (obsAuto.value != ""){
             $("#observacion").removeClass('has-error');
              $("#observacion").addClass('has-success');
     }

}

function mostrar(){

__('identAuto').disabled=false;
__('llaveAuto').disabled=false;
__('marcaAuto').disabled=false;
__('colorAuto').disabled=false;
__('obsAuto').disabled=false;
$("#btnGuardarAuto").show();

}

window.onload= function(){

  var btnGuardarAuto= __('btnGuardarAuto');
  var btnEditarAuto= __('btnEditarAuto');

  btnGuardarAuto.addEventListener("click",  editarAuto);
  btnEditarAuto.addEventListener("click", mostrar);
};
