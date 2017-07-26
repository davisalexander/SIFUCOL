
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
        pagination:{links:[]},
        visible:Persist.get('PersonController$persona.visible',{
            cedula:true,
            nombre:true,
            apellidos:true,
            ocupacion:true,
            tels:false
        })
    };
    Persist.set('PersonController$persona.visible',$scope.persona.visible, false);

    $scope.seed=function(maxrecords, wipe){
        $http.get('./person/seed?maxrecords='+maxrecords+'&wipe='+wipe)
        .then(function(response){$scope.personas=response.data.personas;});
    }

    $scope.save=function(){
        $http.post('./person',jQueryToJson($('#personcreate'),'name'))
        .then(
            function(response){
                console.log('Transaction '+((response.data.result)?'succeeded!':'failed :('));
                //Show success msg
            },
            function(){
                alert('Something went wrong :(');
            }    // Handle possible server errors
        );
    };

    $scope.edit=function(e,scope){

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

    $scope.delete=function(e, $event, page){
        if (true/*confirm('¿Realmente desea eliminar a esta persona?\n*Esta operación es irreversible')*/) {
            $http.delete('./person/'+e.p.cedula+'?page='+page,jQueryToJson($('#indexperson'),'name'))
            .then(
                function(response){
                    console.log('Transaction '+((response.data.result)?'succeeded!':'failed :('));
                    $scope.persona.pagination.links=[];
                    for (var i = 1; i <= response.data.last; i++) {$scope.persona.pagination.links[i-1]=i;}
                    $($event.target).parents('tr').fadeOut({complete:function(){
                        angular.element(this).remove();
                        if($scope.personas.length === 1){$scope.index(page-1);}
                        else if (response.data.last+1 !== page && response.data.last !== page) {$scope.index(page);}
                    }});
                },
                function(){
                    alert('Something went wrong :(');
                }    // Handle possible server errors
            );
        }
    };

    $scope.index=function(page=1){
        $scope.persona.pagination.page=(page < 1)? 1 : page;

        Content.remote=true;
        Content.template='./person/header';
        Content.compile();

        /*
        *   maxrecords: Max number of records to display
        *   current: Current record page
        *   request: Requested record page
        */
        $http.get('./person?page='+page)
        .then(
            function(response){
                $scope.personas=response.data.personas;
                for (var i = 1; i <= response.data.last; i++) {$scope.persona.pagination.links[i-1]=i;}
            },
            function(){alert('Something went wrong :(');}
        );
    };

    switch (request_method) {
        case 'create':
        Content.remote=false;
        Content.template='<span>`Title placeholder`</span> <button class="btn btn-success btn-sm" type="button" ng-click="save()">Guardar registro</button>';
        Content.compile();
        break;

        case 'index':
        $scope.index();
        break;
    }
});
