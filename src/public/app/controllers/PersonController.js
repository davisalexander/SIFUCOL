
/*
*   Controller for entity 'Persona'
*/
app.controller('PersonController',function($scope,$http,$location,$compile,$templateRequest,$sce){
    var request_method = $location.path().replace('/person/','');

    // Bind click action to scope context
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

    $scope.edit=function(e){
        $scope.$parent.modal.title="Actualizar datos de persona";
        $scope.$parent.modal.type="warning";
        $scope.$parent.modal.btntext="Guardar cambios";

        var templateUrl = $sce.getTrustedResourceUrl('./person/create');

        $templateRequest(templateUrl).then(
            function(template) { $compile($("#modal .modal-body").html(template).contents())($scope); }, 
            function(){}
        );
    };

    $scope.update=function(e, $event){
        // console.log('Update person');
        // //var data = e.persona;
        // data['_token'] = jQueryToJson($form,'name')['_token'];
        // console.log(data);
        // $http.post('./person'+e.persona.cedula,data)
        // .then(
        //     function(response){
        //         console.log('Transaction '+((response.data.result)?'succeeded!':'failed :('));
        //
        //     },
        //     function(){
        //         alert('Something went wrong :(');
        //     }    // Handle possible server errors
        // );
    };

    $scope.delete=function(e, $event){
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
    };

    $scope.index=function(current,request){
        var personas=[];

        /*
        *   maxrecords: Max number of records to display
        *   current: Current record page
        *   request: Requested record page
        */
        $http.get('./person',{maxrecords:0,current:0,request:0})
        .then(
            function(response){
                $scope.personas=response.data.personas;
                //alert('Transaction '+((response.data)?'succeeded!':'failed :('));

            },   //Do something with response data from server
            function(){
                alert('Something went wrong :(');
            }    // Handle possible server errors
        );
    };

    // $scope.search = function(persona){
    //     var query = $scope.test;
    //
    //     return $scope.persona.cedula && (query === persona.cedula) || $scope.persona.nombre && (query === persona.nombre);
    // };

    switch (request_method) {
        case 'create':
        compileContent(
            document.getElementById('sectionheader'),
            '<span>`Title placeholder`</span> <button class="btn btn-success btn-sm" type="button" ng-click="save()">Guardar registro</button>',
            angular,
            $compile,
            $scope,
            true
        );
        break;

        case 'index':
        compileContent(
            document.getElementById('sectionheader'),
            '<span class="col-sm-5 text-right">`Title placeholder`</span>'
            +'<form method="get" class="col-sm-4 async" ng-submit="index">'
            +    '<div class="input-group input-group-sm">'
            +        '<input type="text" class="form-control" placeholder="Término de búsqueda..." ng-model="test">'
            +        '<div class="input-group-btn">'
            +           '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="glyphicon glyphicon-search"></span></button>'
            +           '<ul class="dropdown-menu">'
            +               '<li class="dropdown-header" style="font-weight:bold">Buscar por:</li>'
            +               '<li><div class="checkbox"><label class="text-left"><input name="nombre" type="checkbox" ng-model="persona.cedula" ng-true-value="true" ng-false-value="false"> Identificación</label></div></li>'
            +               '<li><div class="checkbox"><label class="text-left"><input name="nombre" type="checkbox" ng-model="persona.nombre" ng-true-value="true" ng-false-value="false"> Nombre</label></div></li>'
            +               '<li><div class="checkbox"><label class="text-left"><input name="nombre" type="checkbox" value="asd"> Apellidos</label></div></li>'
            +               '<li><div class="checkbox"><label class="text-left"><input name="nombre" type="checkbox" value="asd"> Filtro1</label></div></li>'
            +               '<li><div class="checkbox"><label class="text-left"><input name="nombre" type="checkbox" value="asd"> Filtro2</label></div></li>'
            +               '<li><div class="checkbox"><label class="text-left"><input name="nombre" type="checkbox" value="asd"> Filtro3</label></div></li>'
            +           '</ul>'
            +        '</div>'
            +    '</div>'
            +'</form>',
            angular,
            $compile,
            $scope,
            true
        );
        $scope.index();
        break;
    }

});
