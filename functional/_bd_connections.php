<?php
session_start();
$GLOBALS['local_servidor'] =1;
$_SESSION['error_bd_login'] = 0;
//se conecta con la base de datos indicada
function conectDb()
{
    if($GLOBALS['local_servidor'] == 0){
        $servername = "mx76";
        $username = "mochilas";
        $password = "V6l3Z.jq2LwJ#7";
        $dbname = "mochilas_chasm";
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

    $sql = "INSERT INTO usuarios (nombreu,password,email,user_type_id,empresa) VALUES ('$nombre','$password','$email','$user_type_id','$empresa')";
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

function autentificarse($email, $password)
{
    $conn = conectDb();
    $sql = "SELECT password,user_type_id FROM usuarios WHERE email = ?";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        closeDB($conn);
    }
    $row = mysqli_fetch_assoc($result);
    $contra = password_verify($password, $row['password']);
    return $contra;
}

function login($email, $password)
{
    $conn = conectDb();
    $sql = "SELECT id_usuario,nombreu,user_type_id,empresa FROM usuarios WHERE email = ?";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    }
    closeDB($conn);
    return $result;
}


function ob2(){
    $conn = conectDb();
    $sql = "SELECT * FROM productos,clases where clases.id_clases = productos.id_clase";
    $result = mysqli_query($conn,$sql);
    return $result;

}

function ob4($inicio){

    $tamanio_pagina = 9;
    $pagina = $inicio;
    $empezar_desde = ($pagina-1)*$tamanio_pagina;

    $conn = conectDb();
    $sql = "SELECT * FROM productos,clases where clases.id_clases = productos.id_clase LIMIT $empezar_desde,$tamanio_pagina";
    $result = mysqli_query($conn,$sql);
    $numeroFilas = mysqli_num_rows($result);
    $total_paginas = ceil($numeroFilas/$tamanio_pagina);

    return $result;

}

function ob5($inicio){

    $tamanio_pagina = 9;
    $pagina = $inicio;
    $empezar_desde = ($pagina-1)*$tamanio_pagina;

    $conn = conectDb();
    $sql = "SELECT * FROM productos LIMIT $empezar_desde,$tamanio_pagina";
    $result = mysqli_query($conn,$sql);
    $numeroFilas = mysqli_num_rows($result);
    $total_paginas = ceil($numeroFilas/$tamanio_pagina);

    return $result;

}

function paginacion(){

    $tamanio_pagina = 9;

    $conn = conectDb();
    $sql = "SELECT * FROM productos ";
    $result = mysqli_query($conn,$sql);
    $numeroFilas = mysqli_num_rows($result);
    $total_paginas = ceil($numeroFilas/$tamanio_pagina);

    for($i = 1; $i<=$total_paginas; $i++){
        echo '<li class="page-item"><a class="page-link" href="tienda.php?pagina='.$i.'" >'.$i.'</a></li>' ;
    }

    return true;

}


function producto($id){

    $conn = conectDb();
    $sql = "SELECT * FROM productos,clases where clases.id_clases = productos.id_clase and id_productos = $id";
    $result = mysqli_query($conn,$sql);
    return $result;

}


function insert_new_prodcut($nombre,$descripcion,$precio,$color,$id_clase,$id_subclases,$cantidad,$imagen){
    $conn = conectDb();

    $sql = "INSERT INTO productos (nombrep,descripcion,precio,color,id_clase,id_subclases,cantidad,imagen) VALUES ('$nombre','$descripcion','$precio','$color','$id_clase','$id_subclases','$cantidad','$imagen')";
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

function eliminarUsuarioPorID($id_usuario)
{
    $conn = conectDb();
    $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param('i', $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        closeDB($conn);
        return true;
    } else{
        closeDB($conn);
        return false;
    }
    closeDB($conn);
}

function eliminarproductoPorID($id_producto)
{
    $conn = conectDb();
    $sql = "DELETE FROM productos WHERE id_productos = ?";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param('i', $id_producto);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        closeDB($conn);
        return true;
    } else{
        closeDB($conn);
        return false;
    }
    closeDB($conn);
}


function informacionProducto($id_producto)
{
    $conn = conectDb();
    $sql = "select * FROM productos,clases,sublcases WHERE id_productos = '$id_producto' and productos.id_clase = clases.id_clases and productos.id_subclases = sublcases.id_subclase";
    $result = mysqli_query($conn,$sql);
    return $result;
}

function ob3(){
    $conn = conectDb();
    $sql = "SELECT * FROM usuarios,usertype where usertype.id_usertype = usuarios.user_type_id";
    $result = mysqli_query($conn,$sql);
    return $result;

}


function modificarProducto($id,$nombre,$descripcion,$preciop,$preciou,$cantidad,$imagen){
    $conn = conectDb();
    $sql = "UPDATE productos SET cantidad = '$cantidad',nombrep = '$nombre',descripcion = '$descripcion',precio = '$preciop',precio_p = '$preciou',imagen = '$imagen' WHERE id_productos = '$id'";
    $result = mysqli_query($conn,$sql);
    return $result;
}

function mostrarClases(){
    $conn = conectDb();
    $sql = "SELECT * FROM clases";
    $result = mysqli_query($conn,$sql);
    return $result;
}

function insert_new_class($nombre){
    $conn = conectDb();

    $sql = "INSERT INTO clases (nombrec) VALUES ('$nombre')";
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

function eliminarClasePorID($id_clase){
    $conn = conectDb();
    $sql = "DELETE FROM clases WHERE id_clases = ?";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param('i', $id_clase);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        closeDB($conn);
        return true;
    } else{
        closeDB($conn);
        return false;
    }
    closeDB($conn);

}


function mostrarSubClases(){
    $conn = conectDb();
    $sql = "SELECT * FROM sublcases";
    $result = mysqli_query($conn,$sql);
    return $result;
}

function insert_new_subclass($nombre){
    $conn = conectDb();

    $sql = "INSERT INTO sublcases (nombresc) VALUES ('$nombre')";
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

function eliminarSubClasePorID($id_clase){
    $conn = conectDb();
    $sql = "DELETE FROM sublcases WHERE id_subclase = ?";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param('i', $id_clase);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        closeDB($conn);
        return true;
    } else{
        closeDB($conn);
        return false;
    }
    closeDB($conn);

}