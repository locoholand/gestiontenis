<div class="container is-fluid mb-6">
    <h1 class="title">Pistas</h1>
    <h2 class="subtitle">Lista de pistas</h2>
</div>

<div class="container pb-6 pt-6">

    <?php
    require_once './php/main.php';

    //Eliminar pista
    if (isset($_GET['pista_id_del'])) {
        require_once './php/pista_delete.php';
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
    $url = 'index.php?vista=pista_list&page=';
    $register_page = 10;
    $search = '';

    require_once './php/pista_list.php';

    ?>