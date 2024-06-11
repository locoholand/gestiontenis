<div class="container is-fluid mb-6">
    <h1 class="title">Clases</h1>
    <h2 class="subtitle">Lista de Clases</h2>
</div>

<div class="container pb-6 pt-6">

    <?php
    require_once './php/main.php';

    //Eliminar usuario
    if (isset($_GET['tipoclases_id_del'])) {
        require_once './php/tipoclases_delete.php';
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
    $url = 'index.php?vista=clase_list&page=';
    $register_page = 10;
    $search = '';

    require_once './php/clase_list.php';

    ?>














</div>