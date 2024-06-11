<?php
    //require_once './php/main.php';
    $start = ($page > 0) ? (($register_page * $page) - $register_page) : 0;
    $table = '';

    if (isset($search) && $search != "") {
        $query = "select * from clases_grupal where(( clase_id != '" . $_SESSION['id']
            . "') and (descripcion_clase like '%$search%'))
            order by descripcion_clase asc limit $start, $register_page";

        $total_query = "select count(clase_id) from clases_grupal where (( clase_id != '" . $_SESSION['id']
            . "')and (descripcion_clase like '%$search%'))";
    } else {
        

        $query = "select * from clases_grupal where clase_id != '" . $_SESSION['id']
            . "'order by descripcion_clase asc limit $start, $register_page";

        $total_query = "select count(clase_id) from clases_grupal where clase_id != '"
            . $_SESSION['id'] . " '";
    }

    $conection = conection();

    $datos = $conection->query($query);
    $datos = $datos->fetchAll();
    $total = $conection->query($total_query);
    //$total = $total->fetchAll();


    $total = (int) $total->fetchColumn();

    $npages = ceil($total / $register_page);

    $table .= '<div class="table-container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="has-text-centered">
                    <th>#</th>
                    <th>Descripción</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Cantidad de alumnos</th>
                    <th>Monitor</th>
                    <th>Pista</th>
                    <th>Activo</th>
                </tr>
            </thead>
            <tbody>';


    if ($total >= 1 && $page <= $npages) {
        $count = $start + 1;
        $page_st = $start + 1;

        foreach ($datos as $rows) {
            $table .= '<tr class="has-text-centered">
                    <td>' . $count . '</td>
                    <td>' . $rows['descripcion_clase'] . '</td>
                    <td>' . $rows['fecha_inicio'] . '</td>
                    <td>' . $rows['fecha_fin'] . '</td>
                    <td>' . $rows['cantidad_alumno'] . '</td>
                    <td>' . $rows['user_id'] . '</td>
                    <td>' . $rows['pista_id'] . '</td>
                    <td>' . $rows['activo'] . '</td>
                    <td>
                        <a href="index.php?vista=clasesgrupal_update&clase_id_up=' . $rows['clase_id'] . '" class="button is-success is-rounded is-small">Actualizar</a>
                    </td>
                    <td>
                        <a href="' . $url . $page . '&clase_id_del=' . $rows['clase_id'] . '" class="button is-danger is-rounded is-small">Eliminar</a>
                    </td>
                </tr>';
            $count++;
        }
        $page_end = $count - 1;
    } else {
        if ($total >= 1) {
            $table .= '<tr class="has-text-centered">
                    <td colspan="7">
                        <a href="' . $url . '1" class="button is-link is-rounded is-small mt-4 mb-4">
                            Haga clic acá para recargar el listado
                        </a>
                    </td>
                </tr>';
            # code...
        } else {
            $table .= '<tr class="has-text-centered">
                    <td colspan="7">
                        No hay registros en el sistema
                    </td>
                </tr>';
        }
    }

    $table .= '</tbody></table></div>';
    if ($total >= 1 && $page <= $npages) {
        $table .= ' <p class="has-text-right">Mostrando Pistas
        <strong>' . $page_st . '</strong> al <strong>' . $page_end . '</strong> de un <strong>total de ' . $total . '</strong></p>';
    }

    $conection = null;
    echo $table;
    if ($total >= 1 && $page <= $npages) {
        echo paginador_tablas($page, $npages, $url, 5);
    }
    ?>