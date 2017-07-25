<div class="col-md-10 col-md-push-1">
    <nav class="navbar navbar-default navbar-sma" role="navigation">
        <span class="navbar-text"><b>Columnas visibles</b></span>
        <form class="navbar-form" style="padding-top:4px">
            <label class="checkbox-inline"><input type="checkbox" ng-model="persona.visible.cedula" ng-checked="true">Identificación</label>
            <label class="checkbox-inline"><input type="checkbox" ng-model="persona.visible.nombre">Nombre</label>
            <label class="checkbox-inline"><input type="checkbox" ng-model="persona.visible.apellidos">Apellidos</label>
            <label class="checkbox-inline"><input type="checkbox" ng-model="persona.visible.ocupacion">Ocupacion</label>
            <label class="checkbox-inline"><input type="checkbox" ng-model="persona.visible.region">Region</label>
        </form>
    </nav>

    <div class="table-responsive">
        <table class="table table-hover table-striped personindex">
            <thead>
                <tr>
                    <th ng-show="persona.visible.cedula">Id.</th>
                    <th ng-show="persona.visible.nombre">Nombre</th>
                    <th ng-show="persona.visible.apellidos">Apellidos</th>
                    <th ng-show="persona.visible.ocupacion">Ocupación</th>
                    <th ng-show="persona.visible.region">Region</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {{ csrf_field() }}
                <tr ng-repeat="p in personas | filter : search">
                    <td ng-show="persona.visible.cedula">@{{p.cedula}}</td>
                    <td ng-show="persona.visible.nombre">@{{p.nombre}}</td>
                    <td ng-show="persona.visible.apellidos">@{{p.apellidos}}</td>
                    <td ng-show="persona.visible.ocupacion">@{{p.ocupacion}}</td>
                    <td ng-show="persona.visible.region">@{{p.region}}</td>
                    <td>
                        <button type="button" class="btn-rest btn-edit" ng-click="edit(this,p)" data-toggle="modal" data-target="#modal"><span class="glyphicon glyphicon-pencil"></span></button>
                        <button type="button" class="btn-rest btn-delete" ng-click="delete(this,$event)"><span class="glyphicon glyphicon-trash"></span></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
