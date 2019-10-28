<?php
require_once ('_bd_connections.php');
$_GET['id'] = htmlentities($_GET['id']);
eliminarproductoPorID($_GET['id']);
header('location: ../admin.php');