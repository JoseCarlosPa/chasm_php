<?php

require_once ('_bd_connections.php');

if (isset($_POST["submit"])){


    $_GET['id'] = htmlentities($_GET['id']);
    $_POST["nombre"] = htmlentities($_POST["nombre"]);
    $_POST["cantidad"] = htmlentities($_POST["cantidad"]);
    $_POST["descripcion"] = htmlentities($_POST["descripcion"]);
    $_POST["clase"] = htmlentities($_POST["clase"]);
    $_POST["precio"] = htmlentities($_POST["precio"]);
    $_POST["precio_p"] = htmlentities($_POST["precio_p"]);


    if (isset($_POST["nombre"])
        && isset($_POST["cantidad"])
        && isset($_POST["descripcion"])
        && isset($_POST["clase"])
        && isset($_POST["precio"])
        && isset($_POST["precio_p"])
        && $_POST["cantidad"] != ""
        && $_POST["descripcion"] != ""
        && $_POST["nombre"] != ""
        && $_POST["clase"] != ""
        && $_POST["precio_p"] != ""
        && $_POST["precio"] != ""){
        var_dump($_POST["precio"]);

        $dir = "../imgs/tienda/productos/";
        opendir($dir);
        $destino = $dir.$_FILES['fichero']['name'];
        copy($_FILES['fichero']['tmp_name'],$destino);

        if(modificarProducto($_GET['id'],$_POST["nombre"], $_POST["descripcion"],$_POST["precio"], $_POST["precio_p"],$_POST["cantidad"],$_FILES['fichero']['name'])){

            header('location: /../admin.php');

        }else{

           header('location: /../admin.php');
        }
    }
}



