<div class="col-lg-12">
    <div class="col-md-8 col-md-push-2">
        <div class="table-responsive">
            <table class="table table-hover table-striped personindex">
                <thead>
                    <tr>
                        <th>Id.</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Ocupación</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="indexperson">
                    {{ csrf_field() }}
                    <tr ng-repeat="p in personas | filter : search">
                        <td>@{{p.cedula}}</td>
                        <td>@{{p.nombre}}</td>
                        <td>@{{p.apellidos}}</td>
                        <td>@{{p.ocupacion}}</td>
                        <td>
                            <button type="button" class="btn-rest btn-edit" ng-click="edit(this)" data-toggle="modal" data-target="#modal"><span class="glyphicon glyphicon-pencil"></span></button>
                            <button type="button" class="btn-rest btn-delete" ng-click="delete(this,$event)"><span class="glyphicon glyphicon-trash"></span></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
