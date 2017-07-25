
/*
*   Controller for entity 'Persona'
*/
app.controller('PersonController',function($scope,$http,$location){
    var Content = $scope.$parent.content,
    request_method = $location.path().replace('/person/','');

    Content.scope=$scope;
    Content.emptyFirst=true;
    Content.target=document.getElementById('sectionheader');

    $scope.persona={
        visible:{
            cedula:true,
            nombre:true,
            apellidos:true,
            ocupacion:true,
            region:false
        }
    };

    $scope.save=function(){
        console.log('Add new person');
        var $form = $('#persondata');
        $http.post('./person',jQueryToJson($form,'name'))
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
        $scope.$parent.modal.title="Actualizar datos de persona";
        $scope.$parent.modal.type="warning";
        $scope.$parent.modal.btntext="Guardar cambios";
        $scope.$parent.modal.click=function(){
            $scope.update();
        };

        Content.remote=true;
        Content.target=$('#modal .modal-body')[0];
        Content.template='./person/edit';
        Content.compile();

        $scope.persona.selected=e.p;
        $scope.persona.update=scope;
    };

    $scope.update=function(){
        $http.put('./person/'+$scope.persona.cedula,jQueryToJson($('#persondata'),'name'))
        .then(
            function(response){
                console.log('Transaction '+((response.data.result)?'succeeded!':'failed :('));
                $scope.persona.update.nombre=$scope.persona.selected.nombre;
                $scope.persona.update.apellidos=$scope.persona.selected.apellidos;
                $scope.persona.update.ocupacion=$scope.persona.selected.ocupacion;
                $('#modal').modal('hide');
            },
            function(){
                alert('Something went wrong :(');
            }    // Handle possible server errors
        );
    };

    $scope.delete=function(e, $event){
        if (confirm('¿Realmente desea eliminar a esta persona?\n*Esta operación es irreversible')) {
            $http.delete('./person/'+e.p.cedula,jQueryToJson($('#indexperson'),'name'))
            .then(
                function(response){
                    console.log(response.data.result);
                    console.log('Transaction '+((response.data.result)?'succeeded!':'failed :('));
                    $($event.target).parents('tr').fadeOut({complete:function(){angular.element(this).remove();}});
                },
                function(){
                    alert('Something went wrong :(');
                }    // Handle possible server errors
            );
        }
    };

    $scope.index=function(current,request){

        /*
        *   maxrecords: Max number of records to display
        *   current: Current record page
        *   request: Requested record page
        */
        $http.get('./person',{maxrecords:0,current:0,request:0})
        .then(
            function(response){
                $scope.personas=response.data.personas;
                Content.remote=true;
                Content.template='./person/header';
                Content.compile();
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
