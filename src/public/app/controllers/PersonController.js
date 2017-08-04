
/*
*   Controller for entity 'Persona'
*/
app.controller('PersonController',function($scope,$http,$location){

    var Content = $scope.$parent.content,
    Persist = $scope.$parent.persist,
    request_method = $location.path().replace('/person/','');

    Content.scope=$scope;
    Content.emptyFirst=true;
    Content.target=document.getElementById('sectionheader');

    $scope.persona={
        selected:{},
        update:{},
        // Sets default visible columns config for `Person` index
        // if not present in persitance service.
        // If present, then gets the data stored with the specified key
        visible:Persist.get('PersonController$persona.visible',{
            cedula:true,
            nombre:true,
            apellidos:true,
            ocupacion:true,
            tels:false
        })
    };
    $scope.pagination=Persist.get('PersonController$pagination',{page:1, total:1, last:1});

    Persist.set('PersonController$persona.visible',$scope.persona.visible, false);

    $scope.seed=function(maxrecords, wipe){
        $http.get('./person/seed?maxrecords='+maxrecords+'&wipe='+wipe)
        .then(function(response){$scope.personas=response.data.personas;});
    }

    $scope.show=function(scope, $event){

        $scope.persona.selected=scope;
        Persist.set('PersonController$persona.selected',scope, true);

        $scope.$parent.modal.title='<span class="text-info">Información de persona </span><a href="#" class="btn btn-sm btn-primary pull-right">Ver expedientes</a>';
        $scope.$parent.modal.footer=false;
        $scope.$parent.modal.click=function(){};

        Content.remote=true;
        Content.target=$('#modal .modal-body')[0];
        Content.template='./person/show';
        Content.compile();
    }

    $scope.save=function(){

        var insert=function(isolate=true){
            var data = {persona:jQueryToJson($('#personcreate'),'name')};
            $http.post('./person',data)
            .then(
                function(response){
                    if(!isolate && response.data.personsuccess){
                        console.log('Transaction '+((response.data.personsuccess)?'succeeded!':'failed :('));
                        data.expediente = jQueryToJson($('#recordcreate'),'name');
                        $http.post('./records',data)
                        .then(function(response){
                            console.log(response.data);
                            console.log('Transaction '+((response.data.recordsuccess)?'succeeded!':'failed :('));
                        },
                        function(){alert('Something went wrong :(');});
                    }
                },
                function(){alert('Something went wrong :(');}    // Handle possible server errors
            );
        };

        if($scope.withrecord){
            // Create record form if not created
            if($(Content.target).find('#recordcreate').length === 0){
                $scope.$parent.modal.title="Crear expediente";
                $scope.$parent.modal.type="primary";
                $scope.$parent.modal.btntext="Guardar y añadir expediente";
                $scope.$parent.modal.click=function(){insert(false);};

                Content.remote=true;
                Content.target=$('#modal .modal-body')[0];
                Content.template='./records/create';
                Content.compile();
            }
        }
        else {insert();}

    };

    $scope.edit=function(scope){

        mergeObjs(scope, $scope.persona.selected, ['$$hashKey']);

        $scope.$parent.modal.title="Actualizar datos de persona";
        $scope.$parent.modal.type="warning";
        $scope.$parent.modal.btntext="Guardar cambios";
        $scope.$parent.modal.click=$scope.update;

        Content.remote=true;
        Content.target=$('#modal .modal-body')[0];
        Content.template='./person/edit';
        Content.compile();

        $scope.persona.update=scope;
    };

    $scope.update=function(){
        $http.put('./person/'+$scope.persona.selected.cedula,$scope.persona.selected)
        .then(
            function(response){
                console.log('Transaction '+((response.data.result)?'succeeded!':'failed :('));
                mergeObjs($scope.persona.selected, $scope.persona.update, ['$$hashKey']);
                $('#modal').modal('hide');
            },
            function(){
                alert('Something went wrong :(');
            }    // Handle possible server errors
        );
    };

    $scope.delete=function(scope, $event){
        if (true/*confirm('¿Realmente desea eliminar a esta persona?\n*Esta operación es irreversible')*/) {
            $http.delete('./person/'+scope.cedula+'?page='+$scope.pagination.page,jQueryToJson($('#indexperson'),'name'))
            .then(
                function(response){
                    console.log('Transaction '+((response.data.result)?'succeeded!':'failed :('));
                    $scope.personas.splice($scope.personas.indexOf(scope),1);
                    if($scope.pagination.page !== response.data.last && $scope.personas.length > 0){
                        angular.element(this).remove();
                        $scope.index($scope.pagination.page);
                    }
                    else if ($scope.personas.length === 0) {$scope.index($scope.pagination.page-1);}
                },
                function(){
                    alert('Something went wrong :(');
                }    // Handle possible server errors
            );
        }
    };

    $scope.index=function(page=1){
        $scope.pagination.page=(page < 1)? 1 : page;

        Content.remote=true;
        Content.template='./person/header';
        Content.compile();

        $http.get('./person?page='+page)
        .then(
            function(response){
                $scope.personas=response.data.personas;
                $scope.pagination.last = response.data.last;
                $scope.pagination.total = response.data.total;
            },
            function(){alert('Something went wrong :(');}
        );
    };

    switch (request_method) {
        case 'create':
        Content.remote=false;
        Content.template='<span>`Title placeholder`</span> <button class="btn btn-success btn-sm" type="button" ng-click="save()" data-toggle="{{withrecord?\'modal\':\'\'}}" data-target="{{withrecord?\'#modal\':\'\'}}">Guardar registro</button>';
        Content.compile();
        break;

        case 'index':
        $scope.index();
        break;
    }
});
