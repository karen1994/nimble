function editarPersonaSalMoto() {
  var connect, form, response, result, numConsecutivo, cedPersona, nomPersona, ape1,ape2;

// Parametros capturados del formulario

  numConsecutivo= __('numConsecutivo');
  cedPersona= __('cedPersona');
  nomPersona= __('nomPersona');
  ape1= __('ape1');
  ape2= __('ape2');


  //************** Se abre la conexion, si todo esta bien
      form ='numConsecutivo=' + numConsecutivo.value +
      '&cedPersona=' + cedPersona.value +
      '&nomPersona=' + nomPersona.value +
      '&ape1=' + ape1.value +
      '&ape2=' + ape2.value;

      if(cedPersona.value == ""){
              alert("El campo identificación es requerido");
              cedPersona.focus();
              $("#identPe").addClass('has-error');
           }else if (nomPersona.value == ""){
             alert("El campo nombre es requerido");
            nomPersona.focus();
              $("#nomPe").addClass('has-error');
       }else if (ape1.value == ""){
         alert("El campo primer apellido es requerido");
        ape1.focus();
          $("#ape1Pe").addClass('has-error');
    }else if (ape2.value == ""){
     alert("El campo segundo apellido es requerido");
    ape2.focus();
      $("#ape2Pe").addClass('has-error');
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
        __('_AJAX_PersonaSalMoto_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_PersonaSalMoto_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Registrando datos...</strong></p>';
      result += '</div>';
      __('_AJAX_PersonaSalMoto_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=editPeSalMoto',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax
}
}

function datosCorrectos(){
     if (cedPersona.value != ""){
           $("#identPe").removeClass('has-error');
            $("#identPe").addClass('has-success');
     }
     if (nomPersona.value != ""){
             $("#nomPe").removeClass('has-error');
              $("#nomPe").addClass('has-success');
     }
     if (ape1.value != ""){
             $("#ape1Pe").removeClass('has-error');
              $("#ape1Pe").addClass('has-success');
     }
     if (ape2.value != ""){
             $("#ape2Pe").removeClass('has-error');
              $("#ape2Pe").addClass('has-success');
     }

}


function mostrar(){

__('cedPersona').disabled=false;
__('nomPersona').disabled=false;
__('ape1').disabled=false;
__('ape2').disabled=false;
$("#btnGuardarPersonaMoto").show();

}

window.onload= function(){

  var btnGuardarPersonaMoto= __('btnGuardarPersonaMoto');
  var btnEditarPersonaMoto= __('btnEditarPersonaMoto');

btnGuardarPersonaMoto.addEventListener("click", editarPersonaSalMoto);
btnEditarPersonaMoto.addEventListener("click", mostrar);

};
