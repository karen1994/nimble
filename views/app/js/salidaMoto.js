function salidaMoto() {
  var connect, form, response, result, numConsecutivo, numConsecutivoDet, placaSalMoto,
  autoridadSalMoto, oficEntSalMoto, fecSalMoto, oficioSalMoto, tomoSalMoto, folioSalMoto,
  cedPersona, nomPersona, ape1Persona, ape2Persona;

  //Parametros capturados del formulario de HTML
  numConsecutivo= __('numConsecutivo').value;
  numConsecutivoDet= __('numConsecutivoDet').value;
  placaSalMoto= __('placaSalMoto').value;
  autoridadSalMoto= __('autoridadSalMoto').value;
  oficEntSalMoto= __('oficEntSalMoto').value;
  fecSalMoto= __('fecSalMoto').value;
  oficioSalMoto= __('oficioSalMoto').value;
  tomoSalMoto= __('tomoSalMoto').value;
  folioSalMoto= __('folioSalMoto').value;
  cedPersona= __('cedPersona').value;
  nomPersona= __('nomPersona').value;
  ape1Persona= __('ape1Persona').value;
  ape2Persona= __('ape2Persona').value;

      form = 'numConsecutivo=' + numConsecutivo +
      '&numConsecutivoDet=' + numConsecutivoDet +
      '&placaSalMoto=' + placaSalMoto +
      '&autoridadSalMoto=' + autoridadSalMoto +
      '&oficEntSalMoto=' + oficEntSalMoto +
      '&fecSalMoto=' + fecSalMoto +
      '&oficioSalMoto=' + oficioSalMoto +
      '&tomoSalMoto=' + tomoSalMoto +
      '&folioSalMoto=' + folioSalMoto +
      '&cedPersona=' + cedPersona +
      '&nomPersona=' + nomPersona +
      '&ape1Persona=' + ape1Persona +
      '&ape2Persona=' + ape2Persona;

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
        result += '<h4> Registro completado!</h4>';
        result += '</div>';
        __('_AJAX_SalMoto_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_SalMoto_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {

        //Muestra mensaje de procesamiento.
        result = '<div class="alert alert-dismissible alert-warning">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Procesando...</h4>';
        result += '<p><strong>Registrando Datos...</strong></p>';
        result += '</div>';

      __('_AJAX_SalMoto_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=salidaMoto',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

}

function validarForm1(){
$("#secPersonaSalidaMoto").show();
$("#secSalidaMoto").hide();

}

function validarForm2(){
$("#btnGuardarDiv").show();
}

function regresar3(){
  $("#secSalidaMoto").show();
  $("#secPersonaSalidaMoto").hide();
}



window.onload= function(){
  var btnGuardarSalMoto = __('btnGuardarSalMoto');
  var Terminar1= __('Terminar1');
  var Terminar2 = __('Terminar2');
  var regresar= __('regresar');

  btnGuardarSalMoto.addEventListener("click", salidaMoto);
  Terminar1.addEventListener("click", validarForm1);
  Terminar2.addEventListener("click", validarForm2);
  regresar.addEventListener("click", regresar3);

}
