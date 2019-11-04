<?php
require_once ('_bd_connections.php');

session_start();
$result = consultar_correos();

if (isset($_POST["submit"])){



    $_POST["nombre_r"] = htmlentities($_POST["nombre_r"]);
    $_POST["empresa"] = htmlentities($_POST["empresa"]);
    $_POST["email_r"] = htmlentities($_POST["email_r"]);
    $_POST["password_r"] = htmlentities($_POST["password_r"]);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if($_POST["email_r"] == $row['email']){
             header('location: /../index.php');
             die();
            }
        }
    }


    if (isset($_POST["nombre_r"])
        && isset($_POST["empresa"])
        && isset($_POST["email_r"])
        && isset($_POST["password_r"])
        && $_POST["nombre_r"] != ""
        && $_POST["empresa"] != ""
        && $_POST["email_r"] != ""
        && $_POST["password_r"] != ""){

        if(insert_new_user($_POST["nombre_r"],password_hash($_POST["password_r"],PASSWORD_DEFAULT),$_POST["email_r"],'2',$_POST["empresa"])){
            header('location: /../index.php');

        }else{
            header('location: /../index.php');
        }
    }

}

