function registroVehiculoOficial(){
  var connect, form, response, result,consecutivo,numPlaca,TipoVehiculo,MarcaVehiculo,KmInicial,Observaciones;
  //Parametros capturados del formulario de HTML

  consecutivo= __('consecutivo');
  ServicioVehiculo= __('ServicioVehiculo');
  numPlaca=  __('numPlaca');
  TipoVehiculo =  __('TipoVehiculo');
  MarcaVehiculo = __('MarcaVehiculo');
  KmInicial= __('KmInicial');
  Observaciones= __('Observaciones');

  if(numPlaca.value == ""){
    alert("El campo número de patrimonio es requerido");
    numPlaca.focus();
     $("#numeroPlaca").addClass('has-error');
  }else if(TipoVehiculo.value == ""){
    alert("El campo número de última prueba es requerido");
    TipoVehiculo.focus();
    $("#tipoVehiculo").addClass('has-error');
  }else if(MarcaVehiculo.value == ""){
    alert("El campo número de última prueba es requerido");
    MarcaVehiculo.focus();
    $("#marcaVehiculo").addClass('has-error');
  }else if(KmInicial.value == ""){
    alert("El campo número de última prueba es requerido");
    KmInicial.focus();
    $("#km").addClass('has-error');
  }else{

   //************** Se abre la conexion, si todo esta bien
     form = 'consecutivo=' + consecutivo.value + '&ServicioVehiculo=' + ServicioVehiculo.value + '&numPlaca=' + numPlaca.value + '&TipoVehiculo=' + TipoVehiculo.value +
     '&MarcaVehiculo=' + MarcaVehiculo.value + '&KmInicial=' + KmInicial.value +
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
        __('_AJAX_VehiculoOficial_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_VehiculoOficial_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Actualizando Datos...</strong></p>';
      result += '</div>';
      __('_AJAX_VehiculoOficial_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=editVehiculo',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

 //Boton del Registro
}
}

function validaciones(){
  if(numPlaca.value != ""){
       $("#numeroPlaca").removeClass('has-error');
       $("#numeroPlaca").addClass('has-success');
  } if (TipoVehiculo.value != ""){
       $("#tipoVehiculo").removeClass('has-error');
        $("#tipoVehiculo").addClass('has-success');
   }if (MarcaVehiculo.value != ""){
        $("#marcaVehiculo").removeClass('has-error');
         $("#marcaVehiculo").addClass('has-success');
    }if (KmInicial.value != ""){
         $("#km").removeClass('has-error');
          $("#km").addClass('has-success');
     }
}

window.onload = function(){
    var btnReg= __('btnReg');
    btnReg.addEventListener("click",registroVehiculoOficial);

}
