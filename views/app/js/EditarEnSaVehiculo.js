function registroEntradaSalidaVehiculo(){
  var connect, form, response, result,fechaSalidaVehi,horaSalidaVehi,OficEntregaVehiSalida,OficRecibeVehiSalida,
  fechaEntradaVehi,horaEntradaVehi,kmFinal,recorridoVehi,numFactura,autorizacion,horaFactura,litrosFacturados,km,montoFactura,
  pernote,OficEntregaVehiEntrada,OficRecibeVehiEntrada,observEntVehi,observSalVehi,numPlaca;
  
  //Parametros capturados del formulario de HTML
 
 
 fechaSalidaVehi =__('fechaSalidaVehi').value;
 horaSalidaVehi=__('horaSalidaVehi').value;
 OficEntregaVehiSalida=__('OficEntregaVehiSalida').value;
 OficRecibeVehiSalida=__('OficRecibeVehiSalida').value;
 fechaEntradaVehi=__('fechaEntradaVehi').value;
 horaEntradaVehi=__('horaEntradaVehi').value;
 kmFinal=__('kmFinal').value;
 recorridoVehi=__('recorridoVehi').value;
 numFactura=__('numFactura').value;
 autorizacion=__('autorizacion').value;
 horaFactura=__('horaFactura').value;
 litrosFacturados=__('litrosFacturados').value;
 km=__('km').value;
 montoFactura=__('montoFactura').value;
 pernote=__('pernote').value;
 OficEntregaVehiEntrada=__('OfiEntregaEntrada').value;
 OficRecibeVehiEntrada=__('OfiRecibeEntrada').value;
 observEntVehi=__('observEntVehi').value;
 observSalVehi=__('observSalVehi').value;
 numPlaca=__('numPlaca').value;
  

  /*alert("Datos enviados"+ idnumPatrimonio + numUltimaPrueba  + estadoAlcoholimetro +
        observaciones  + estadoServicioalcoh );*/   
        //************** Se abre la conexion, si todo esta bien
     form = 'FechaSalidaVehi=' + fechaSalidaVehi + '&horaSalidaVeh=' + horaSalidaVeh  +
    '&OficEntregaVehiSalida=' + OficEntregaVehiSalida +'&OficRecibeVehiSalida='+ OficRecibeVehiSalida + '$fechaEntradaVehi' + fechaEntradaVehi
    + '&horaEntradaVehi' + horaEntradaVehi + '&kmFinal' + kmFinal + '&recorridoVehi' + recorridoVehi
    + '& numFactura' +  numFactura + '&autorizacion' + autorizacion + '&horaFactura'+ horaFactura
    + '&litrosFacturados' + litrosFacturados + '&km' + km + '&montoFactura' + montoFactura + '&pernote' + pernote
    +'& OficEntregaVehiEntrada'+  OficEntregaVehiEntrada + '&OficRecibeVehiEntrada' + OficRecibeVehiEntrada
    + '&observEntVehi' + observEntVehi + '&observSalVehi' + observSalVehi + '&numFactura' + numPlaca;
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
        __('_AJAX_EntradaSalidaVehiculo_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_EntradaSalidaVehiculo_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Registrando Datos...</strong></p>';
      result += '</div>';
      __('_AJAX_EntradaSalidaVehiculo_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=editEntraSaliVehiculo',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax
 
 //Boton del Registro
 

}

function runScriptEntraSaliVehiculo(e) {
  if(e.keyCode == 13) {
    registroEntradaSalidaVehiculo();
  } 
}

window.onload = function(){
    var btnRegistrar=__('btnEntradaSalidaAlcohol');
    btnRegistrar.addEventListener("click",registroEntradaSalidaVehiculo);
    
}

