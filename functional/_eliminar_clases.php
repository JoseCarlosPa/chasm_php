<?php
require_once ('_bd_connections.php');
$_GET['id'] = htmlentities($_GET['id']);
//-----------------------------------------------------------------------------------------------------------
    if (eliminarClasePorID($_GET['id'])) {
        echo 'si';
        header('location: ../clases.php');
    }else{
        header('location: ../clases.php');
    }


