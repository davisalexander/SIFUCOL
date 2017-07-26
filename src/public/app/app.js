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
    .when("/person/index",{templateUrl:'./person/index', controller:'PersonController'});
});

app.controller('Main',function($scope,$compile,$templateRequest){
    var compile = function(config,template){
        var element = angular.element(config.target);
        if (!config.replace) {

            if(config.emptyFirst){element.empty();}

            element.append($compile(template)(config.scope));
        }
        else {element.replaceWith($compile(template)(config.scope));}
    }
    var persistData={};

    $scope.persist={
        set:function(key, value, overwrite){
            if(!persistData[key]){persistData[key]=value;}
            else {if (overwrite) {persistData[key]=value;}}
        },
        get:function(key, def){return (!persistData[key])? def : persistData[key];}
    };
    $scope.modal={};
    $scope.content={
        remote:false,
        emptyFirst:false,
        replace:false,
        compile:function(){
            if(!this.remote){
                compile(this,this.template);
            }
            else {
                $templateRequest(this.template).then(function(html){compile($scope.content, html);});
            }
        }
    };
});

function jQueryToJson(obj, key){
    var data = {}
    obj.find('['+key+']').each(function(index){
        data[this.getAttribute(key)]=this.value;
    });
    return data;
}

function mergeObjs(_this, _into, except){
    for (var key in _this) {
        for (var i in except) {
            if(key !== except[i]){_into[key]=_this[key];}
        }
    }
}
