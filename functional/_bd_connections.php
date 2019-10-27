<?php
session_start();
$GLOBALS['local_servidor'] =1;
$_SESSION['error_bd_login'] = 0;
//se conecta con la base de datos indicada
function conectDb()
{
    if($GLOBALS['local_servidor'] == 0){
        $servername = "db5000198857.hosting-data.io";
        $username = "dbu146184";
        $password = "M1-escuela-es";
        $dbname = "dbs193863";
    }else{
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "Chasm_db";
    }
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

function closeDb($mysql)
{
    $mysql->close();
}
function insert_new_user($nombre,$password,$email,$user_type_id,$empresa){
    $conn = conectDb();

    $sql = "INSERT INTO usuarios (nombre,password,email,user_type_id,empresa) VALUES ('$nombre','$password','$email','$user_type_id','$empresa')";
    if (mysqli_query($conn, $sql)) {
        closeDb($conn);
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        closeDb($conn);
        return false;
    }
    closeDb($conn);
}

function consultar_correos(){
    $conn = conectDb();

    $sql = "SELECT email FROM usuarios";
    if($stmt = $conn->prepare($sql)){
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    }
    closeDB($conn);

    return $result;
}

function autentificarse($email)
{
    $conn = conectDb();
    $sql = "SELECT password FROM usuarios WHERE email = 'jose@ex.com'";
    if (mysqli_query($conn, $sql)) {
        closeDb($conn);
        $valor = mysqli_fetch_row($sql);
        echo 'Hay un: '.$valor[0];
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        closeDb($conn);
        return false;
    }
    closeDb($conn);
}


function ob2(){
    $conn = conectDb();
    $sql = "SELECT * FROM productos";
    $result = mysqli_query($conn,$sql);
    return $result;

}

function obtenerProductos()
{
    $conn = conectDb();
    $sql = "SELECT id_productos,nombre, descripcion, precio, color, id_clase, id_subclases , cantidad FROM productos";
    if($stmt = $conn->prepare($sql)){
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    }
    closeDB($conn);
    return $result;
}




