<?php

require_once('functional/_bd_connections.php');
$result = ob2();
$query_table = "";
echo 'Tablas';
if (mysqli_num_rows($result) > 0) {
    //output data of each row;
    while ($row = mysqli_fetch_assoc($result)) {
        $query_table .= "<tr>";
        $query_table .= '<td>' . $row["id_productos"] . '</td>';
        $query_table .= '<td>' . $row["nombre"] . '</td>';
        $query_table .= '<td>' . $row["descripcion"] . '</td>';
        $query_table .= '<td>' . $row["cantidad"] . '</td>';
        $query_table .= '<td>
                            <a class="modal-trigger btn btn-primary" href="javascript:void(0);"                       
                                onclick="">Info
                            </a>
                        </td>';
        $query_table .=
            '<td>
                        <a class="btn btn-medium waves-effect waves-light modal-trigger amber darken-1 accent-3 hoverable" href="" onclick="">
                            <i class="btn btn-warning">Editar</i>
                        </a>
                    </td>';
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
            
                <table class="table table-striped table-bordered text-center"   id="mydatatable" width="100%">
                    <thead>
                        <tr class="my_table_headers">
                            <th class="th-sm">ID</th>
                            <th class="th-sm">Nombre</th>
                            <th class="th-sm">Descripcion</th>
                            <th class="th-sm">Cantidad</th>
                            
                            <th class="th-sm">Más Información</th>
                            <th class="th-sm">Editar</th>
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