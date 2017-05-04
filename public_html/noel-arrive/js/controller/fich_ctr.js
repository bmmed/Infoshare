var app = angular.module('myApp',[]);

app.factory('MyFactory', function($http, $q, $timeout) {
    var factory = {
        find : function() {
            var deferred = $q.defer();

                $http.get('js/content.json')
                    .success(function(data, status) {
                        factory.data = data;
                        console.log(data);
                        deferred.resolve(factory.data);

                    })
                    .error(function(data, status) {
                        deferred.reject('Impossible de recuperer les articles')
                    });


            return deferred.promise;
        }
    }

    return factory;
});


app.controller('AppCtrl', function ($scope, MyFactory) {

    MyFactory.find().then(function(data) {

        $scope.data = data;
        $scope.today = new Date().getDate();

    }, function(msg) {
        alert(msg);
    });
});

