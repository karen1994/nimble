function editarAlcoholimetro(){
  var connect, form, response, result, consecutivo, numPatrimonio, numUltimaPrueba, Observaciones;
  //Parametros capturados del formulario de HTML

  consecutivo= __('consecutivo');
  EstaServicioAlcoholimetro= __('EstaServicioAlcoholimetro');
  numPatrimonio=  __('numPatrimonio');
  numUltimaPrueba =  __('numUltimaPrueba');
  Observaciones=       __('Observaciones');

  if(numPatrimonio.value == ""){
    alert("El campo número de patrimonio es requerido");
    numPatrimonio.focus();
    $("#Patrimonio").addClass('has-error');
  }else if(numUltimaPrueba.value == ""){
    alert("El campo número de última prueba es requerido");
    numUltimaPrueba.focus();
    $("#ultimaPrueba").addClass('has-error');
  }else{

  //************** Se abre la conexion, si todo esta bien
     form = 'consecutivo='+ consecutivo.value +
     '&EstaServicioAlcoholimetro=' + EstaServicioAlcoholimetro.value +
     '&numPatrimonio=' + numPatrimonio.value +
     '&numUltimaPrueba=' + numUltimaPrueba.value  +
     '&Observaciones=' + Observaciones.value;

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
        result += '<h4>Actualizacion Completada !</h4>';
         result += '</div>';
        __('_AJAX_EditAlcoholimetro_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_EditAlcoholimetro_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Actualizando Datos...</strong></p>';
      result += '</div>';
      __('_AJAX_EditAlcoholimetro_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=editAlcoholimetro',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

}
}

function validaciones(){
  if(numPatrimonio.value != ""){
       $("#Patrimonio").removeClass('has-error');
       $("#Patrimonio").addClass('has-success');
  } if (numUltimaPrueba.value != ""){
       $("#ultimaPrueba").removeClass('has-error');
        $("#ultimaPrueba").addClass('has-success');
   }
}


window.onload = function(){
    var btnEditAlcoholimetro=__('btnEditAlcoholimetro');
    btnEditAlcoholimetro.addEventListener("click",editarAlcoholimetro);

}
