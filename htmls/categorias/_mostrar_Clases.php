<?php

require_once('functional/_bd_connections.php');
$result = mostrarClases();
$query_table = "";

if (mysqli_num_rows($result) > 0) {
    //output data of each row;
    while ($row = mysqli_fetch_assoc($result)) {
        $query_table .= "<tr>";
        $query_table .= '<td>' . $row["id_clases"] . '</td>';
        $query_table .= '<td>' . $row["nombrec"] . '</td>';

        $query_table .= '<td>
               
                        <a class="btn btn-medium waves-effect waves-light red accent-3 hoverable" href="functional/_eliminar_clases.php?id='.$row['id_clases'].'">
                            <i class="btn btn-danger">Eliminar</i>
                        </a>
                    </td>';
        $query_table .= "</tr>";
    }
    echo '

        <div class="wrapper">
            <div class="table-wrapper responsive-table new_data_table">
            
                <table class="table table-striped table-bordered text-center"   id="mydatatable3" width="80%">
                    <thead>
                        <tr class="my_table_headers">
                            <th class="th-sm">ID</th>
                            <th class="th-sm">Nombre</th>
                            <th class="th-sm">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>' . $query_table . '</tbody>
                    <tfoot></tfoot>
            </table>
         </div>
    </div>
    
    
';



    $result = mostrarSubClases();
    $query_table = "";

    if (mysqli_num_rows($result) > 0) {
        //output data of each row;
        while ($row = mysqli_fetch_assoc($result)) {
            $query_table .= "<tr>";
            $query_table .= '<td>' . $row["id_subclase"] . '</td>';
            $query_table .= '<td>' . $row["nombresc"] . '</td>';

            $query_table .= '<td>
               
                        <a class="btn btn-medium waves-effect waves-light red accent-3 hoverable" href="functional/_eliminar_subclases.php?id='.$row['id_subclase'].'">
                            <i class="btn btn-danger">Eliminar</i>
                        </a>
                    </td>';
            $query_table .= "</tr>";
        }
        echo '
<br><br>
        <div class ="row">
    <div class ="col-sm-12 text-right">
        <button class ="admin_button" data-toggle="modal" data-target="#exampleModal2">Agregar SubClase</button>
    </div>

</div>
<br><br>
        <div class="wrapper">
            <div class="table-wrapper responsive-table new_data_table">
            
                <table class="table table-striped table-bordered text-center"   id="mydatatable4" width="80%">
                    <thead>
                        <tr class="my_table_headers">
                            <th class="th-sm">ID</th>
                            <th class="th-sm">Nombre</th>
                            <th class="th-sm">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>' . $query_table . '</tbody>
                    <tfoot></tfoot>
            </table>
         </div>
    </div>
    
   
';
    }
}




?>

