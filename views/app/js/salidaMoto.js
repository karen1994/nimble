function salidaMoto() {
  var connect, form, response, result, numConsecutivo, numConsecutivoDet, identMoto,
  autoridadSalMoto, oficEntSalMoto, fecSalMoto, oficioSalMoto, tomoSalMoto, folioSalMoto,
  cedPersona, nomPersona, ape1Persona, ape2Persona;

  //Parametros capturados del formulario de HTML
  numConsecutivo= __('numConsecutivo').value;
  numConsecutivoDet= __('numConsecutivoDet').value;
  identMoto= __('identMoto').value;
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
      '&identMoto=' + identMoto +
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
        result += '<h4> Registro completado !</h4>';
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
        result += '<p><strong>Registrando datos...</strong></p>';
        result += '</div>';

      __('_AJAX_SalMoto_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=salidaMoto',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax
}

function datosCorrectos(){

     if (autoridadSalMoto.value != ""){
           $("#autEnt").removeClass('has-error');
            $("#autEnt").addClass('has-success');
     }
     if (oficEntSalMoto.value != ""){
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
  if(autoridadSalMoto.value == ""){
          alert("El campo autoridad que entrega es requerido");
          autoridadSalMoto.focus();
          $("#autEnt").addClass('has-error');
       }else if (oficEntSalMoto.value == ""){
           alert("El campo código del oficial que entrega es requerido");
        oficEntSalMoto.focus();
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
$("#secPersonaSalidaMoto").show();
$("#secSalidaMoto").hide();
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
