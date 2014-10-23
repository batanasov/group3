var nmt = angular.module('nmt',['ngRoute']);

nmt.config(['$routeProvider',
    function($routeProvider){
        $routeProvider.
            when('/course',{
                templateUrl:'partials/course.html',
                controller:'courseCtrl'
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

nmt.controller('delegCtrl', function($scope, $http){
    $http.get('js/courses.json').success(function(data){
        $scope.courses = data;
    });
   $http.get('js/venues.json').success(function(data){
       $scope.venues = data;
   });
    
   $scope.classN = "hidden";
   $scope.classP = "hidden";
   $scope.classPP = "hidden";
   $scope.classDC = "hidden";
   $scope.classV = "hidden";
   $scope.register = function(){
     $scope.classN = "";  
     $scope.classPP = "hidden";
     $scope.classDC = "hidden";
     $scope.classV = "hidden";
   };
   $scope.proceed = function(){
       if($scope.option === 'paypal'){
       $scope.classN = 'hidden';
       $scope.classPP = '';
   }
   else if($scope.option === 'debitcard'){
       $scope.classN = 'hidden';
       $scope.classDC = '';
   }
   };
   $scope.ven = function(){
       $scope.classV = "";
       $scope.classN = "hidden";
       $scope.classP = "hidden";
       $scope.classPP = "hidden";
       $scope.classDC = "hidden";
   };
});

nmt.controller('courseCtrl', function($scope,$http){
    $http.get('js/courses.json').success(function(data){
        $scope.courses = data;
    });
    $http.get('js/venues.json').success(function(data){
        $scope.venues = data;
    });
    
    $scope.classC = "";
    $scope.classV = "hidden";
    
    $scope.cour = function(){
        $scope.classC = "";
        $scope.classV = "hidden"
    };
    $scope.ven = function(){
        $scope.classC = "hidden";
        $scope.classV = "";
    }
});