<?php
require_once ('_bd_connections.php');

session_start();

if (isset($_POST["submit"])) {

    $_POST['email'] = htmlentities($_POST['email']);
    $_POST['password'] = htmlentities($_POST['password']);

    if (isset($_POST["email"]) && isset($_POST["password"])) {

        $_POST['email'] = htmlentities($_POST['email']);
        $_POST['password'] = htmlentities($_POST['password']);

        if($_POST['email'] == 'admin@admin.com' && $_POST['password'] == '123'){
            header('location: ../admin');
        }else{
            header('location: ../index');
        }
    }

}else{
    header('location: ../index');
}

