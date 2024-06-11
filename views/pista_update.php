<?php
require_once "./php/main.php";

$id = (isset($_GET['pista_id_up'])) ?  $_GET['pista_id_up'] : 0;
$id = limpiar_cadena($id);
?>

<div class="container is-fluid mb-6">
    <?php if ($id == $_SESSION['id']) { ?>
        <h1 class="title">Pistas</h1>
        <h2 class="subtitle">Actualizar pistas</h2>
    <?php  } else { ?>
        <h1 class="title">Pistas</h1>
        <h2 class="subtitle">Actualizar Pista</h2>
    <?php } ?>
</div>

<div class="container pb-6 pt-6">

    <?php
    include './common/btn_back.php';
    $check_user = conection();
    $check_user = $check_user->query("select * from pistas where pista_id = '$id'");
    if ($check_user->rowCount() > 0) {
        $datos = $check_user->fetch();
    ?>

        <div class="form-rest mb-6 mt-6"></div>

        <form action="./php/pista_update.php" method="POST" class="FormularioAjax" autocomplete="off">

            <input type="hidden" name="pista_id" value="<?php echo $datos['pista_id']; ?>" required>

            <div class="columns">
                <div class="column">
                    <div class="control">
                        <label>Nombre</label>
                        <input class="input" type="text" name="nombre" value='<?php echo $datos["nombre"]; ?>' pattern="[a-zA-Z1-9 ]{3,40}" maxlength="40" required>
                    </div>
                </div>
                <div class="column">
                    <div class="control">
                        <label>Tipo</label>
                        <input class="input" type="text" name="tipo" value="<?php echo $datos['tipo']; ?>" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required>
                    </div>
                </div>               
            </div>                          
        </div>
                
            
            <p class="has-text-centered">
            <button type="submit" class="button is-success is-rounded">Actualizar</button>
            </p>
        </form>
    <?php

    } else {
        include './common/error_alert.php';
    }
    $check_user = null;
    ?>

</div>