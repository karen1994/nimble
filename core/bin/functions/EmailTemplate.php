<?php 
 function EmailTemplate($user,$link){
     $HTML= '
     <html lang="en">
     <head>
  <meta charset = "utf-8">
 </head>
     <body style="background: #FFFFFF; font-family: verdana; font-size: 14px; color:#1c1b1b;">
     <div style= "">
     <h2>Oficial con el codigo de usuario :'.$user.'</h2>
     <p style= "font-size:17px;"> Se ha registrado en'. APP_TITLE.'.</p>
     <p> Solo queda un paso mas, activar tu cuenta. </p>
     <p style= "padding: 15px; background-color:#ECF8FF;">
     Para activar tu cuenta por favor has <a style="font-weight:bold;color:#2BA6CB;" href="'. $link.'" target= "_blanck"> clic Aqui &raquo;</a>
     </p>
     <p style= "font-size:9px;"> &copy; '.date('Y',time()).' '.APP_TITLE.'. Todos los derechos reservados. </p> 
     </div>
     </body>
     </html>
     ';
     
     return $HTML;
 }
?>