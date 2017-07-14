<div id="people-section">
    <h3 class="page-header">Registrar nueva persona</h3>
    <div class="col-md-8 col-md-push-2">
        <form class="mainform" method="post">
            <div class="form-group">
                <input class="form-control" type="text" name="cedula" placeholder="Cédula">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="nombre" placeholder="Nombre">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="nombre" placeholder="Apellidos">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="tels" rows="8" cols="80"></textarea>
            </div>
            <div class="form-group">
                <label>Ubicación</label>
                <hr>
                <p class="help-block">Provincia</p>
                <select class="form-control" name="provincia">
                    <option value="0">-Seleccionar provincia-</option>
                    <option value="1">San José</option>
                    <option value="2">Alajuela</option>
                    <option value="3">Cartago</option>
                    <option value="4">Heredia</option>
                    <option value="5">Guanacaste</option>
                    <option value="6">Puntarenas</option>
                    <option value="7">Limón</option>
                </select>
                <p class="help-block">Cantón</p>
                <select class="form-control" name="canton" disabled>
                    <option value="0">-Seleccionar cantón-</option>
                </select>
                <p class="help-block">Distrito</p>
                <select class="form-control" name="distrito" disabled>
                    <option value="0">-Seleccionar distrito-</option>
                </select>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="direccion" rows="8" cols="80"></textarea>
            </div>
            <div class="form-group">
                <input class="form-control" type="ocupacion" name="" placeholder="Ocupación">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="contacto" rows="8" cols="80"></textarea>
            </div>
        </form>
    </div>
</div>
