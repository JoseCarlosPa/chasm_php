<?php
// Varios destinatarios
$para  = 'josecarlospas1@gmail.com';

// título
$titulo = 'Formar parte de CHASM';

// mensaje
$mensaje = '
<html>
<head>
  <title>CHASM ONLINE</title>
</head>
<body>
  <p>La siguiente persona desea ser parte del equipo CHASM</p>
  <p>'.$_POST['email'].'</p>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Enviarlo
mail($para, $titulo, $mensaje, $cabeceras);

header ('location index.php')
?>