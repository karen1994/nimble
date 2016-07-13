function editarMoto() {
  var connect, form, response, result, numConsecutivo, numConsecutivoD, estado,
  numBoletaMoto, identMoto, llaveMoto, marcaMoto, colorMoto, obsMoto;

// Parametros capturados del formulario

  numConsecutivo= __('numConsecutivo');
  numConsecutivoD= __('numConsecutivoD');
  estado= __('estado');
  numBoletaMoto= __('numBoletaMoto');
  identMoto= __('identMoto');
  llaveMoto= __('llaveMoto');
  marcaMoto= __('marcaMoto');
  colorMoto= __('colorMoto');
  obsMoto= __('obsMoto');


  //************** Se abre la conexion, si todo esta bien
      form ='numConsecutivo=' + numConsecutivo.value +
      '&numConsecutivoD=' + numConsecutivoD.value +
      '&estado=' + estado.value +
      '&numBoletaMoto=' + numBoletaMoto.value +
      '&identMoto=' + identMoto.value +
      '&llaveMoto=' + llaveMoto.value +
      '&marcaMoto=' + marcaMoto.value +
      '&colorMoto=' + colorMoto.value +
      '&obsMoto=' + obsMoto.value;

      if(identMoto.value == ""){
              alert("El campo placa, motor, marco u otro es requerido");
              identMoto.focus();
              $("#IdMoto").addClass('has-error');
           }else if (llaveMoto.value == ""){
               alert("El campo número de llave es requerido");
            llaveMoto.focus();
                $("#llave").addClass('has-error');
         }else if (marcaMoto.value == ""){
               alert("El campo marca es requerido");
            marcaMoto.focus();
                $("#marca").addClass('has-error');
         }else if (colorMoto.value == ""){
             alert("El campo color es requerido");
          colorMoto.focus();
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
        __('_AJAX_editMoto_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_editMoto_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Registrando datos...</strong></p>';
      result += '</div>';
      __('_AJAX_editMoto_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=editarMoto',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax
}
}

function datosCorrectos(){
     if (identMoto.value != ""){
             $("#IdMoto").removeClass('has-error');
              $("#IdMoto").addClass('has-success');
     }
     if (llaveMoto.value != ""){
             $("#llave").removeClass('has-error');
              $("#llave").addClass('has-success');
     }
     if (marcaMoto.value != ""){
             $("#marca").removeClass('has-error');
              $("#marca").addClass('has-success');
     }
     if (colorMoto.value != ""){
             $("#color").removeClass('has-error');
              $("#color").addClass('has-success');
     }
     if (obsMoto.value != ""){
             $("#observacion").removeClass('has-error');
              $("#observacion").addClass('has-success');
     }

}

function mostrar(){

__('identMoto').disabled=false;
__('llaveMoto').disabled=false;
__('marcaMoto').disabled=false;
__('colorMoto').disabled=false;
__('obsMoto').disabled=false;
$("#btnGuardarMoto").show();

}

window.onload= function(){

  var btnGuardarMoto= __('btnGuardarMoto');
  var btnEditarMoto= __('btnEditarMoto');

  btnGuardarMoto.addEventListener("click",  editarMoto);
btnEditarMoto.addEventListener("click", mostrar);
};
