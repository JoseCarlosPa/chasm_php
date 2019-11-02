<?php
// Varios destinatarios
$para  = 'josecarlospas1@gmail.com';

// título
$titulo = $_POST['asunto'];

// mensaje
$mensaje = '
<html>
<head>
  <title>CHASM ONLINE</title>
</head>
<body>
  <p>La siguiente persona desea solicitar informacion</p>
  <p>'.$_POST['nombre'].' con correo: '.$_POST['email'].'</p>
  <p>Desea lo siguiente '.$_POST['mensaje'].'</p>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Enviarlo
mail($para, $titulo, $mensaje, $cabeceras);
?>