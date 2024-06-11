<?php
$tipoclases_id_del = limpiar_cadena($_GET['tipoclases_id_del']);
$check_clases = conection();
$check_clases = $check_clases->query("select tipoclases_id from tipo_clases where tipoclases_id='$tipoclases_id_del'");
if ($check_clases->rowCount() == 1) {

    $check_reservaclases = conection();
    $check_reservaclases = $check_reservaclases->query("select tipoclases_id from reserva where user_id = '$user_id_del' limit 1");
    if ($check_reservaclases->rowCount() == 1) {
        echo
        '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         El usuario tiene una reserva asociada, no se puede eliminar
        </div>';
    } else {
        $clases_delete = conection();
        $clases_delete = $clases_delete->prepare("delete from tipo_clases where tipoclases_id =:id");
        $clases_delete->execute([":id" => $tipoclases_id_del]);

        if ($user_delete->rowCount() == 1) {
            echo
            '<div class="notification is-info is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         La clase fue eliminada
        </div>';
        } else {
            echo
            '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         No se pudo eliminar la clase
        </div>';
        }
    }
    $check_reserva = null;
} else {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         La Clase no existe
        </div>';
}

$check_user = null;