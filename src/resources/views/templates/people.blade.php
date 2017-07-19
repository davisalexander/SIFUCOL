<div id="people-section" class="row" ng-controller="PersonaController">
    <header>
        <h3 class="col-sm-8 col-md-8 col-md-push-2 page-header">
            <span>Registrar nueva persona</span>
            <button ng-click="submit()" class="btn btn-success btn-sm" type="button">Guardar registro</button>
        </h3>
    </header>
    <div class="col-lg-12 mainform">
        <div class="col-md-6 col-md-push-3">
            <form class="form-horizontal" style="padding:1em 0" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label col-sm-3">Identificación:</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="cedula" placeholder="No. de Identificación">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Nombre:</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="nombre" placeholder="Ingrese el nombre">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Apellidos:</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="apellidos" placeholder="Ingrese los apellidos">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Ocupación:</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="ocupacion" placeholder="Ingrese la ocupación">
                    </div>
                </div>
                <div class="form-group">
                    <label>Número(s) de teléfono:</label>
                    <textarea class="form-control" name="tels" rows="3"></textarea>
                </div>
                <div class="form-group">
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
                <div class="form-group">
                    <label>Dirección exacta:</label>
                    <textarea class="form-control" name="direccion" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label>Contacto(s):</label>
                    <textarea class="form-control" name="contacto" rows="5"></textarea>
                </div>
            </form>
        </div>
    </div>
</div>
