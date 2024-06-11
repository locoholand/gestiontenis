<div class="container is-fluid mb-6">
    <h1 class="title">Clases Grupales</h1>
    <h2 class="subtitle">Lista de Clases Grupales</h2>
</div>

<div class="container pb-6 pt-6">

    <?php
    require_once './php/main.php';

    //Eliminar usuario
    if (isset($_GET['clase_id_del'])) {
        require_once './php/clasegrupal_delete.php';
    }
    //Comprobar si viene definida la variable del numero de paginas
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = (int) $_GET['page'];
        if ($page <= 1) {
            $page = 1;
        }
    }

    $page = limpiar_cadena($page);
    $url = 'index.php?vista=user_list&page=';
    $register_page = 10;
    $search = '';

    require_once './php/clasegrupal_list.php';

    ?>

