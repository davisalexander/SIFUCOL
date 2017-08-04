<div class="col-md-12">

    <nav class="navbar navbar-default navbar-sma" role="navigation">
        {{-- <span class="navbar-text"><b>Columnas visibles</b></span>
        <form class="navbar-form" style="padding-top:4px">
            <label class="checkbox-inline"><input type="checkbox" ng-model="expediente.visible.cedula">Identificación</label>
            <label class="checkbox-inline"><input type="checkbox" ng-model="expediente.visible.nombre">Nombre</label>
            <label class="checkbox-inline"><input type="checkbox" ng-model="expediente.visible.apellidos">Apellidos</label>
            <label class="checkbox-inline"><input type="checkbox" ng-model="expediente.visible.ocupacion">Ocupacion</label>
            <label class="checkbox-inline"><input type="checkbox" ng-model="expediente.visible.tels">Teléfonos</label>
            <input type="number" ng-model="maxrecords" ng-value="0">
            <button type="button" ng-click="seed(maxrecords,true)">Wipe & seed</button>
            <button type="button" ng-click="seed(0,true)">Wipe all</button>
        </form> --}}
    </nav>

    <div class="table-responsive">

        <!--<nav class="text-center" style="padding:0;margin:0">
            <ul uib-pagination ng-model="pagination.page" total-items="pagination.total" max-size="12" items-per-page="16" max-size="pagination.total" class="pagination-sm" ng-change="index(pagination.page)"></ul>
        </nav>-->

        <table class="table table-hover recordsindex">
            <thead>
                <tr>
                    <th><button type="button" class="btn btn-table-header">Beneficiario<span class="caret"></span></button></th>
                    <th><button type="button" class="btn btn-table-header">Ubicacion<span class="caret"></span></button></th>
                    <th><button type="button" class="btn btn-table-header">Prioridad<span class="caret"></span></button></th>
                    <th><button type="button" class="btn btn-table-header">Estado<span class="caret"></span></button></th>
                    <th><button type="button" class="btn btn-table-header">Tipo de ayuda<span class="caret"></span></button></th>
                    <!--<th></th>-->
                </tr>
            </thead>
            <tbody>
                {{ csrf_field() }}
                <tr>
                    <td ng-click="show(this,e)" data-toggle="modal" data-target="#modal">Álvaro González Q.</td>
                    <td ng-click="show(this,e)" data-toggle="modal" data-target="#modal">Limón, Pococí, Guápiles</td>
                    <td ng-click="show(this,e)" data-toggle="modal" data-target="#modal">Media<span class="record-status record-status-med"></span></td>
                    <td ng-click="show(this,e)" data-toggle="modal" data-target="#modal">Aprobado</td>
                    <td ng-click="show(this,e)" data-toggle="modal" data-target="#modal">Equipo médico</td>
                    <!--<td>
                        <button type="button" class="btn-rest btn-edit" ng-click="edit(this,p)" data-toggle="modal" data-target="#modal" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button>
                        <button type="button" class="btn-rest btn-delete" ng-click="delete(this,$event)" title="Eliminar"><span class="glyphicon glyphicon-trash"></span></button>
                    </td>-->
                </tr>
            </tbody>
        </table>

        <nav class="text-center" style="padding:0;margin:0">
            <ul uib-pagination ng-model="pagination.page" total-items="pagination.total" max-size="12" items-per-page="16" max-size="pagination.total" class="pagination-sm" ng-change="index(pagination.page)"></ul>
        </nav>
    </div>
