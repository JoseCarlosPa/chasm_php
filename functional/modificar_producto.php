<?php

require_once ('_bd_connections.php');
echo '1';
if (isset($_POST["submit"])){
    echo '1';

    $_GET['id'] = htmlentities($_GET['id']);
    $_POST["nombre"] = htmlentities($_POST["nombre"]);
    $_POST["descripcion"] = htmlentities($_POST["descripcion"]);
    $_POST["clase"] = htmlentities($_POST["clase"]);
    $_POST["precio"] = htmlentities($_POST["precio"]);
    $_POST["precio_p"] = htmlentities($_POST["precio_p"]);

    if (isset($_POST["nombre"])
        && isset($_POST["descripcion"])
        && isset($_POST["clase"])
        && isset($_POST["precio"])
        && isset($_POST["precio_p"])
        && $_POST["descripcion"] != ""
        && $_POST["nombre"] != ""
        && $_POST["clase"] != ""
        && $_POST["precio_p"] != ""
        && $_POST["precio"] != ""){

        if(modificarProducto($_GET['id'],$_POST["nombre"], $_POST["descripcion"],$_POST["clase"],$_POST["precio"],$_POST["precio_p"])){
            header('location: ../admin.php');

        }else{
            header('location: ../admin.php');
        }
    }
}



