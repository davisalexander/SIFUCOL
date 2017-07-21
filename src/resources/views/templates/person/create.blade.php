<div class="col-lg-12 mainform">
    <div class="col-md-6 col-md-push-3">
        <form id="persondata" class="form-horizontal" style="padding:1em 0" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label col-sm-3">Identificación:</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="cedula" placeholder="No. de Identificación">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Nombre:</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="nombre" placeholder="Ingrese el nombre">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Apellidos:</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="apellidos" placeholder="Ingrese los apellidos">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Ocupación:</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="ocupacion" placeholder="Ingrese la ocupación">
                </div>
            </div>
            <div class="form-group col-sm-10 col-sm-push-1">
                <label>Número(s) de teléfono:</label>
                <textarea class="form-control" name="tels" rows="3"></textarea>
            </div>
            <div class="form-group col-sm-10 col-sm-push-1">
                <label>Ubicación:</label>
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
            <div class="form-group col-sm-10 col-sm-push-1">
                <label>Dirección exacta:</label>
                <textarea class="form-control" name="direccion" rows="5"></textarea>
            </div>
            <div class="form-group col-sm-10 col-sm-push-1">
                <label>Contacto(s):</label>
                <textarea class="form-control" name="contacto" rows="5"></textarea>
            </div>
        </form>
    </div>
</div>
