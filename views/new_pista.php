<div class="container is-fluid mb-6">
    <h1 class="title">Pistas</h1>
    <h2 class="subtitle">Nueva Pista</h2>
</div>
<div class="container pb-6 pt-6">

    <div class="form-rest mb-6 mt-6"></div>

    <form class="FormularioAjax" action="./php/save_pista.php" method="POST" autocomplete="off">

        <div class="column">
            <div class="control">

                <input class="input" type="text" name="pista_name" pattern="[a-zA-Z1-9 ]{2,10}" maxlength="40" placeholder="Introduzca el nombre de la pista">
            </div>
        </div>

        <!--div class="column">
            <div class="control">
                <input class="input" type="text" name="pista_horario" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" placeholder="Introduzca el horario">
            </div>
        </div-->

        <div class="column">
            <div class="control">

                <div class="select is-warning">


                    <select name="pista_tipo">
                        <option>--Seleccione el tipo de pista--</option>
                        <option value="Tenis">Tenis</option>
                        <option value="Padel">Padel</option>
                    </select>
                </div>
            </div>
        </div>

        <!--input type="datetime-local" name="fecha" id=""-->

        <p class="has-text-centered">
            <button type="submit" class="button is-info is-rounded">Guardar</button>
        </p>

    </form>
</div>