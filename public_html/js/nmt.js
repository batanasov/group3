var nmt = angular.module('nmt',['ngRoute', 'ngCookies', 'ngAnimate', 'angular-loading-bar']);

nmt.factory('httpInterceptor', ['$location', '$injector', '$q', '$cookies', function ($location, $injector, $q, $cookies) {
    return {
        'request': function (config) {
            var bearer = $cookies.authBearerToken;
            //injected manually to get around circular dependency problem.
            //var AuthService = $injector.get('Auth');

            //if (!AuthService.isAuthenticated()) {
                //$location.path('/login');
            //} else {
            //    //add session_id as a bearer token in header of all outgoing HTTP requests.
            //    var currentUser = AuthService.getCurrentUser();
            //    if (currentUser !== null) {
            //        var sessionId = AuthService.getCurrentUser().sessionId;
            //        if (sessionId) {
            //            config.headers.Authorization = 'Bearer ' + sessionId;
            //        }
            //    }
            //}

            //add headers
            return config;
        },
        'responseError': function (rejection) {
            if (rejection.status === 401) {

                //injected manually to get around circular dependency problem.
                var AuthService = $injector.get('Auth');

                //if server returns 401 despite user being authenticated on app side, it means session timed out on server
                if (AuthService.isAuthenticated()) {
                    AuthService.appLogOut();
                }
                $location.path('/login');
                return $q.reject(rejection);
            }
        }
    };
}]);

nmt.config(['$routeProvider', '$httpProvider', '$locationProvider', function($routeProvider, $httpProvider, $locationProvider) {
    $httpProvider.interceptors.push('httpInterceptor');
    $routeProvider.
        when('/courses', {
            templateUrl:'partials/courses.html',
            controller:'coursesCtrl'
        }). 
        when('/course/:courseId', {
            templateUrl:'partials/course.html',
            controller:'courseCtrl'
        }). 
        when('/venues', {
            templateUrl:'partials/venues.html',
            controller:'venuesCtrl'
        }).
        when('/venue/:venueId', {
            templateUrl:'partials/venue.html',
            controller:'venueCtrl'
        }).
        when('/news', {
            templateUrl:'partials/news.html',
            controller:'newsCtrl'
        }).
        when('/delegates', {
            templateUrl:'partials/delegates.html',
            controller:'delegCtrl'
        }).
        when('/admin', {
            templateUrl:'partials/admin.html',
            controller:'adminCtrl'
        }).
        otherwise({
            redirectTo:'/news'
        });
    $locationProvider
        .html5Mode(true)
        .hashPrefix('!');
}]);

nmt.controller('mainCtrl',['$scope', function($scope){
    
}]);

nmt.controller('delegCtrl', ['$scope', '$http', function($scope, $http){
    $http.get('api/courses').success(function(data){
        $scope.courses = data;
    });
    $http.get('api/venues').success(function(data){
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