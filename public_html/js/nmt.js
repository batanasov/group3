var nmt = angular.module('nmt',['ngRoute']);

nmt.factory('httpInterceptor',['$q','$location',function($q,$location){
  return {
    response: function(response){
      return promise.then(
        function success(response) {
        return response;
      },
      function error(response) {
        if(response.status === 401){
          $location.path('/signin');
          return $q.reject(response);
        }
        else{
          return $q.reject(response); 
        }
      });
    }
  };
}]);

nmt.config(['$routeProvider', '$httpProvider', function($routeProvider, $httpProvider) {
    $httpProvider.responseInterceptors.push();
    $routeProvider.
        when('/courses',{
            templateUrl:'partials/courses.html',
            controller:'coursesCtrl'
        }). 
        when('/course/:courseId',{
            templateUrl:'partials/course.html',
            controller:'courseCtrl'
        }). 
        when('/venues',{
            templateUrl:'partials/venues.html',
            controller:'venuesCtrl'
        }).
        when('/venue/:venueId', {
            templateUrl:'partials/venue.html',
            controller:'venueCtrl'
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

nmt.controller('mainCtrl',['$scope', function($scope){
    
}]);

nmt.controller('newsCtrl', ['$scope', function($scope){
    $scope.news = "Current news";
}]);

nmt.controller('delegCtrl', ['$scope', '$http', function($scope, $http){
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
        if($scope.option === 'paypal') {
            $scope.classN = 'hidden';
            $scope.classPP = '';
        } else if($scope.option === 'debitcard') {
           $scope.classN = 'hidden';
           $scope.classDC = '';
        }
    };
    $scope.ven = function() {
        $scope.classV = "";
        $scope.classN = "hidden";
        $scope.classP = "hidden";
        $scope.classPP = "hidden";
        $scope.classDC = "hidden";
    };
}]);

nmt.controller('coursesCtrl', ['$scope', '$http', '$sce', function($scope, $http, $sce) {
    $http.get('api/courses').success(function(data){
        for (var i = 0; i < data.length; i++) {
            data[i].description = $sce.trustAsHtml(data[i].description);
        }
        $scope.courses = data;
    });
}]);

nmt.controller('courseCtrl', ['$scope', '$http', '$sce', '$routeParams', function($scope, $http, $sce, $routeParams) {
    $http.get('api/courses/'+$routeParams.courseId).success(function(data){
        data.description = $sce.trustAsHtml(data.description);
        $scope.course = data;
    });
}]);

nmt.controller('venuesCtrl', ['$scope', '$http', '$sce', function($scope, $http, $sce) {
    $http.get('api/venues').success(function(data){
        for (var i = 0; i < data.length; i++) {
            data[i].description = $sce.trustAsHtml(data[i].description);
        }
        $scope.venues = data;
    });
}]);

nmt.controller('venueCtrl', ['$scope', '$http', '$sce', '$routeParams', function($scope, $http, $sce, $routeParams) {
    $http.get('api/venues/'+$routeParams.venueId).success(function(data){
        data.description = $sce.trustAsHtml(data.description);
        data.address = $sce.trustAsHtml(data.address);
        $scope.mapUrl = $sce.trustAsResourceUrl('http://my.ctrlq.org/maps/#roadmap|16|' + data.latitude + '|' + data.longitude);
        $scope.venue = data;
    });
}]);

nmt.controller('newsCtrl', ['$scope', '$http', '$sce', function($scope, $http, $sce) {
    $http.get('api/news').success(function(data){
        for (var i = 0; i < data.length; i++) {
            data[i].content = $sce.trustAsHtml(data[i].content);
        }
        $scope.news = data;
    });
}]);