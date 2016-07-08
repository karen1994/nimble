function editarAccidente() {


    var connect, form, response, result, numBoleta, autJudicial, codInspector, fecAccidente, horAccidente,
  diaAccidente, provincia, canton, distrito, rutAccidente, km, senas, numImplicados, accCon, velocidad, obsAccidente, idAccidente, idUbicacion;
var hola;
     var id1, id2, id3, id4, id5, id6, id7, id8, id9, id10, id11, id12, id13, id14, id15, id16;

   id1= __('id1').value;
     id2= __('id2').value;
     id3= __('id3').value;
     id4= __('id4').value;
     id5= __('id5').value;
     id6= __('id6').value;
     id7= __('id7').value;
     id8= __('id8').value;
     id9= __('id9').value;
     id10= __('id10').value;
     id11= __('id11').value;
     id12= __('id12').value;
     id13= __('id13').value;
     id14= __('id14').value;
     id15= __('id15').value;
     id16= __('id16').value;

 idAccidente= __('idAccidente');
  idUbicacion= __('idUbicacion');
  numBoleta= __('numBoleta');
  autJudicial= __('autJudicial');
  codInspector= __('codInspector');
  fecAccidente= __('fecAccidente');
  horAccidente= __('horAccidente');
  diaAccidente= __('diaAccidente');
  provincia= __('provincia');
  canton= __('canton');
  distrito= __('distrito');
  /*rutAccidente= __('rutAccidente');
  km= __('km');
  senas= __('senas');
  numImplicados= __('numImplicados');
  accCon= __('accCon');
   velocidad=    __('velocidad');*/
 obsAccidente = __('obsAccidente');


        if(autJudicial.value == ""){
        alert("El campo autoridad judicial es requerido");
        autJudicial.focus();
     }else if (codInspector.value == ""){
        alert("El campo código del inspector es requerido");
        codInspector.focus();
     }else if(numBoleta.value == ""){
        alert("El campo número de boleta es requerido");
        numBoleta.focus();
     }else if (fecAccidente.value == ""){
         alert("El campo fecha del accidente es requerido");
         fecAccidente.focus();
     }else if (horAccidente.value == ""){
         alert("El campo hora es requerido");
         horAccidente.focus();
     }else if (diaAccidente.value == ""){
         alert("El campo día es requerido");
         diaAccidente.focus();
     }else if (obsAccidente.value == ""){
         alert("El campo observaciones es requerido");
         obsAccidente.focus();
     }else{ //Si todos los campos estan llenos realiza el registro

         form = 'numBoleta=' + numBoleta.value +
       '&autJudicial=' + autJudicial.value +
       '&codInspector=' + codInspector.value +
       '&fecAccidente=' + fecAccidente.value +
       '&horAccidente=' + horAccidente.value +
       '&diaAccidente=' + diaAccidente.value +
       '&provincia=' + provincia.value +
       '&canton=' + canton.value +
       '&distrito=' + distrito.value +
       '&obsAccidente=' +  obsAccidente.value  +
       '&idAccidente=' + idAccidente.value  +
       '&idUbicacion=' + idUbicacion.value +
       '&id1=' + id1 +
       '&id2=' + id2 +
       '&id3=' + id3 +
       '&id4=' + id4 +
       '&id5=' + id5 +
       '&id6=' + id6 +
       '&id7=' + id7 +
       '&id8=' + id8 +
       '&id9=' + id9 +
       '&id10=' + id10 +
       '&id11=' + id11 +
       '&id12=' + id12 +
       '&id13=' + id13 +
       '&id14=' + id14 +
       '&id15=' + id15 +
       '&id16=' + id16;


  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  connect.onreadystatechange = function() {

    if(connect.readyState == 4 && connect.status == 200) { //Revisa el estado de la conexión con ajax
      if(connect.responseText == 1) {

       result = '<div class="alert alert-dismissible alert-info">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Registro realizado !</h4>';
      result += '<p><strong>Se guardaron los cambios.</strong></p>';
      result += '</div>';

        __('_AJAX_ACCIDENTE_').innerHTML = result;

        window.location.assign("?view=verAccidente");

      } else {
        __('_AJAX_ACCIDENTE_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-info">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Se esta ejecuntando la petición.</strong></p>';
      result += '</div>';
      __('_AJAX_ACCIDENTE_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=editarAccidente', true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form);//Envia los datos a ajax


    // } //FIN DEL ELSE

}

function validarFRM1 () {
     $("#btnGuardarDIV").show();
    $("#btnCancelarDIV").show();
}





window.onload= function () {
  var btnEditar= __('btnEditar');
   var btnGuardar= __('btnGuardar');

   btnEditar.addEventListener("click", validarFRM1);
    btnGuardar.addEventListener("click", editarAccidente);

  };
