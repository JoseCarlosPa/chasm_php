<?php
require_once('functional/_bd_connections.php');
$result = ob4($_GET['pagina']);
$query_table = "";

if (mysqli_num_rows($result) > 0) {
    //output data of each row;
    while ($row = mysqli_fetch_assoc($result)) {

        $query_table .= '
       
                <div class="col-sm-4">
                    <a href="_producto_interes.php?id='.$row['id_productos'].'" class="links_cards">
                        <div class="card card_shadow" style="width: 14rem;height: 35rem;">
                            <div class="trapezoid3 "><p style="margin-top: 10%">Comprar</p></div>
                            <br>
                            <img class="card-img-top" src="imgs/tienda/productos/' . $row["imagen"] . '" alt="Card image cap" height="110rem" width="20rem">
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

    }
    echo $query_table;

}




?>