function salidaAuto() {
  var connect, form, response, result, numConsecutivo, numConsecutivoDet, identAuto, autoridadSalAuto,
  oficEntSalAuto, fecSalAuto, oficioSalAuto, tomoSalAuto, folioSalAuto, cedPersona, nomPersona, ape1Persona,
   ape2Persona;

  //Parametros capturados del formulario de HTML
  numConsecutivo= __('numConsecutivo').value;
  numConsecutivoDet= __('numConsecutivoDet').value;
  identAuto= __('identAuto').value;
  autoridadSalAuto= __('autoridadSalAuto').value;
  oficEntSalAuto= __('oficEntSalAuto').value;
  fecSalAuto= __('fecSalAuto').value;
  oficioSalAuto= __('oficioSalAuto').value;
  tomoSalAuto= __('tomoSalAuto').value;
  folioSalAuto= __('folioSalAuto').value;
  cedPersona= __('cedPersona').value;
  nomPersona= __('nomPersona').value;
  ape1Persona= __('ape1Persona').value;
  ape2Persona= __('ape2Persona').value;

      form = 'numConsecutivo=' + numConsecutivo +
      '&numConsecutivoDet=' + numConsecutivoDet +
      '&identAuto=' + identAuto +
      '&autoridadSalAuto=' + autoridadSalAuto +
      '&oficEntSalAuto=' + oficEntSalAuto +
      '&fecSalAuto=' + fecSalAuto +
      '&oficioSalAuto=' + oficioSalAuto +
      '&tomoSalAuto=' + tomoSalAuto +
      '&folioSalAuto=' + folioSalAuto +
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
        result += '<h4> Registro completado !</h4>';
        result += '</div>';
        __('_AJAX_SalAuto_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_SalAuto_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {

        //Muestra mensaje de procesamiento.
        result = '<div class="alert alert-dismissible alert-warning">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Procesando...</h4>';
        result += '<p><strong>Registrando datos...</strong></p>';
        result += '</div>';

      __('_AJAX_SalAuto_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=salidaAuto',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

}

function datosCorrectos(){

     if (autoridadSalAuto.value != ""){
           $("#autEnt").removeClass('has-error');
            $("#autEnt").addClass('has-success');
     }
     if (oficEntSalAuto.value != ""){
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
     if(cedPersona.value != ""){
             $("#identPe").removeClass('has-error');
             $("#identPe").addClass('has-success');
        }
        if (nomPersona.value != ""){
            $("#nomPe").removeClass('has-error');
             $("#nomPe").addClass('has-success');
        }
       if (ape1Persona.value != ""){
            $("#ape1Pe").removeClass('has-error');
             $("#ape1Pe").addClass('has-success');
        }
        if (ape2Persona.value != ""){
             $("#ape2Pe").removeClass('has-error');
              $("#ape2Pe").addClass('has-success');
        }

}


function validarForm1(){
  if(autoridadSalAuto.value == ""){
          alert("El campo autoridad que entrega es requerido");
          autoridadSalAuto.focus();
          $("#autEnt").addClass('has-error');
       }else if (oficEntSalAuto.value == ""){
           alert("El campo código del oficial que entrega es requerido");
        oficEntSalAuto.focus();
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
$("#secPersonaSalida").show();
$("#secSalida").hide();
}
}

function validarForm2(){
  if(cedPersona.value == ""){
        alert("El campo identificación es requerido");
        cedPersona.focus();
        $("#identPe").addClass('has-error');
     }else if (nomPersona.value == ""){
       alert("El campo nombre es requerido");
      nomPersona.focus();
        $("#nomPe").addClass('has-error');
 }else if (ape1Persona.value == ""){
   alert("El campo primer apellido es requerido");
  ape1Persona.focus();
    $("#ape1Pe").addClass('has-error');
}else if (ape2Persona.value == ""){
alert("El campo segundo apellido es requerido");
ape2Persona.focus();
$("#ape2Pe").addClass('has-error');
}else{
$("#btnGuardarDiv").show();
}
}

function regresar3(){
  $("#secSalida").show();
  $("#secPersonaSalida").hide();
}



window.onload= function(){
  var btnGuardarSalAuto = __('btnGuardarSalAuto');
  var Terminar1= __('Terminar1');
  var Terminar2 = __('Terminar2');
  var regresar= __('regresar');

  btnGuardarSalAuto.addEventListener("click", salidaAuto);
  Terminar1.addEventListener("click", validarForm1);
  Terminar2.addEventListener("click", validarForm2);
  regresar.addEventListener("click", regresar3);

}
