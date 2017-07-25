<form id="persondata" class="form-horizontal async" style="padding:1em 0" method="post" name="persondata">
    {{ csrf_field() }}
    <div class="form-group">
        <label class="control-label col-sm-3">Identificación:</label>
        <div class="col-sm-7">
            <span ng-show="@{{!!persona.actual}}" style="color:#DC5353;font-size:12px"><span class="glyphicon glyphicon-asterisk"></span> Este campo no es editable</span>
            <input class="form-control" type="text" name="cedula" placeholder="No. de Identificación" value="@{{persona.actual.cedula}}" ng-model="persona.actual.cedula" ng-disabled="@{{!!persona.actual.cedula}}" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Nombre:</label>
        <div class="col-sm-7">
            <input class="form-control" type="text" name="nombre" placeholder="Ingrese el nombre" value="@{{persona.actual.nombre}}" ng-model="persona.actual.nombre" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Apellidos:</label>
        <div class="col-sm-7">
            <input class="form-control" type="text" name="apellidos" placeholder="Ingrese los apellidos" value="@{{persona.actual.apellidos}}" ng-model="persona.actual.apellidos">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Ocupación:</label>
        <div class="col-sm-7">
            <input class="form-control" type="text" name="ocupacion" placeholder="Ingrese la ocupación" value="@{{persona.actual.ocupacion}}" ng-model="persona.actual.ocupacion">
        </div>
    </div>
    <div class="form-group col-sm-10 col-sm-push-1">
        <label>Número(s) de teléfono:</label>
        <textarea class="form-control" name="tels" rows="3" ng-model="persona.actual.tels">@{{persona.actual.tels}}</textarea>
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
