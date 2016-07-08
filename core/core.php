<?php
/*
EL NÚCLEO DE LA APLICACIÓN
*/

session_start();
#Constantes de conexion
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','nimble');
//Constantes de la APP
define('HTML_DIR','html/'); //Constante que estara disponible en todo
define('APP_TITLE','Nimble');
define('APP_COPY','Copyright &copy;'.date('Y',time()).' .');
define('APP_URL','http:localhost/SistemaNimble/');

// Constantes de PHPMailer
define('PHPMAILER_HOST','p3plcpnl0173.prod.phx3.secureserver.net');
define('PHPMAILER_USER','public@ocrend.com');
define('PHPMAILER_PASS','Prinick2016');
define('PHPMAILER_PORT',465);


//Estructura
require('core/models/class.Conexion.php');
//require('core/models/class.Conexion2.php');
require('core/bin/functions/Encrypt.php');
require('core/bin/functions/EmailTemplate.php');
require('core/bin/functions/users.php');
require('core/bin/functions/ambiente.php');
require('core/bin/functions/ubicacion.php');
require('core/bin/functions/fecha.php');
require('vendor/autoload.php');

$users= Users();
$oficial = Oficial();
$ambiente = Ambiente();


///$provincia= provincia();
//$canton= canton();
//$ambiente2 = Ambiente2();
?>
