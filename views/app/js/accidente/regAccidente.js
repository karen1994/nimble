
function regAccidente() {
    var connect, form, response, result, numBoleta, autJudicial, codInspector, fecAccidente, horAccidente,
  diaAccidente, provincia, canton, distrito, rutAccidente, km, senas, numImplicados, accCon, velocidad, obsAccidente; 

  numBoleta=    __('numBoleta');
  autJudicial=  __('autJudicial');
  codInspector= __('codInspector');
  fecAccidente= __('fecAccidente');
  horAccidente= __('horAccidente');
  diaAccidente= __('diaAccidente');
  provincia=   __('provincia');
  canton=      __('canton');
  distrito=    __('distrito');
  rutAccidente= __('rutAccidente');
  km=           __('km');
  senas=        __('senas');
  numImplicados=__('numImplicados');
  accCon=       __('accCon');
  velocidad=     __('velocidad');
  obsAccidente = __('obsAccidente');
    
if(autJudicial.value == ""){
            alert("El campo autoridad judicial es requerido");
            autJudicial.focus();    
            $("#autoridad").addClass('has-error');
    
     }else if (codInspector.value == ""){
            alert("El campo código del inspector es requerido");
            codInspector.focus();    
             $("#inspector").addClass('has-error');
         
     }else if (rutAccidente.value == ""){
             alert("El campo ruta del accidente es requerido");
             rutAccidente.focus();    
             $("#ruta").addClass('has-error');
         
     }else if (km.value == ""){
             alert("El campo kilómetro es requerido");
             km.focus();   
             $("#kilometro").addClass('has-error');
         
     }else if (senas.value == ""){
             alert("El campo señas es requerido");
             senas.focus();    
             $("#sen").addClass('has-error');
         
     }else if ( numImplicados.value == ""){
             alert("El campo número de implicados es requerido");
             numImplicados.focus();    
             $("#implicados").addClass('has-error');
         
     }else if ( accCon.value == ""){
             alert("Seleccione un estado del accidente");
             accCon.focus();    
             $("#estado").addClass('has-error');
         
     }else if (velocidad.value == ""){
             alert("El campo velocidad de la carretera es requerido");
             velocidad.focus();    
             $("#vel").addClass('has-error');
         
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
      '&rutAccidente=' + rutAccidente.value +
      '&km=' + km.value +
      '&senas=' + senas.value +
      '&numImplicados=' + numImplicados.value +
      '&accCon=' + accCon.value +
      '&velocidad=' + velocidad.value +
       '&obsAccidente=' + obsAccidente.value;
     

  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'); //Función que permite que se visualice en todos los  navegadores
  connect.onreadystatechange = function() {
     
    if(connect.readyState == 4 && connect.status == 200) { //Revisa el estado de la conexión con ajax
      if(connect.responseText == 1) {

       result = '<div class="alert alert-dismissible alert-info">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Registro realizado !</h4>';
      result += '<p><strong>Se guardaron los datos.</strong></p>';
      result += '</div>';
        
        __('_AJAX_ACCIDENTE_').innerHTML = result;
        
        window.location.assign("?view=frmAmbiente&&id="+numBoleta.value);
        
      } else {
        __('_AJAX_ACCIDENTE_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState !== 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-info">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Se esta ejecuntando la petición.</strong></p>';
      result += '</div>';
      __('_AJAX_ACCIDENTE_').innerHTML = result;
    }
  };
  connect.open('POST','ajax.php?mode=regAccidente',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form);//Envia los datos a ajax

         
     } //FIN DEL ELSE 
 
     
}


// Funcion para el ambiente
function combo(){
       alert(select);
    var label=    __('amb1');
    var select= __('estEspecial').value;
     // alert(select);
    label.innerHTML= select;
  
      // alert(select.textContent);
}

function datosCorrectos(){
 
     if(numBoleta.value != ""){
          $("#boleta").removeClass('has-error');
          $("#boleta").addClass('has-success');
     } if (fecAccidente.value != ""){
         $("#fecha").removeClass('has-error');
          $("#fecha").addClass('has-success');
     }
    if (horAccidente.value != ""){
         $("#hora").removeClass('has-error');
          $("#hora").addClass('has-success');
     }
    if (diaAccidente.value != ""){
         $("#dia").removeClass('has-error');
          $("#dia").addClass('has-success');
     }
    if (obsAccidente.value != ""){
         $("#observ").removeClass('has-error');
          $("#observ").addClass('has-success');
     }
    if (provincia.value != ""){
         $("#prov").removeClass('has-error');
          $("#prov").addClass('has-success');
     }
    if (canton.value != ""){
         $("#cant").removeClass('has-error');
          $("#cant").addClass('has-success');
     }
    if (distrito.value != ""){
          $("#dist").removeClass('has-error');
          $("#dist").addClass('has-success');
     }
    
    if(autJudicial.value != ""){
         $("#autoridad").removeClass('has-error');
          $("#autoridad").addClass('has-success');
     }
    if (codInspector.value != ""){
          $("#inspector").removeClass('has-error');
          $("#inspector").addClass('has-success');
     }
    if (rutAccidente.value != ""){
          $("#ruta").removeClass('has-error');
          $("#ruta").addClass('has-success');
     }
    if (km.value != ""){
        $("#kilometro").removeClass('has-error');
          $("#kilometro").addClass('has-success');
     }
    if (senas.value != ""){
          $("#sen").removeClass('has-error');
          $("#sen").addClass('has-success');
     }
    if ( numImplicados.value != ""){
          $("#implicados").removeClass('has-error');
          $("#implicados").addClass('has-success');
     }
    if ( accCon.value != ""){
          $("#estado").removeClass('has-error');
          $("#estado").addClass('has-success');
     }
    if (  velocidad.value != ""){
            $("#vel").removeClass('has-error');
           $("#vel").addClass('has-success');
     }
    
    
}

function validarFRM1(){
 
     if(numBoleta.value == ""){
        alert("El campo número de boleta es requerido");
        numBoleta.focus();
        $("#boleta").addClass('has-error');
     }else if (fecAccidente.value == ""){
         alert("El campo fecha del accidente es requerido");
        fecAccidente.focus();
          $("#fecha").addClass('has-error');
     }else if (horAccidente.value == ""){
         alert("El campo hora es requerido");
        horAccidente.focus();
          $("#hora").addClass('has-error');
     }else if (diaAccidente.value == ""){
         alert("Seleccione una opción en el campo día del accidente");
        diaAccidente.focus();
          $("#dia").addClass('has-error');
     }/*else if (obsAccidente.value == ""){
         alert("El campo observaciones es requerido");
        obsAccidente.focus();
          $("#observ").addClass('has-error');
     }*/else if (provincia.value == ""){
         alert("Seleccione una opción en el campo Provincia");
        provincia.focus();
          $("#prov").addClass('has-error');
     }else if (canton.value == ""){
         alert("Seleccione una opción en el campo Canton");
        canton.focus();
          $("#cant").addClass('has-error');
     }else if (distrito.value == ""){
         alert("Seleccione una opción en el campo Distrito");
        distrito.focus();
          $("#dist").addClass('has-error');
     }else{
         
           $("#secAccidente").hide();
           $("#secAccidente_II").show(); 
       
     }
  }


 window.onload= function(){
  var btnTerminar1= __('btnTerminar1');
  var btnTerminar2= __('btnTerminar2');
  
     btnTerminar1.addEventListener("click", validarFRM1);
     btnTerminar2.addEventListener("click", regAccidente);
   
  };
