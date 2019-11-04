<?php
require_once ('_bd_connections.php');

session_start();

if (isset($_POST["submit"])){


    $_POST["nombresc"] = htmlentities($_POST["nombresc"]);

    if (isset($_POST["nombresc"])
        && $_POST["nombresc"] != ""){

        if(insert_new_subclass($_POST["nombresc"])){
            header('location: /../clases.php');

        }else{
            header('location: /../clases.php');
        }
    }

}