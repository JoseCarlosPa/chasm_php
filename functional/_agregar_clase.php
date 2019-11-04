<?php
require_once ('_bd_connections.php');

session_start();

if (isset($_POST["submit"])){


    $_POST["nombrec"] = htmlentities($_POST["nombrec"]);

    if (isset($_POST["nombrec"])
        && $_POST["nombrec"] != ""){

        if(insert_new_class($_POST["nombrec"])){
            header('location: ../clases.php');

        }else{
            header('location: ../clases.php');
        }
    }

}