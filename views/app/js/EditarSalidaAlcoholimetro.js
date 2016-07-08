function EditarSalidaAlcohol(){
  var connect, form, response, result, FechaSalidaAlcohol, HoraSalidaAlcohol, OfiEntregaSalida, OfiRecibeSalida,
  ObservacionesSalida, NumeroPatrimonio;
  //Parametros capturados del formulario de HTML

 FechaSalidaAlcohol = __('FechaSalidaAlcohol');
 HoraSalidaAlcohol = __('HoraSalidaAlcohol');
 OfiEntregaSalida = __('OfiEntregaSalida');
 OfiRecibeSalida = __('OfiRecibeSalida');
 ObservacionesSalida = __('ObservacionesSalida');
 NumeroPatrimonio = __('NumeroPatrimonio');

 if(FechaSalidaAlcohol.value == ""){
   alert("El campo Fecha de Salida es requerido");
   FechaSalidaAlcohol.focus();
   $("#fecSalida").addClass('has-error');
 }else if(HoraSalidaAlcohol.value == ""){
   alert("El campo hora de salida es requerido");
   HoraSalidaAlcohol.focus();
   $("#HoraSalida").addClass('has-error');
 }else if(OfiEntregaSalida.value == ""){
   alert("El campo oficial que entrega es requerido");
   OfiEntregaSalida.focus();
   $("#entregaSalida").addClass('has-error');
 }else if(OfiRecibeSalida.value == ""){
   alert("El campo oficial que recibe es requerido");
   OfiRecibeSalida.focus();
   $("#recibeSalida").addClass('has-error');
 }else{


  /*alert("Datos enviados"+ idnumPatrimonio + numUltimaPrueba  + estadoAlcoholimetro +
        observaciones  + estadoServicioalcoh );*/
        //************** Se abre la conexion, si todo esta bien
     form = 'FechaSalidaAlcohol=' + FechaSalidaAlcohol.value +
     '&HoraSalidaAlcohol=' + HoraSalidaAlcohol.value  +
    '&OfiEntregaSalida=' + OfiEntregaSalida.value +
    '&OfiRecibeSalida='+ OfiRecibeSalida.value +
    '&ObservacionesSalida=' + ObservacionesSalida.value +
    '&NumeroPatrimonio=' + NumeroPatrimonio.value;

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
        __('_AJAX_EditarSalidaAlcoholimetro_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_EditarSalidaAlcoholimetro_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Actualizando Datos...</strong></p>';
      result += '</div>';
      __('_AJAX_EditarSalidaAlcoholimetro_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=EditarSalidaAlcoholimetro',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

 //Boton del Registro


}
}

function validaciones(){
  if(FechaSalidaAlcohol.value != ""){
       $("#fecSalida").removeClass('has-error');
       $("#fecSalida").addClass('has-success');
  } if (HoraSalidaAlcohol.value != ""){
       $("#HoraSalida").removeClass('has-error');
       $("#HoraSalida").addClass('has-success');
   }if (OfiEntregaSalida.value != ""){
         $("#entregaSalida").removeClass('has-error');
         $("#entregaSalida").addClass('has-success');
     }if (OfiRecibeSalida.value != ""){
          $("#recibeSalida").removeClass('has-error');
          $("#recibeSalida").addClass('has-success');
      }

}

window.onload = function(){
    var btnEditarSalidaAlcohol=__('btnEditarSalidaAlcohol');
    btnEditarSalidaAlcohol.addEventListener("click",EditarSalidaAlcohol);

}
