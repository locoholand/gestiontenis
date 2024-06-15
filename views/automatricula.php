<?php
require_once "./php/main.php";

$id = (isset($_GET['clase_id'])) ?  $_GET['clase_id'] : 0;
$user_id = $_SESSION['id'];
$clase_id = limpiar_cadena($id);

$save_matricula = conection();
$save_matricula = $save_matricula->query("insert into user_clase(user_id, clase_id) values('$user_id', '$clase_id')");
if ($save_matricula->rowCount() > 0) {
    echo
    '<div class="notification is-info is-light">
         <strong>¡USUARIO REGISTRADO!</strong><br>
        El usuario se resgistró correctamente!!!.
        </div>';
} else {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         No se pudo registrar el usuario!!!.
        </div>';
}
