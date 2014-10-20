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

nmt.controller('delegCtrl', function($scope){
   $scope.classN = "";
   $scope.classP = "hidden";
   $scope.classPP = "hidden";
   $scope.classDC = "hidden";
   $scope.proceed = function(){
       $scope.classN = 'hidden';
       $scope.classP = '';
   };
   $scope.paypal = function(){
       $scope.classP = 'hidden';
       $scope.classPP = '';
   };
   $scope.debitCard = function(){
       $scope.classP = 'hidden';
       $scope.classDC = '';
   };
});