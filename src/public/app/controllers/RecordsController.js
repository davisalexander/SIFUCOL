app.controller('RecordsController',function($scope, $http, $location){

    var Content = $scope.$parent.content,
    Persist = $scope.$parent.persist,
    request_method = $location.path().replace('/records/','');

    Content.scope=$scope;
    Content.emptyFirst=true;
    Content.target=document.getElementById('sectionheader');

    $scope.expediente={};
    $scope.pagination={page:1,total:1};

    $scope.save=function(){
        $http.post('./person',jQueryToJson($('#'),'name'))
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

        mergeObjs(scope, $scope.expediente.selected, ['$$hashKey']);

        $scope.$parent.modal.title="Actualizar datos de persona";
        $scope.$parent.modal.type="warning";
        $scope.$parent.modal.btntext="Guardar cambios";
        $scope.$parent.modal.click=$scope.update;

        Content.remote=true;
        Content.target=$('#modal .modal-body')[0];
        Content.template='./records/edit';
        Content.compile();

        $scope.expediente.update=scope;
    };

    $scope.update=function(){
        $http.put('./person/'+$scope.persona.selected.cedula,$scope.persona.selected)
        .then(
            function(response){
                console.log('Transaction '+((response.data.result)?'succeeded!':'failed :('));
                mergeObjs($scope.expediente.selected, $scope.expediente.update, ['$$hashKey']);
                $('#modal').modal('hide');
            },
            function(){
                alert('Something went wrong :(');
            }    // Handle possible server errors
        );
    };

    $scope.delete=function(e, $event, page){

    };

    $scope.index=function(page=1){
        $scope.pagination.page=(page < 1)? 1 : page;

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
            function(response){},
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
