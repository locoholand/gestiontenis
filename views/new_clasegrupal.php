<div class="container is-fluid mb-6">
    <h1 class="title">Clases Grupales</h1>
    <h2 class="subtitle">Nueva Clase en Grupo</h2>
</div>
<div class="container pb-6 pt-6">

    <div class="form-rest mb-6 mt-6"></div>

    <form class="FormularioAjax" action="./php/save_clasegrupal.php" method="POST" autocomplete="off">

        <div class="column">
            <div class="control">

                <input class="input" type="text" name="descripcion_clase" pattern="[a-zA-Z0-9$@.\- áéíóúÁÉÍÓÚñÑüÜ]{3,40}" maxlength="50" placeholder="Introduzca la descripcion de la clase">
            </div>
        </div>
        <div class="column">
            <div class="control">
                <input class="input" type="text" name="fecha_inicio" pattern="[a-zA-Z1-9 ]{3,40}" maxlength="40" placeholder="Introduzca fecha de comienzo de la clase">
            </div>
        </div>
        <div class="column">
            <div class="control">
                <input class="input" type="text" name="fecha_fin" pattern="[a-zA-Z1-9 ]{3,40}" maxlength="40" placeholder="Introduzca la fecha de finalizacion de las clases">
            </div>
        </div>

        <div class="column">
            <div class="control">

                <div class="select is-warning">

                    <select name="cantidad_alumno">
                        <option>--Seleecione el numero de alumnos--</option>
                        <option value="1">Uno</option>
                        <option value="2">Dos</option>
                        <option value="3">Tres</option>
                        <option value="4">Cuatro</option>
                        <option value="5">Cinco</option>
                        <option value="6">Seis</option>
                        <option value="7">Siete</option>
                        <option value="8">Ocho</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="control">
                <input class="input" type="number" name="user_id" maxlength="20" placeholder="Introduzca el nombre del monitor">
            </div>
        </div>

        <div class="column">
            <div class="control">
                <input class="input" type="number" name="pista_id" maxlength="20" placeholder="Introduzca la pista a reservar">
            </div>
        </div>
        
        <p class="has-text-centered">
            <button type="submit" class="button is-info is-rounded">Guardar</button>
        </p>

    </form>
</div>