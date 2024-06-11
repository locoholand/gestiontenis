   <?php
    //require_once './php/main.php';
    $start = ($page > 0) ? (($register_page * $page) - $register_page) : 0;
    $table = '';

    if (isset($search) && $search != "") {
        $query = "select * from users where(( user_id != '" . $_SESSION['id']
            . "') and activo=1 and (user_name like '%$search%' or dni like '%$search%' or user_last_name like '%$search%' or email like '%$search%'))
            order by user_name asc limit $start, $register_page";

        $total_query = "select count(user_id) from users where (( user_id != '" . $_SESSION['id']
            . "')and (user_name like '%$search%' or dni like '%$search%' or user_last_name like '%$search%' or email like '%$search%'))";
    } else {

        $query = "select * from users where activo=1 and user_id != '" . $_SESSION['id']
            . "'order by user_name asc limit $start, $register_page";

        $total_query = "select count(user_id) from users where activo=1 and user_id != '"
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
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th colspan="2">Opciones</th>
                </tr>
            </thead>
            <tbody>';


    if ($total >= 1 && $page <= $npages) {
        $count = $start + 1;
        $page_st = $start + 1;

        foreach ($datos as $rows) {
            $table .= '<tr class="has-text-centered">
                    <td>' . $count . '</td>
                    <td>' . $rows['dni'] . '</td>
                    <td>' . $rows['user_name'] . '</td>
                    <td>' . $rows['user_last_name'] . '</td>
                    <td>' . $rows['user'] . '</td>
                    <td>' . $rows['email'] . '</td>
                    <td>' . $rows['role'] . '</td>

                    <td>
                        <a href="index.php?vista=user_update&user_id_up=' . $rows['user_id'] . '" class="button is-success is-rounded is-small">Actualizar</a>
                    </td>
                    <td>
                        <a href="' . $url . $page . '&user_id_del=' . $rows['user_id'] . '" class="button is-danger is-rounded is-small">Eliminar</a>
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
        $table .= ' <p class="has-text-right">Mostrando usuarios 
        <strong>' . $page_st . '</strong> al <strong>' . $page_end . '</strong> de un <strong>total de ' . $total . '</strong></p>';
    }

    $conection = null;
    echo $table;
    if ($total >= 1 && $page <= $npages) {
        echo paginador_tablas($page, $npages, $url, 5);
    }
    ?>