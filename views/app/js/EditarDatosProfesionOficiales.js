function EditarProfesion(){
  var connect, form, response, result, numConsecutivo, IngresoDele, NombraOficial, NombrePuesto, CodigoOficial;
  //Parametros capturados del formulario de HTML


numConsecutivo=__('numConsecutivo');
IngresoDele= __('IngresoDele');
NombraOficial= __('NombraOficial');
NombrePuesto= __('NombrePuesto');
CodigoOficial= __('CodigoOficial');

if(IngresoDele.value == ""){
  alert("El campo ingreso a la delegacion es requerido");
  IngresoDele.focus();
  $("#ingreso").addClass('has-error');
}else if(NombraOficial.value == ""){
  alert("El campo nombramiento oficial es requerido");
  NombraOficial.focus();
  $("#nombOfic").addClass('has-error');
}else if(NombrePuesto.value == ""){
  alert("El campo nombre del puesto es requerido");
  NombrePuesto.focus();
  $("#NomPuesto").addClass('has-error');
}else if(CodigoOficial.value == ""){
  alert("El campo codigo del oficial es requerido");
  CodigoOficial.focus();
  $("#CodOfic").addClass('has-error');
}else{


  /*alert("Datos enviados"+ idnumPatrimonio + numUltimaPrueba  + estadoAlcoholimetro +
        observaciones  + estadoServicioalcoh );*/
        //************** Se abre la conexion, si todo esta bien
     form =  'numConsecutivo=' + numConsecutivo.value + '&IngresoDele=' + IngresoDele.value +
    '&NombraOficial=' + NombraOficial.value + '&NombrePuesto=' + NombrePuesto.value +
    '&CodigoOficial='+ CodigoOficial.value;

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
        __('_AJAX_Oficiales_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_Oficiales_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Actualizando Datos...</strong></p>';
      result += '</div>';
      __('_AJAX_Oficiales_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=EditarProfesion',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

 //Boton del Registro

}
}
function validaciones(){
  if(IngresoDele.value != ""){
       $("#ingreso").removeClass('has-error');
       $("#ingreso").addClass('has-success');
  } if (NombraOficial.value != ""){
       $("#nombOfic").removeClass('has-error');
        $("#nombOfic").addClass('has-success');
   }if (NombrePuesto.value != ""){
        $("#NomPuesto").removeClass('has-error');
         $("#NomPuesto").addClass('has-success');
    }if (CodigoOficial.value != ""){
         $("#CodOfic").removeClass('has-error');
          $("#CodOfic").addClass('has-success');
     }
}


window.onload = function(){
    var btnEditarProfesion=__('btnEditarProfesion');
   btnEditarProfesion.addEventListener("click",EditarProfesion);

}
