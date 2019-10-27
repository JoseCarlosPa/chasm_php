<?php
require_once ('_bd_connections.php');

session_start();

if (isset($_POST["submit"])) {

    $_POST['email'] = htmlentities($_POST['email']);
    $_POST['password'] = htmlentities($_POST['password']);

    if (isset($_POST["email"]) && isset($_POST["password"])) {

        $_POST['email'] = htmlentities($_POST['email']);
        $_POST['password'] = htmlentities($_POST['password']);



        if (autentificarse(($_POST["email"]), ($_POST["password"]))) {
            $usuario = login($_POST["email"], $_POST["password"]);
            if (mysqli_num_rows($usuario)) {
                while ($row = mysqli_fetch_assoc($usuario)) {
                    //asigna a sesion el nombre de la personas
                    if (!isset($_SESSION['usuario'])) {
                        $_SESSION['usuario'] = $row['nombre'];
                    } else {
                        $_SESSION['usuario'] = $row['nombre'];
                    }
                    $_SESSION['user_type_id'] = $row['user_type_id'];
                    $_SESSION['nombre'] = $row['nombre'];
                    $_SESSION['nombre'] = $row['empresa'];
                    $_SESSION['id_usuario'] = $row['id_usuario'];
                }
                if($_SESSION['user_type_id'] == 1){
                    header('location: ../admin.php');
                }else{
                    header('location: ../index.php');
                }

            }

        }else{
            header('location: ../index.php');
        }

        /*

        if($_POST['email'] == 'admin@admin.com' && $_POST['password'] == '123'){

        }else{

        }
        */
    }

}else{
    header('location: ../index');
}

