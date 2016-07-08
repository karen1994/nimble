function editarSalidaMatricula() {
  var connect, form, response, result, numConsecutivo, estado, oficioSalMatricula, fecSalMatricula,
  tomSalMatricula, folSalMatricula, nomPerCorreo, ape1PerCorreo, ape2PerCorreo;
  //Parametros capturados del formulario de HTML
  numConsecutivo= __('numConsecutivo');
  estado= __('estado');
  oficioSalMatricula= __('oficioSalMatricula');
  fecSalMatricula= __('fecSalMatricula');
  tomSalMatricula= __('tomSalMatricula');
  folSalMatricula= __('folSalMatricula');
  nomPerCorreo= __('nomPerCorreo');
  ape1PerCorreo= __('ape1PerCorreo');
  ape2PerCorreo= __('ape2PerCorreo');

      form = 'numConsecutivo=' + numConsecutivo.value +
       '&estado=' + estado.value +
       '&oficioSalMatricula=' + oficioSalMatricula.value +
       '&fecSalMatricula=' + fecSalMatricula.value +
       '&tomSalMatricula=' + tomSalMatricula.value +
       '&folSalMatricula=' + folSalMatricula.value +
       '&nomPerCorreo=' + nomPerCorreo.value +
       '&ape1PerCorreo=' + ape1PerCorreo.value +
       '&ape2PerCorreo=' + ape2PerCorreo.value;

       if(oficioSalMatricula.value == ""){
               alert("El campo número de oficio es requerido");
               oficioSalMatricula.focus();
               $("#oficMa").addClass('has-error');
            }else if (fecSalMatricula.value == ""){
              alert("El campo fecha de salida es requerido");
             fecSalMatricula.focus();
               $("#fecSaMa").addClass('has-error');
        }else if (tomSalMatricula.value == ""){
          alert("El campo tomo es requerido");
         tomSalMatricula.focus();
           $("#tomMa").addClass('has-error');
    }else if (folSalMatricula.value == ""){
      alert("El campo folio es requerido");
     folSalMatricula.focus();
       $("#folMa").addClass('has-error');
 }else if (nomPerCorreo.value == ""){
   alert("El campo nombre de persona del correo es requerido");
  nomPerCorreo.focus();
    $("#nomPeCoMa").addClass('has-error');
}else if (ape1PerCorreo.value == ""){
  alert("El campo primer apellido de persona del correo es requerido");
 ape1PerCorreo.focus();
   $("#ape1PeCoMa").addClass('has-error');
}else if (ape2PerCorreo.value == ""){
  alert("El campo segundo apellido de persona del correo es requerido");
 ape2PerCorreo.focus();
   $("#ape2PeCoMa").addClass('has-error');
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
                  __('_AJAX_editSMatricula_').innerHTML = result;
                  location.reload();
                } else {
                  __('_AJAX_editSMatricula_').innerHTML = connect.responseText; //Se muestran los errores
                }
              } else if(connect.readyState != 4) {
                  //Muestra mensaje de procesamiento.
                result = '<div class="alert alert-dismissible alert-warning">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>Procesando...</h4>';
                result += '<p><strong>Registrando datos...</strong></p>';
                result += '</div>';
                __('_AJAX_editSMatricula_').innerHTML = result;
              }
  }
  connect.open('POST','ajax.php?mode=editSalMatricula',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax
}
}

function datosCorrectos(){
     if (oficioSalMatricula.value != ""){
           $("#oficMa").removeClass('has-error');
            $("#oficMa").addClass('has-success');
     }
     if (fecSalMatricula.value != ""){
             $("#fecSaMa").removeClass('has-error');
              $("#fecSaMa").addClass('has-success');
     }
     if (tomSalMatricula.value != ""){
             $("#tomMa").removeClass('has-error');
              $("#tomMa").addClass('has-success');
     }
     if (folSalMatricula.value != ""){
             $("#folMa").removeClass('has-error');
              $("#folMa").addClass('has-success');
     }
     if (nomPerCorreo.value != ""){
             $("#nomPeCoMa").removeClass('has-error');
              $("#nomPeCoMa").addClass('has-success');
     }
     if (ape1PerCorreo.value != ""){
             $("#ape1PeCoMa").removeClass('has-error');
              $("#ape1PeCoMa").addClass('has-success');
     }
     if (ape2PerCorreo.value != ""){
             $("#ape2PeCoMa").removeClass('has-error');
              $("#ape2PeCoMa").addClass('has-success');
     }

}

function mostrar(){

__('oficioSalMatricula').disabled=false;
__('fecSalMatricula').disabled=false;
__('tomSalMatricula').disabled=false;
__('folSalMatricula').disabled=false;
__('nomPerCorreo').disabled=false;
__('ape1PerCorreo').disabled=false;
__('ape2PerCorreo').disabled=false;
$("#btnGuardarSMatricula").show();

}

window.onload= function(){
  var btnGuardarSMatricula= __('btnGuardarSMatricula');
  var btnEditarSMatricula= __('btnEditarSMatricula');

btnGuardarSMatricula.addEventListener("click", editarSalidaMatricula);
btnEditarSMatricula.addEventListener("click", mostrar);

}
