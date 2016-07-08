function editarPlaca() {
  var connect, form, response, result, numConsecutivo, estado, numBoletaMatricula, numPlaca,
  marcVehiculo, fecDetMatricula, horDetMatricula, obsMatricula;
// Parametros capturados del formulario

  numConsecutivo= __('numConsecutivo');
  estado= __('estado');
  numBoletaMatricula= __('numBoletaMatricula');
  numPlaca= __('numPlaca');
  marcVehiculo= __('marcVehiculo');
  fecDetMatricula= __('fecDetMatricula');
  horDetMatricula= __('horDetMatricula');
  obsMatricula= __('obsMatricula');


  //************** Se abre la conexion, si todo esta bien
      form ='numConsecutivo=' + numConsecutivo.value +
      '&estado=' + estado.value +
      '&numBoletaMatricula=' + numBoletaMatricula.value +
      '&numPlaca=' + numPlaca.value +
      '&marcVehiculo=' + marcVehiculo.value +
      '&fecDetMatricula=' + fecDetMatricula.value +
      '&horDetMatricula=' + horDetMatricula.value +
      '&obsMatricula=' + obsMatricula.value;

      if(numBoletaMatricula.value == ""){
              alert("El campo número de boleta es requerido");
              numBoletaMatricula.focus();
              $("#boletaMa").addClass('has-error');
           }else if (numPlaca.value == ""){
             alert("El campo placa es requerido");
            numPlaca.focus();
              $("#placaMa").addClass('has-error');
       }else if (marcVehiculo.value == ""){
        alert("El campo marca del vehìculo es requerido");
       marcVehiculo.focus();
         $("#marcVehMa").addClass('has-error');
      }else if (fecDetMatricula.value == ""){
        alert("El campo fecha de detención es requerido");
       fecDetMatricula.focus();
         $("#fecDetMa").addClass('has-error');
      }else if (horDetMatricula.value == ""){
        alert("El campo hora de detención es requerido");
       horDetMatricula.focus();
         $("#horaDetMa").addClass('has-error');
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
        __('_AJAX_Placa_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_Placa_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Registrando datos...</strong></p>';
      result += '</div>';
      __('_AJAX_Placa_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=editPlaca',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax
}
}

function datosCorrectos(){
     if (numBoletaMatricula.value != ""){
           $("#boletaMa").removeClass('has-error');
            $("#boletaMa").addClass('has-success');
     }
     if (numPlaca.value != ""){
             $("#placaMa").removeClass('has-error');
              $("#placaMa").addClass('has-success');
     }
     if (marcVehiculo.value != ""){
             $("#marcVehMa").removeClass('has-error');
              $("#marcVehMa").addClass('has-success');
     }
     if (fecDetMatricula.value != ""){
             $("#fecDetMa").removeClass('has-error');
              $("#fecDetMa").addClass('has-success');
     }
     if (horDetMatricula.value != ""){
             $("#horaDetMa").removeClass('has-error');
              $("#horaDetMa").addClass('has-success');
     }
     if (obsMatricula.value != ""){
             $("#observMa").removeClass('has-error');
              $("#observMa").addClass('has-success');
     }


}

function mostrar(){

__('numPlaca').disabled=false;
__('marcVehiculo').disabled=false;
__('fecDetMatricula').disabled=false;
__('horDetMatricula').disabled=false;
__('obsMatricula').disabled=false;
$("#btnGuardarPlaca").show();

}

window.onload= function(){

  var btnGuardarPlaca= __('btnGuardarPlaca');
  var btnEditarPlaca= __('btnEditarPlaca');

  btnGuardarPlaca.addEventListener("click", editarPlaca);
btnEditarPlaca.addEventListener("click", mostrar);
};
