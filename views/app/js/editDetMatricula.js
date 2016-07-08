function registroMatricula() {
  var connect, form, response, result, numConsecutivo, estado, numBoletaMatricula,
  fecBoleta, numPlaca,  tomEntMatricula, folEntMatricula, ofiDetMatricula, ofiRecMatricula;
// Parametros capturados del formulario

  numConsecutivo= __('numConsecutivo');
  estado= __('estado');
  numBoletaMatricula= __('numBoletaMatricula');
  fecBoleta= __('fecBoleta');
  numPlaca= __('numPlaca');
  tomEntMatricula= __('tomEntMatricula');
  folEntMatricula= __('folEntMatricula');
  ofiDetMatricula= __('ofiDetMatricula');
  ofiRecMatricula= __('ofiRecMatricula');

  //************** Se abre la conexion, si todo esta bien
      form ='numConsecutivo=' + numConsecutivo.value +
      '&estado=' + estado.value +
      '&numBoletaMatricula=' + numBoletaMatricula.value +
      '&fecBoleta=' +  fecBoleta.value +
      '&numPlaca=' + numPlaca.value +
      '&tomEntMatricula=' + tomEntMatricula.value +
      '&folEntMatricula=' + folEntMatricula.value +
      '&ofiDetMatricula=' + ofiDetMatricula.value +
      '&ofiRecMatricula=' + ofiRecMatricula.value;

  if(numBoletaMatricula.value == ""){
          alert("El campo número de boleta es requerido");
          numBoletaMatricula.focus();
          $("#boleta").addClass('has-error');
       }else if (fecBoleta.value == ""){
           alert("El campo fecha de la boleta es requerido");
          fecBoleta.focus();
            $("#fecboleta").addClass('has-error');
     }else if (numPlaca.value == ""){
         alert("El campo placa es requerido");
        numPlaca.focus();
          $("#placa").addClass('has-error');
   }else if (tomEntMatricula.value == ""){
    alert("El campo tomo es requerido");
   tomEntMatricula.focus();
     $("#tomo").addClass('has-error');
  }else if (folEntMatricula.value == ""){
    alert("El campo folio es requerido");
   folEntMatricula.focus();
     $("#folio").addClass('has-error');
  }else if (ofiDetMatricula.value == ""){
    alert("El campo código de oficial que detiene es requerido");
   ofiDetMatricula.focus();
     $("#oDetiene").addClass('has-error');
  }else if (ofiRecMatricula.value == ""){
    alert("El campo código de oficial que recibe es requerido");
   ofiRecMatricula.focus();
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
    if(connect.readyState == 4 && connect.status == 200) { //Revisa el estado de la conexión con ajax
      if(connect.responseText == 1) {

        result = '<div class="alert alert-dismissible alert-success">';
        result += '<h4>Actualización completada !</h4>';
        result += '</div>';
        __('_AJAX_Matricula_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_Matricula_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Registrando datos...</strong></p>';
      result += '</div>';
      __('_AJAX_Matricula_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=editMatricula',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

}
}


function datosCorrectos(){
     if (numBoletaMatricula.value != ""){
           $("#boleta").removeClass('has-error');
            $("#boleta").addClass('has-success');
     }
     if (fecBoleta.value != ""){
            $("#fecboleta").removeClass('has-error');
             $("#fecboleta").addClass('has-success');
     }
     if (numPlaca.value != ""){
             $("#placa").removeClass('has-error');
              $("#placa").addClass('has-success');
     }
     if (tomEntMatricula.value != ""){
             $("#tomo").removeClass('has-error');
              $("#tomo").addClass('has-success');
     }
     if (folEntMatricula.value != ""){
             $("#folio").removeClass('has-error');
              $("#folio").addClass('has-success');
     }
     if (ofiDetMatricula.value != ""){
             $("#oDetiene").removeClass('has-error');
              $("#oDetiene").addClass('has-success');
     }
     if (ofiRecMatricula.value != ""){
             $("#oRecibe").removeClass('has-error');
              $("#oRecibe").addClass('has-success');
     }


}


window.onload= function(){

  var btnActualizar= __('btnActualizar');


  btnActualizar.addEventListener("click", registroMatricula);

};
