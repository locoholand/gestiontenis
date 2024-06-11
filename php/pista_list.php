<?php
    //require_once './php/main.php';
    $start = ($page > 0) ? (($register_page * $page) - $register_page) : 0;
    $table = '';

        $query = "select * from pistas where activo!=0 order by nombre asc limit $start, $register_page";

        $total_query = "select count(pista_id) from pistas";
    

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
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th colspan="2">Opciones</th>
                </tr>
            </thead>
            <tbody>';


    if ($total >= 1 && $page <= $npages) {
        $count = $start + 1;
        $page_st = $start + 1;

        foreach ($datos as $rows) {
            $table .= '<tr class="has-text-centered">
                    <td>' . $rows['nombre'] . '</td>
                    <td>' . $rows['tipo'] . '</td>                   
                    
                    <td>
                        <a href="' . $url . $page . '&pista_id_del=' . $rows['pista_id'] . '" class="button is-danger is-rounded is-small">Eliminar</a>
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