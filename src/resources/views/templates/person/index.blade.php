<div class="col-md-12">

    <nav class="navbar navbar-default navbar-sma" role="navigation">
        <span class="navbar-text"><b>Columnas visibles</b></span>
        <form class="navbar-form" style="padding-top:4px">
            <label class="checkbox-inline"><input type="checkbox" ng-model="persona.visible.cedula">Identificación</label>
            <label class="checkbox-inline"><input type="checkbox" ng-model="persona.visible.nombre">Nombre</label>
            <label class="checkbox-inline"><input type="checkbox" ng-model="persona.visible.apellidos">Apellidos</label>
            <label class="checkbox-inline"><input type="checkbox" ng-model="persona.visible.ocupacion">Ocupacion</label>
            <label class="checkbox-inline"><input type="checkbox" ng-model="persona.visible.tels">Teléfonos</label>
            <input type="number" ng-model="maxrecords" ng-value="0">
            <button type="button" ng-click="seed(maxrecords,true)">Wipe & seed</button>
            <button type="button" ng-click="seed(0,true)">Wipe all</button>
        </form>
    </nav>

    <div class="table-responsive">

        <!--<nav class="text-center" style="padding:0;margin:0">
            <ul uib-pagination ng-model="pagination.page" total-items="pagination.total" max-size="12" items-per-page="16" max-size="pagination.total" class="pagination-sm" ng-change="index(pagination.page)"></ul>
        </nav>-->

        <table class="table table-hover personindex">
            <thead>
                <tr>
                    <th ng-show="persona.visible.cedula"><button type="button" class="btn btn-table-header">Id.<span class="caret"></span></button></th>
                    <th ng-show="persona.visible.nombre"><button type="button" class="btn btn-table-header">Nombre<span class="caret"></span></button></th>
                    <th ng-show="persona.visible.apellidos"><button type="button" class="btn btn-table-header">Apellidos<span class="caret"></span></button></th>
                    <th ng-show="persona.visible.ocupacion"><button type="button" class="btn btn-table-header">Ocupación<span class="caret"></span></button></th>
                    <th ng-show="persona.visible.tels"><button type="button" class="btn btn-table-header">Teléfonos<span class="caret"></span></button></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {{ csrf_field() }}
                <tr ng-repeat="p in personas | filter : search">
                    <td ng-click="show(this,p)" data-toggle="modal" data-target="#modal" ng-show="persona.visible.cedula">@{{p.cedula}}</td>
                    <td ng-click="show(this,p)" data-toggle="modal" data-target="#modal" ng-show="persona.visible.nombre">@{{p.nombre}}</td>
                    <td ng-click="show(this,p)" data-toggle="modal" data-target="#modal" ng-show="persona.visible.apellidos">@{{p.apellidos}}</td>
                    <td ng-click="show(this,p)" data-toggle="modal" data-target="#modal" ng-show="persona.visible.ocupacion">@{{p.ocupacion}}</td>
                    <td ng-click="show(this,p)" data-toggle="modal" data-target="#modal" ng-show="persona.visible.tels">@{{p.tels}}</td>
                    <td>
                        <button type="button" class="btn-rest btn-edit" ng-click="edit(this,p)" data-toggle="modal" data-target="#modal" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button>
                        <button type="button" class="btn-rest btn-delete" ng-click="delete(this,$event)" title="Eliminar"><span class="glyphicon glyphicon-trash"></span></button>
                        <!--<button type="button" class="btn-rest btn-show" ng-click="" title="Ver expedientes"><span class="glyphicon glyphicon-folder-open"></span></button>-->
                    </td>
                </tr>
            </tbody>
        </table>

        <nav class="text-center" style="padding:0;margin:0">
            <ul uib-pagination ng-model="pagination.page" total-items="pagination.total" max-size="12" items-per-page="16" max-size="pagination.total" class="pagination-sm" ng-change="index(pagination.page)"></ul>
        </nav>
    </div>
