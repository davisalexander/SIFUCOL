var app = angular.module('App',['ngRoute','ngSanitize']);

/*
*   Routes for SPA control and dynamic content management
*/
app.config(function($routeProvider){
    $routeProvider

    /*
    *   Routing for root location
    */
    .when("/",{templateUrl:'./home',controller:function(){$('#sectionheader').text('Actividad reciente');}})

    /*
    *   Routing for 'Person'
    */
    .when("/person/create",{templateUrl:'./person/create', controller:'PersonController'})
    .when("/person/index",{template:'<ng-include src="\'./person/index\'">Cargando...</ng-include>', controller:'PersonController'});
});

app.controller('Main',function($scope){
    $scope.modal={
        title:'',
        btntext:'',
        body:null,
        type:''
    }
});

function compileContent(element, html, angular, service, scope, replace) {
    return (replace)?
        angular.element(element).empty().append(service(html)(scope))
        :angular.element(element).append(service(html)(scope));
}

function jQueryToJson(obj, key){
    var data = {}
    obj.find('['+key+']').each(function(index){
        data[this.getAttribute(key)]=this.value;
    })
    return data;
}
