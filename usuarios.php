<?php

session_start();
if (isset($_SESSION['usuario'])) {

    include('htmls/usuarios/nav-bar.html');
}else{
    header('location: /../index.php');
}


