<div class="container is-fluid mb-6">
    <h1 class="title">Tipos de Clases</h1>
    <h2 class="subtitle">Nuevos tipos de Clases</h2>
</div>
<div class="container pb-6 pt-6">

    <div class="form-rest mb-6 mt-6"></div>

    <form class="FormularioAjax" action="./php/save_clases.php" method="POST" autocomplete="off">

        <div class="column">
            <div class="control">

                <input class="input" type="text" name="tipoclases_nombre" pattern="[a-zA-Z0-9$@.\- áéíóúÁÉÍÓÚñÑüÜ]{3,40}" maxlength="40" placeholder="Introduzca el tipo de Clase">
            </div>
        </div>

        <div class="column">
            <div class="control">

                <input class="input" type="text" name="descripcion_clase" pattern="[a-zA-Z0-9$@.\- áéíóúÁÉÍÓÚñÑüÜ]{3,60}" maxlength="40" placeholder="Introduzca la descripción de la Clase">
            </div>
        </div>
        <div class="column">
            <div class="control">

                <input class="input" type="text" name="user_id" hidden  value="<?php echo $_SESSION['id'] ?>" maxlength="40" placeholder="Introduzca la descripción de la Clase">
            </div>
        </div>

        <p class="has-text-centered">
            <button type="submit" class="button is-info is-rounded">Guardar</button>
        </p>

    </form>
</div>