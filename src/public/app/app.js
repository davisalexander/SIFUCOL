var app = angular.module('App',['ngRoute']);

/*
*   Routes for SPA control and dynamic content management
*/
app.config(function($routeProvider){
    $routeProvider
    .when("/",{templateUrl:'./home'})
    .when("/people",{templateUrl:'./people/create'});
})

/*
*   Controller for entity 'Persona'
*/
app.controller('PersonaController',function($scope,$http){
    // Bind click action to scope context
    $scope.submit=function(){
        var $form = $('#people-section');
        $http.post('./people',jQueryToJson($form,'name'))
        .then(
            function(response){
                console.log(response.data);
                alert('Transaction '+((response.data)?'succeeded!':'failed :('));

            },   //Do something with response data from server
            function(){
                console.log('Something went wrong :(');
            }    // Handle possible server errors
        )
    }
});


function jQueryToJson(obj, key){
    var data = {}
    obj.find('['+key+']').each(function(index){
        data[this.getAttribute(key)]=this.value;
    })
    return data;
}
