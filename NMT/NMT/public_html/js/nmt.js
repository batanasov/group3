var nmt = angular.module('nmt',['ngRoute']);

nmt.config(['$routeProvider',
    function($routeProvider){
        $routeProvider.
            when('/course',{
                templateUrl:'partials/course.html',
                controller:'courseCtr;'
            }).
            when('/news',{
                templateUrl:'partials/news.html',
                controller:'newsCtrl'
            }).
            when('/delegates',{
                templateUrl:'partials/delegates.html',
                controller:'delegCtrl'
            }).
            when('/admin',{
                templateUrl:'partials/admin.html',
                controller:'adminCtrl'
            }).
            otherwise({
                redirectTo:'/news'
            });
    }]);

nmt.controller('mainCtrl',function($scope){
    
});

nmt.controller('newsCtrl', function($scope){
    $scope.news = "Current news";
});