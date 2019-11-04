<?php
require_once ('_bd_connections.php');

session_start();

if (isset($_POST["submit"])){


    $_POST["nombre"] = htmlentities($_POST["nombre"]);
    $_POST["descripcion"] = htmlentities($_POST["descripcion"]);
    $_POST["precio_p"] = htmlentities($_POST["precio_p"]);
    $_POST["precio_u"] = htmlentities($_POST["precio_u"]);
    $_POST["cantidad"] = htmlentities($_POST["cantidad"]);
    $_POST["dispo"] = htmlentities($_POST["dispo"]);
    $_POST["clase"] = htmlentities($_POST["clase"]);
    $_POST["color"] = htmlentities($_POST["color"]);



    if (isset($_POST["nombre"])

        && isset($_POST["descripcion"])
        && isset($_POST["precio_p"])
        && isset($_POST["precio_u"])
        && isset($_POST["cantidad"])
        && isset($_POST["color"])
        && isset($_POST["dispo"])
        && isset($_POST["clase"])

        && $_POST["nombre"] != ""
        && $_POST["descripcion"] != ""
        && $_POST["precio_u"] != ""
        && $_POST["cantidad"] != ""
        && $_POST["color"] != ""
        && $_POST["dispo"] != ""
        && $_POST["clase"] != ""){

        $dir = "../imgs/tienda/productos/";
        opendir($dir);
        $destino = $dir.$_FILES['fichero']['name'];
        copy($_FILES['fichero']['tmp_name'],$destino);


        if(insert_new_prodcut($_POST["nombre"],$_POST["descripcion"],$_POST["precio_u"],$_POST["color"],$_POST["clase"],$_POST["clase"],$_POST["cantidad"],$_FILES['fichero']['name'])){


            header('location: ../admin.php');

        }else{

            //header('location: ../admin.php');
        }
    }

}
