<?php

require_once('functional/_bd_connections.php');
$result = ob3();
$query_table = "";

if (mysqli_num_rows($result) > 0) {
    //output data of each row;
    while ($row = mysqli_fetch_assoc($result)) {
        $query_table .= "<tr>";
        $query_table .= '<td>' . $row["id_usuario"] . '</td>';
        $query_table .= '<td>' . $row["nombre"] . '</td>';
        $query_table .= '<td>' . $row["email"] . '</td>';
        $query_table .= '<td>' . $row["user_type_id"] . '</td>';
        $query_table .= '<td>' . $row["empresa"] . '</td>';
        $query_table .= '<td>
                        <a class="btn btn-medium waves-effect waves-light red accent-3 hoverable" href="">
                            <i class="btn btn-danger">Eliminar</i>
                        </a>
                    </td>';
        $query_table .= "</tr>";
    }
    echo '

        <div class="wrapper">
            <div class="table-wrapper responsive-table new_data_table">
            
                <table class="table table-striped table-bordered text-center"   id="mydatatable2" width="100%">
                    <thead>
                        <tr class="my_table_headers">
                            <th class="th-sm">ID</th>
                            <th class="th-sm">Nombre</th>
                            <th class="th-sm">email</th>
                            <th class="th-sm">Tipo de usuarios</th>
                            <th class="th-sm">Empresa</th>
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




?>