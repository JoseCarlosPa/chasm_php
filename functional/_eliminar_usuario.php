<?php
require_once ('_bd_connections.php');
$_GET['id'] = htmlentities($_GET['id']);

if (isset($_GET['id']) && $_GET['id'] != "" && $_GET['id'] != "1") {
    //-----------------------------------------------------------------------------------------------------------
    if($_SESSION['id_usuario'] != $_GET['id']){
        if (eliminarUsuarioPorID($_GET['id'])) {

            header('location: ../usuarios.php');
        }
            }
    header('location: ../usuarios.php');
}
header('location: ../usuarios.php');
