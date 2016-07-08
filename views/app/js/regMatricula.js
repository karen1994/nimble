
function registroMatricula() {
  var connect, form, response, result, cedPersona, nomPersona, ape1,  ape2,  numArticulo, desMotivo,
   numBoletaMatricula, fecBoleta, numPlaca, marcVehiculo, fecDetMatricula, horDetMatricula,
   tomEntMatricula, folEntMatricula, ofiDetMatricula, ofiRecMatricula, obsMatricula;
// Parametros capturados del formulario

  cedPersona= __('cedPersona').value;
  nomPersona= __('nomPersona').value;
  ape1= __('ape1').value;
  ape2= __('ape2').value;
  numArticulo= __('numArticulo').value;
  desMotivo= __('desMotivo').value;
  numBoletaMatricula= __('numBoletaMatricula').value;
  fecBoleta= __('fecBoleta').value;
  numPlaca= __('numPlaca').value;
  marcVehiculo= __('marcVehiculo').value;
  fecDetMatricula= __('fecDetMatricula').value;
  horDetMatricula= __('horDetMatricula').value;
  tomEntMatricula= __('tomEntMatricula').value;
  folEntMatricula= __('folEntMatricula').value;
  ofiDetMatricula= __('ofiDetMatricula').value;
  ofiRecMatricula= __('ofiRecMatricula').value;
  obsMatricula= __('obsMatricula').value;


  //************** Se abre la conexion, si todo esta bien
      form = 'cedPersona=' + cedPersona +
      '&nomPersona=' + nomPersona +
      '&ape1=' + ape1 +
      '&ape2=' + ape2 +
      '&numArticulo=' + numArticulo +
      '&desMotivo=' + desMotivo +
      '&numBoletaMatricula=' + numBoletaMatricula +
      '&fecBoleta=' +  fecBoleta +
      '&numPlaca=' + numPlaca +
      '&marcVehiculo=' + marcVehiculo +
      '&fecDetMatricula=' + fecDetMatricula +
      '&horDetMatricula=' + horDetMatricula +
      '&tomEntMatricula=' + tomEntMatricula +
      '&folEntMatricula=' + folEntMatricula +
      '&ofiDetMatricula=' + ofiDetMatricula +
      '&ofiRecMatricula=' + ofiRecMatricula +
      '&obsMatricula=' + obsMatricula;


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
        result += '<h4>Registro Completado !</h4>';
        result += '</div>';
        result += '</div>';
        __('_AJAX_Matricula_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_Matricula_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {

        //Muestra mensaje de procesamiento.
        result = '<div class="alert alert-dismissible alert-warning">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Procesando...</h4>';
        result += '<p><strong>Registrando Datos...</strong></p>';
        result += '</div>';

      __('_AJAX_Matricula_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=regMatricula',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

}

function datosCorrectos(){
  if(cedPersona.value != ""){
          $("#cedula").removeClass('has-error');
          $("#cedula").addClass('has-success');
     }
     if (nomPersona.value != ""){
         $("#nombre").removeClass('has-error');
          $("#nombre").addClass('has-success');
     }
    if (ape1.value != ""){
         $("#apellido1").removeClass('has-error');
          $("#apellido1").addClass('has-success');
     }
     if (ape2.value != ""){
          $("#apellido2").removeClass('has-error');
           $("#apellido2").addClass('has-success');
     }
     if (numBoletaMatricula.value != ""){
           $("#boleta").removeClass('has-error');
            $("#boleta").addClass('has-success');
     }
     if (fecBoleta.value != ""){
            $("#fecBoletaMatricula").removeClass('has-error');
             $("#fecBoletaMatricula").addClass('has-success');
     }
     if (numPlaca.value != ""){
             $("#placa").removeClass('has-error');
              $("#placa").addClass('has-success');
     }
     if (marcVehiculo.value != ""){
             $("#marca").removeClass('has-error');
              $("#marca").addClass('has-success');
     }
     if (fecDetMatricula.value != ""){
             $("#fecDetencion").removeClass('has-error');
              $("#fecDetencion").addClass('has-success');
     }
     if (horDetMatricula.value != ""){
             $("#horDetencion").removeClass('has-error');
              $("#horDetencion").addClass('has-success');
     }
     if (tomEntMatricula.value != ""){
             $("#tomo").removeClass('has-error');
              $("#tomo").addClass('has-success');
     }
     if (folEntMatricula.value != ""){
             $("#folio").removeClass('has-error');
              $("#folio").addClass('has-success');
     }
     if (ofiDetMatricula.value != ""){
             $("#oDetiene").removeClass('has-error');
              $("#oDetiene").addClass('has-success');
     }
     if (ofiRecMatricula.value != ""){
             $("#oRecibe").removeClass('has-error');
              $("#oRecibe").addClass('has-success');
     }
     if (obsMatricula.value != ""){
             $("#observacion").removeClass('has-error');
              $("#observacion").addClass('has-success');
     }
     if (numArticulo.value != ""){
             $("#articulo").removeClass('has-error');
              $("#articulo").addClass('has-success');
     }
     if (desMotivo.value != ""){
             $("#motivo").removeClass('has-error');
              $("#motivo").addClass('has-success');
     }
}

//Función validar secPersona
function validarFRM1(){

  if(cedPersona.value == ""){
          alert("El campo identificación es requerido");
          cedPersona.focus();
          $("#cedula").addClass('has-error');
       }else if (nomPersona.value == ""){
           alert("El campo nombre es requerido");
          nomPersona.focus();
            $("#nombre").addClass('has-error');
     }else if (ape1.value == ""){
          alert("El campo primer apellido es requerido");
         ape1.focus();
           $("#apellido1").addClass('has-error');
    }else if (ape2.value == ""){
         alert("El campo segundo apellido es requerido");
        ape2.focus();
          $("#apellido2").addClass('has-error');
   }else{
$("#secEntrada").show();
$("#secPersona").hide();
      }
}
//Función validar secMotivo
function validarFRM2(){

  if(numBoletaMatricula.value == ""){
          alert("El campo número de boleta es requerido");
          numBoletaMatricula.focus();
          $("#boleta").addClass('has-error');
       }else if (fecBoleta.value == ""){
           alert("El campo fecha de la boleta es requerido");
          fecBoleta.focus();
            $("#fecBoletaMatricula").addClass('has-error');
     }else if (numPlaca.value == ""){
         alert("El campo placa es requerido");
        numPlaca.focus();
          $("#placa").addClass('has-error');
   }else if (marcVehiculo.value == ""){
       alert("El campo marca del vehículo es requerido");
      marcVehiculo.focus();
        $("#marca").addClass('has-error');
 }else if (fecDetMatricula.value == ""){
     alert("El campo fecha de detención es requerido");
    fecDetMatricula.focus();
      $("#fecDetencion").addClass('has-error');
}else if (horDetMatricula.value == ""){
    alert("El campo hora de detención es requerido");
   horDetMatricula.focus();
     $("#horDetencion").addClass('has-error');
}else if (tomEntMatricula.value == ""){
    alert("El campo tomo es requerido");
   tomEntMatricula.focus();
     $("#tomo").addClass('has-error');
}else if (folEntMatricula.value == ""){
    alert("El campo folio es requerido");
   folEntMatricula.focus();
     $("#folio").addClass('has-error');
}else if (ofiDetMatricula.value == ""){
    alert("El campo código de oficial que detiene es requerido");
   ofiDetMatricula.focus();
     $("#oDetiene").addClass('has-error');
}else if (ofiRecMatricula.value == ""){
    alert("El campo código de oficial que recibe es requerido");
   ofiRecMatricula.focus();
     $("#oRecibe").addClass('has-error');
}
    else{
$("#secMotivo").show();
$("#secEntrada").hide();
        }
}
//Función validar entrada
function validarFRM3(){

  if(numArticulo.value == ""){
          alert("El campo artículo es requerido");
          numArticulo.focus();
          $("#articulo").addClass('has-error');
       }else if (desMotivo.value == ""){
           alert("El campo motivo de la detención es requerido");
          desMotivo.focus();
            $("#motivo").addClass('has-error');
     }
  else{
$("#btnGuardarMatriculaDiv").show();
      }
}

 function regresar2(){
  $("#secPersona").show();
  $("#secEntrada").hide();
}

function regresar3(){
 $("#secEntrada").show();
 $("#secMotivo").hide();
}


window.onload= function(){
  var btnTerminar1= __('btnTerminar1');
  var btnTerminar2= __('btnTerminar2');
  var btnTerminar3= __('btnTerminar3');
  var  btnRegresar2= __('regresar2');
  var  btnRegresar3= __('regresar3');
  var btnGuardarMatricula= __('btnGuardarMatricula');


  btnTerminar1.addEventListener("click",validarFRM1);
  btnTerminar2.addEventListener("click", validarFRM2);
  btnTerminar3.addEventListener("click", validarFRM3);
  btnRegresar2.addEventListener("click",regresar2);
  btnRegresar3.addEventListener("click",regresar3);
  btnGuardarMatricula.addEventListener("click", registroMatricula);

};
