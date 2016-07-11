//Función donde se guardarn los datos validados por las funciones anteriores
function editarDetencionMoto() {
  var connect, form, response, result, numConsecutivo, numConsecutivoM, numBoletaDetencion,
  fecBoletaDetencion, identMoto,  tomEntDetencion, folEntDetencion, ofiDetMoto, ofiRecMoto;
// Parametros capturados del formulario
  numConsecutivo= __('numConsecutivo');
  numConsecutivoM= __('numConsecutivoM');
  estado= __('estado');
  numBoletaDetencion= __('numBoletaDetencion');
  fecBoletaDetencion= __('fecBoletaDetencion');
  identMoto= __('identMoto');
  tomEntDetencion= __('tomEntDetencion');
  folEntDetencion= __('folEntDetencion');
  ofiDetMoto= __('ofiDetMoto');
  ofiRecMoto= __('ofiRecMoto');
  //Se abre la conexion, si todo esta bien
      form ='numConsecutivo=' + numConsecutivo.value +
      '&numConsecutivoM=' + numConsecutivoM.value +
      '&numBoletaDetencion=' + numBoletaDetencion.value +
      '&fecBoletaDetencion=' +  fecBoletaDetencion.value +
      '&identMoto=' + identMoto.value +
      '&tomEntDetencion=' + tomEntDetencion.value +
      '&folEntDetencion=' + folEntDetencion.value +
      '&ofiDetMoto=' + ofiDetMoto.value +
      '&ofiRecMoto=' + ofiRecMoto.value;
      //Valida los campos de los formularios
      //Formulario editar detención
      if(numBoletaDetencion.value == ""){
              alert("El campo número de boleta es requerido");
              numBoletaDetencion.focus();
              $("#boleta").addClass('has-error');
           }else if (fecBoletaDetencion.value == ""){
               alert("El campo fecha de boleta es requerido");
            fecBoletaDetencion.focus();
                $("#fechaBoleta").addClass('has-error');
         }else if (identMoto.value == ""){
             alert("El campo placa, motor, marco u otro es requerido");
          identMoto.focus();
              $("#IdMoto").addClass('has-error');
       }else if (tomEntDetencion.value == ""){
           alert("El campo tomo es requerido");
        tomEntDetencion.focus();
            $("#tomo").addClass('has-error');
      }else if (folEntDetencion.value == ""){
         alert("El campo folio es requerido");
      folEntDetencion.focus();
          $("#folio").addClass('has-error');
      }else if (ofiDetMoto.value == ""){
        alert("El campo código del oficial que detiene es requerido");
      ofiDetMoto.focus();
         $("#oDetiene").addClass('has-error');
      }else if (ofiRecMoto.value == ""){
        alert("El campo código del oficial que recibe es requerido");
      ofiRecMoto.focus();
         $("#oRecibe").addClass('has-error');
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


    //Revisa el estado de la conexión con ajax
    if(connect.readyState == 4 && connect.status == 200) {
      if(connect.responseText == 1) {

        result = '<div class="alert alert-dismissible alert-success">';
        result += '<h4>Actualización completada !</h4>';
        result += '</div>';
        __('_AJAX_Detencion_Moto_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_Detencion_Moto_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Registrando datos...</strong></p>';
      result += '</div>';
      __('_AJAX_Detencion_Moto_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=editarDetencionMoto',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax
}
}

//Función que identifica los campos con colores
function datosCorrectos(){
     if (numBoletaDetencion.value != ""){
           $("#boleta").removeClass('has-error');
            $("#boleta").addClass('has-success');
     }
     if (fecBoletaDetencion.value != ""){
            $("#fechaBoleta").removeClass('has-error');
             $("#fechaBoleta").addClass('has-success');
     }
     if (identMoto.value != ""){
             $("#IdMoto").removeClass('has-error');
              $("#IdMoto").addClass('has-success');
     }
     if (tomEntDetencion.value != ""){
             $("#tomo").removeClass('has-error');
              $("#tomo").addClass('has-success');
     }
     if (folEntDetencion.value != ""){
             $("#folio").removeClass('has-error');
              $("#folio").addClass('has-success');
     }
     if (ofiDetMoto.value != ""){
             $("#oDetiene").removeClass('has-error');
              $("#oDetiene").addClass('has-success');
     }
     if (ofiRecMoto.value != ""){
             $("#oRecibe").removeClass('has-error');
              $("#oRecibe").addClass('has-success');
     }
                        }

window.onload= function(){
  //Valida cada formulario de una manera ordenada
  //EL boton guardar finalmente guarda todos los datos ya validados.
  var btnActualizar= __('btnActualizar');

  //Llamadas a las funciones
  btnActualizar.addEventListener("click", editarDetencionMoto);
};
