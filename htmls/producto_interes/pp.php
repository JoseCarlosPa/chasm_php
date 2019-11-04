<?php
require_once('functional/_bd_connections.php');
$result = producto($_GET['id']);

$row = mysqli_fetch_assoc($result);
$query_table = '
       
                <div class="col-sm-4">
                    <a href="#" class="links_cards">
                        <div class="card card_shadow" style="width: 30rem;height: 30rem;">
                            <img class="card-img-top" src="imgs/tienda/productos/' . $row["imagen"] . '" alt="Card image cap" width="25rem" height="300rem">
                            <div class="card-body">
                                <h5 class="card-title">' . $row["nombrep"] . ' </h5>
                                <p class="card-text">' . $row["descripcion"] . ' </p>

                                <img src="imgs/miniaturas/carrito.svg" width="20%" height="20%"> $' . $row["precio"] . '
                            </div>
                        </div>
                    </a>
                     <br><br>
                </div>
               
  
        ';

    echo '
            <div class ="banner_container">
    <br><br><br><br><br><br><br><br><br>
    <div class ="index_papel1"><br><br><br><br></div>
        </div>
        <br><br><br>
        <div class ="row">
            <div class ="col-sm-6">
                <div class ="container_index">
                    <form method="post" action="send_mail.php">
                        <div class="form-group">
                            <input type="text" class="form-control" style="width: 30em;text-align: left" id="nombre" name ="nombre" aria-describedby="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" style="width: 30em;text-align: left" id="ubicacion" name ="ubicacion"aria-describedby="ubicacion" placeholder="Ubicacion">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" style="width: 30em;text-align: left" id="mail" name ="mail"aria-describedby="mail" placeholder="Correo electronico">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" style="width: 30em;text-align: left" id="asunto" name ="asunto"aria-describedby="asunto" placeholder="Asunto">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" style="width: 30em;text-align: left" id="mensaje"name ="mensaje" aria-describedby="mensaje" value="Articulo ' . $row["nombrep"] . '">
                        </div>
                        <br><br>
                        <div class ="form-group">
                            <input type="submit" name ="submit" class ="input_contacto">
                        </div>
                    </form>
                    <br><br>
                </div>
            </div>
            <div class ="col-sm-6">
                '.$query_table.'
            </div>
        </div>
    ';



?>