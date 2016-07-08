function registrOficial(){
  var connect, form, response, result, Nombre, PrimerApell, SegundoApell, Cedula, Edad, Direccion, Escolaridad, NumeroTelefono,
   Correo, FechaNac, IngresoDele, NombraOficial, NombrePuesto, CodigoOficial, TipoLicenciaConducir, VenciLicenciaConducir,
   NumPermisoPortacionArmas, VenciPermisoPortacionArmas, NumPermisoConducirCOSEVI, VenciPermisoConducirCOSEVI, NumPermisoConducirMOPT,
   VenciPermisoConducirMOPT, Observaciones;
  //Parametros capturados del formulario de HT

Nombre= __('Nombre');
PrimerApell= __('PrimerApell');
SegundoApell= __('SegundoApell');
Cedula= __('Cedula');
Edad= __('Edad');
Direccion= __('Direccion');
Escolaridad= __('Escolaridad');
NumeroTelefono= __('NumeroTelefono');
Correo= __('Correo');
FechaNac= __('FechaNac');
IngresoDele= __('IngresoDele');
NombraOficial= __('NombraOficial');
NombrePuesto= __('NombrePuesto');
CodigoOficial= __('CodigoOficial');
TipoLicenciaConducir= __('TipoLicenciaConducir');
VenciLicenciaConducir= __('VenciLicenciaConducir');
NumPermisoPortacionArmas= __('NumPermisoPortacionArmas');
VenciPermisoPortacionArmas= __('VenciPermisoPortacionArmas');
NumPermisoConducirCOSEVI= __('NumPermisoConducirCOSEVI');
VenciPermisoConducirCOSEVI= __('VenciPermisoConducirCOSEVI');
NumPermisoConducirMOPT= __('NumPermisoConducirMOPT');
VenciPermisoConducirMOPT= __('VenciPermisoConducirMOPT');
Observaciones= __('Observaciones').value;

if(Nombre.value == ""){
  alert("El campo Nombre es requerido");
  Nombre.focus();
  $("#Nom").addClass('has-error');
}else if(PrimerApell.value == ""){
  alert("El campo primer apellido es requerido");
  PrimerApell.focus();
  $("#priApell").addClass('has-error');
}else if(SegundoApell.value == ""){
  alert("El campo segundo apellido es requerido");
  SegundoApell.focus();
  $("#SeguApell").addClass('has-error');
}else if(Cedula.value == ""){
  alert("El Cedula que recibe es requerido");
  Cedula.focus();
  $("#Ced").addClass('has-error');
}else if(Edad.value == ""){
  alert("El campo Edad es requerido");
  Edad.focus();
  $("#edad").addClass('has-error');
}else if(Direccion.value == ""){
  alert("El campo Direccion es requerido");
  Direccion.focus();
  $("#Direcc").addClass('has-error');
}else if(Escolaridad.value == ""){
  alert("El campo Escolaridad es requerido");
  Escolaridad.focus();
  $("#Escol").addClass('has-error');
}else if(NumeroTelefono.value == ""){
  alert("El campo numero de telefono es requerido");
  NumeroTelefono.focus();
  $("#NumTele").addClass('has-error');
}else if(Correo.value == ""){
  alert("El campo Correo es requerido");
  Correo.focus();
  $("#mail").addClass('has-error');
}else if(FechaNac.value == ""){
  alert("El campo fecha de nacimiento es requerido");
  FechaNac.focus();
  $("#nacimiento").addClass('has-error');
}else if(IngresoDele.value == ""){
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
}else if(TipoLicenciaConducir.value == ""){
  alert("El campo tipo de licencia es requerido");
  TipoLicenciaConducir.focus();
  $("#Lic").addClass('has-error');
}else if(VenciLicenciaConducir.value == ""){
  alert("El campo vencimiento de licencia es requerido");
  VenciLicenciaConducir.focus();
  $("#VencLic").addClass('has-error');
}else if(NumPermisoPortacionArmas.value == ""){
  alert("El campo numero de portacion de armas es requerido");
  NumPermisoPortacionArmas.focus();
  $("#armas").addClass('has-error');
}else if(VenciPermisoPortacionArmas.value == ""){
  alert("El campo vencimiento de portacion de armas es requerido");
  VenciPermisoPortacionArmas.focus();
  $("#vencArmas").addClass('has-error');
}else if(NumPermisoConducirCOSEVI.value == ""){
  alert("El campo numero de permiso COSEVI es requerido");
  NumPermisoConducirCOSEVI.focus();
  $("#Cosevi").addClass('has-error');
}else if(VenciPermisoConducirCOSEVI.value == ""){
  alert("El campo vencimiento de permiso COSEVI es requerido");
  VenciPermisoConducirCOSEVI.focus();
  $("#VencCosevi").addClass('has-error');
}else if(NumPermisoConducirMOPT.value == ""){
  alert("El campo numero de permiso del MOPT es requerido");
  NumPermisoConducirMOPT.focus();
  $("#Mopt").addClass('has-error');
}else if(VenciPermisoConducirMOPT.value == ""){
  alert("El campo vencimiento de permiso del MOPT es requerido");
  VenciPermisoConducirMOPT.focus();
   $("#VenciMopt").addClass('has-error');
}else{


  /*alert("Datos enviados"+ idnumPatrimonio + numUltimaPrueba  + estadoAlcoholimetro +
        observaciones  + estadoServicioalcoh );*/
        //************** Se abre la conexion, si todo esta bien
   form = 'Nombre=' + Nombre.value + '&PrimerApell=' + PrimerApell.value  +
    '&SegundoApell=' + SegundoApell.value + '&Cedula=' + Cedula.value +
    '&Edad='+ Edad.value + '&Direccion=' + Direccion.value +
    '&Escolaridad=' + Escolaridad.value + '&NumeroTelefono=' + NumeroTelefono.value
    + '&Correo=' + Correo.value + '&FechaNac=' + FechaNac.value +
    '&IngresoDele=' + IngresoDele.value + '&NombraOficial=' + NombraOficial.value +
    '&NombrePuesto=' + NombrePuesto.value + '&CodigoOficial='+ CodigoOficial.value +
    '&TipoLicenciaConducir=' + TipoLicenciaConducir.value + '&VenciLicenciaConducir='+ VenciLicenciaConducir.value +
    '&NumPermisoPortacionArmas=' + NumPermisoPortacionArmas.value + '&VenciPermisoPortacionArmas=' + VenciPermisoPortacionArmas.value +
    '&NumPermisoConducirCOSEVI=' +  NumPermisoConducirCOSEVI.value + '&VenciPermisoConducirCOSEVI='+ VenciPermisoConducirCOSEVI.value +
    '&NumPermisoConducirMOPT='+ NumPermisoConducirMOPT.value + '&VenciPermisoConducirMOPT=' + VenciPermisoConducirMOPT.value +
    '&Observaciones=' + Observaciones.value;


  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'); //Función que permite que se visualice en todos los  navegadores
  connect.onreadystatechange = function() {

    if(connect.readyState == 4 && connect.status == 200) { //Revisa el estado de la conexión con ajax
      if(connect.responseText == 1) {

        result = '<div class="alert alert-dismissible alert-success">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Completado</h4>';
        result += '<p><strong>Registro completado</strong></p>';
        result += '</div>';

        __('_AJAX_Oficiales_').innerHTML = result;
      //  location.reload();
      } else {
        __('_AJAX_Oficiales_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {

        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Registrando Datos...</strong></p>';
      result += '</div>';
      __('_AJAX_Oficiales_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=regOficiales',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

 //Boton del Registro

}
}

function validaciones(){
  if(Nombre.value != ""){
       $("#Nom").removeClass('has-error');
       $("#Nom").addClass('has-success');
  } if (PrimerApell.value != ""){
       $("#priApell").removeClass('has-error');
        $("#priApell").addClass('has-success');
   }if (SegundoApell.value != ""){
        $("#SeguApell").removeClass('has-error');
         $("#SeguApell").addClass('has-success');
    }if (Cedula.value != ""){
         $("#Ced").removeClass('has-error');
          $("#Ced").addClass('has-success');
     }if (Edad.value != ""){
          $("#edad").removeClass('has-error');
           $("#edad").addClass('has-success');
      }if (Direccion.value != ""){
           $("#Direcc").removeClass('has-error');
            $("#Direcc").addClass('has-success');
       }if (Escolaridad.value != ""){
            $("#Escol").removeClass('has-error');
             $("#Escol").addClass('has-success');
        }if (NumeroTelefono.value != ""){
             $("#NumTele").removeClass('has-error');
              $("#NumTele").addClass('has-success');
         }if (Correo.value != ""){
              $("#mail").removeClass('has-error');
               $("#mail").addClass('has-success');
          }if (FechaNac.value != ""){
               $("#nacimiento").removeClass('has-error');
                $("#nacimiento").addClass('has-success');
           }if(IngresoDele.value != ""){
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
              }if(TipoLicenciaConducir.value != ""){
                   $("#Lic").removeClass('has-error');
                   $("#Lic").addClass('has-success');
              } if (VenciLicenciaConducir.value != ""){
                   $("#VencLic").removeClass('has-error');
                    $("#VencLic").addClass('has-success');
               }if (NumPermisoPortacionArmas.value != ""){
                    $("#armas").removeClass('has-error');
                     $("#armas").addClass('has-success');
                }if (VenciPermisoPortacionArmas.value != ""){
                     $("#vencArmas").removeClass('has-error');
                      $("#vencArmas").addClass('has-success');
                 }if (NumPermisoConducirCOSEVI.value != ""){
                      $("#Cosevi").removeClass('has-error');
                       $("#Cosevi").addClass('has-success');
                  }if (VenciPermisoConducirCOSEVI.value != ""){
                       $("#VencCosevi").removeClass('has-error');
                        $("#VencCosevi").addClass('has-success');
                   }if (NumPermisoConducirMOPT.value != ""){
                        $("#Mopt").removeClass('has-error');
                         $("#Mopt").addClass('has-success');
                    }if (VenciPermisoConducirMOPT.value != ""){
                         $("#VenciMopt").removeClass('has-error');
                          $("#VenciMopt").addClass('has-success');
                     }
            }

function  validarFRM1() {
$("#DatosProfesion").show();
$("#DatosPersonales").hide();
}

function validarFRM2(){
$("#DatosProfesion").hide();
$("#Permisos").show();

}
//Función validar entrada
function validarFRM3(){
$("#btnGuardarDiv").show();
}

/* function regresar2(){
  $("#DatosPersonales").show();
  $("#DatosProfesion").hide();
}

function regresar3(){
 $("#DatosProfesion").show();
 $("#Permisos").hide();
}*/


window.onload = function(){
    var btnGuardarOfic= __('btnGuardarOfic');
    var Terminar1= __('Terminar1');
    var Terminar2=__('Terminar2');
    var Terminar3=__('Terminar3');
  //  var Regresar2=__('Regresar2');
  //  var Regresar3=__('Regresar3');*/

   btnGuardarOfic.addEventListener("click", registrOficial);
   Terminar1.addEventListener("click", validarFRM1);
   Terminar2.addEventListener("click",validarFRM2);
   Terminar3.addEventListener("click",validarFRM3);
  // Regresar2.addEventListener("click",regresar2);
   //Regresar3.addEventListener("click",regresar3);
};
