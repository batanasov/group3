var nmt = angular.module('nmt',['ngRoute', 'ngCookies', 'ngAnimate', 'textAngular', 'angular-loading-bar','toaster','xeditable']);

nmt.run(function(editableOptions) {
    editableOptions.theme = 'bs3';
});

nmt.factory('httpInterceptor', ['$location', '$q', '$cookies', function ($location, $q, $cookies) {
    return {
        'request': function (config) {
            var bearer = $cookies.bearer;
            if (bearer !== null && bearer !== undefined) {
                config.headers.Authorization = 'Bearer ' + bearer;
            }
            return config;
        },
        'responseError': function (rejection) {
            if (rejection.status === 403) {
                $location.path('/admin');
            }
            return $q.reject(rejection);
        }
    };
}]);

nmt.config(['$routeProvider', '$httpProvider', '$locationProvider', function($routeProvider, $httpProvider, $locationProvider) {
    $httpProvider.interceptors.push('httpInterceptor');
    $routeProvider.
        when('/terms', {
            templateUrl:'partials/terms.html',
        }). 
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
        when('/home', {
            templateUrl:'partials/home.html',
            controller:'homeCtrl'
        }).
        when('/delegates', {
            templateUrl:'partials/delegates.html',
            controller:'delegCtrl'
        }).
        when('/delegates/:sessionId', {
            templateUrl:'partials/delegates.html',
            controller:'delegCtrl'
        }).
        when('/payment', {
            templateUrl:'partials/payment.html',
            controller:'paymentCtrl'
        }).
        when('/admin', {
            templateUrl:'partials/admin.html',
            controller:'adminCtrl'
        }).
        when('/admin/dashboard', {
            templateUrl:'partials/admin-dashboard.html',
            controller:'adminDashboardCtrl'
        }).
        when('/admin/venue/:venueId', {
            templateUrl:'partials/admin-venue.html',
            controller:'adminVenueCtrl'
        }).
        otherwise({
            redirectTo:'/home'
        });
    $locationProvider
        .html5Mode(true)
        .hashPrefix('!');
}]);

nmt.controller('mainCtrl',['$rootScope', '$scope', '$http', 'toaster', function($rootScope, $scope, $http, toaster){
    //Initial Holding Object for our Notifications - set as empty
    $rootScope.notifications = [];

    //Load Notifications for this current user from the View using the Domino REST API
    //For the demo we will use a local sample.json file which mimics the Domino JSON Data
    $rootScope.loadNotifications = function() {
      $http({
        method:'get',
        url: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/60204/sample_3.json'
        //url: '/notification.nsf/api/data/collections/name/(LUNotificationsAwaiting)?category=<Computed Value>'
      }).success(function(data, status, headers, config) {
         $rootScope.notifications = data;
      })
    }

    //This code watches the notifications object - if it changes then it calls another function
    //This helps to decouple your loading data logic.
    $rootScope.$watch('notifications', function (newVal, oldVal) {
        if (oldVal == newVal) {
            return;
        }
        //We have notifications - loop through them and show them
        $rootScope.displayNotifications();
    });

    $rootScope.displayNotifications = function () {
        angular.forEach($rootScope.notifications, function (value, key) {
            toaster.pop(value.type, value.title, value.message, 5000, 'trustedHtml', '', value['@unid']);
        });
    };
}]);

nmt.controller('delegCtrl', ['$scope', '$http', '$location', '$routeParams', function($scope, $http, $location, $routeParams){
    if(typeof(Storage) !== 'undefined') {
        try {
            var formData = JSON.parse(localStorage.getItem('registrationData'));
            if(formData === null) {
                formData = {};
            }
            formData['session'] = $routeParams.sessionId === undefined ? formData['session'] : parseInt($routeParams.sessionId);
            $scope.formData = formData;
        } catch(err) {
            localStorage.clear();
        }
    }
    $scope.titles = [];
    $http.get('api/titles').success(function(data){
        $scope.titles = data;
    });
    $scope.courses = [];
    $http.get('api/courses').success(function(data){
        $scope.courses = data;
    });
    $scope.courses = [];
    $http.get('api/sessions').success(function(data){
        $scope.sessions = data;
        $scope.formData.session = $routeParams.sessionId === undefined ? formData['session'] : parseInt($routeParams.sessionId);
    });
    if(typeof(Storage) !== 'undefined') {
        try {
            $scope.formData = JSON.parse(localStorage.getItem('registrationData'))
            if($scope.formData === null) {
                $scope.formData = {};
            }
        } catch(err) {
            localStorage.clear();
        }
    }
    $scope.submit = function(registrationform) {
        if(typeof(Storage) !== 'undefined') {
            localStorage.setItem(
                'registrationData',
                JSON.stringify($scope.formData)
            );
        }
        $location.path('/payment');
    };
}]);

nmt.controller('paymentCtrl', ['$rootScope', '$scope', '$http', '$location', function($rootScope, $scope, $http, $location){
    var values = [];
    if(typeof(Storage) !== 'undefined') {
        try {
            values = JSON.parse(localStorage.getItem('registrationData'))
        } catch(err) {
            localStorage.clear();
        }
    }
    if(values.length < 1) {
        $location.path('/delegates');
    }
    $scope.payment = values['payment'];
    $scope.cancel = function() {
        $rootScope.notifications = [{
            "@unid": "B433C471EEAB3D5180257CD000587983",
            "title": "Registration cancelled",
            "type": "info",
            "message": 'You have cancelled your registration.',
            "for": "Test User"
        }];
        $location.path('/delegates');
    };
    $scope.failure = function() {
        $rootScope.notifications = [{
            "@unid": "B433C471EEAB3D5180257CD000587983",
            "title": "Registration failed",
            "type": "error",
            "message": 'An error occured during the payment process. Please try again or contact us for a mail registration.',
            "for": "Test User"
        }];
        $location.path('/delegates');
    };
    $scope.submit = function() {
        $http.post('/api/registration', values)
        .success(function(data) {
            if (data.success) {
                values['session'] = null;
                values['payment'] = null;
                if(typeof(Storage) !== 'undefined') {
                    localStorage.setItem(
                        'registrationData',
                        JSON.stringify(values)
                    );
                }
                $rootScope.notifications = [{
                    "@unid": "B433C471EEAB3D5180257CD000587983",
                    "title": "Registration successful",
                    "type": "success",
                    "message": data.success,
                    "for": "Test User"
                }];
                $location.path('/delegates');
            } else {
                $rootScope.notifications = [{
                    "@unid": "B433C471EEAB3D5180257CD000587983",
                    "title": "Registration failed",
                    "type": "error",
                    "message": data.error,
                    "for": "Test User"
                }];
                $location.path('/delegates');
            }
        });
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
    $scope.courses = [];
    $http.get('api/venues/'+$routeParams.venueId).success(function(data){
        data.description = $sce.trustAsHtml(data.description);
        data.address = $sce.trustAsHtml(data.address);
        var address = ''+data.address;
        address = address.replace(/ /g, '+');
        $scope.mapUrl = $sce.trustAsResourceUrl('https://maps.google.com/maps/api/staticmap?language=en&center=&zoom=13&size=1500x200&format=png32&maptype=roadmap&markers=' + address + '&sensor=false');
        $scope.venue = data;
    });
    $http.get('api/courses?venue='+$routeParams.venueId).success(function(data){
        $scope.courses = data;
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
nmt.controller('homeCtrl', ['$scope', '$http', '$sce', function($scope, $http, $sce) {
    $http.get('/api/news?limit=2').success(function(data){
        for (var i = 0; i < data.length; i++) {
            data[i].content = $sce.trustAsHtml(data[i].content);
        }
        $scope.news = data;
    });
    $http.get('/api/venues').success(function(data){
        for (var i = 0; i < data.length; i++) {
            data[i].description = $sce.trustAsHtml(data[i].description);
        }
        $scope.venues = data;
    });
    $http.get('/api/courses').success(function(data){
        for (var i = 0; i < data.length; i++) {
            data[i].description = $sce.trustAsHtml(data[i].description);
        }
        $scope.courses = data;
    });
}]);




nmt.controller('adminCtrl', ['$rootScope', '$scope', '$http', '$sce', '$cookies', '$location', function($rootScope, $scope, $http, $sce, $cookies, $location) {
    $scope.formData = {'username': '', 'password': '' };
    $scope.submit = function() {
        $http.post(
            '/api/auth',
            {
                "grant_type": "password",
                "username": this.formData.username,
                "password": this.formData.password,
                "client_id": "website"
            }
        ).
        success(function(data, status, headers, config) {
            $cookies.bearer = data.access_token;
            $cookies.refresh = data.refresh_token;
            $rootScope.notifications = [{
                "@unid": "B433C471EEAB3D5180257CD000587983",
                "title": "Login success",
                "type": "success",
                "message": 'You have been logged in as an administrator.',
                "for": "Test User"
            }];
            $location.path('/admin/dashboard');
        }).
        error(function(data, status, headers, config) {
            $rootScope.notifications = [{
                "@unid": "B433C471EEAB3D5180257CD000587983",
                "title": "Login failed",
                "type": "error",
                "message": data.detail,
                "for": "Test User"
            }];
        });
    };
}]);
nmt.controller('adminDashboardCtrl', ['$rootScope', '$scope', '$http', '$sce', '$cookies', '$location', function($rootScope, $scope, $http, $sce, $cookies, $location) {
    $scope.logout = function() {
        $cookies.bearer = null;
        $cookies.refresh = null;
        $rootScope.notifications = [{
            "@unid": "B433C471EEAB3D5180257CD000587983",
            "title": "Logout success",
            "type": "success",
            "message": 'You have been logged out from the administration.',
            "for": "Test User"
        }];
        $location.path('/admin');
    };
    $http.get('/api/admin/news').success(function(data){
        for (var i = 0; i < data.length; i++) {
            data[i].content = $sce.trustAsHtml(data[i].content);
        }
        $scope.news = data;
    });
    $http.get('/api/admin/venues').success(function(data){
        for (var i = 0; i < data.length; i++) {
            data[i].content = $sce.trustAsHtml(data[i].content);
        }
        $scope.venues = data;
    });
    $http.get('/api/admin/courses').success(function(data){
        for (var i = 0; i < data.length; i++) {
            data[i].content = $sce.trustAsHtml(data[i].content);
        }
        $scope.courses = data;
    });
}]);

nmt.controller('adminVenueCtrl', ['$scope', '$http', '$sce', '$routeParams', function($scope, $http, $sce, $routeParams) {
    $scope.courses = [];
    $http.get('/api/admin/venues/'+$routeParams.venueId).success(function(data){
        data.description = $sce.trustAsHtml(data.description);
        data.address = $sce.trustAsHtml(data.address);
        var address = ''+data.address;
        address = address.replace(/ /g, '+');
        $scope.mapUrl = $sce.trustAsResourceUrl('https://maps.google.com/maps/api/staticmap?language=en&center=&zoom=13&size=1500x200&format=png32&maptype=roadmap&markers=' + address + '&sensor=false');
        $scope.venue = data;
    });
    $http.get('api/admin/courses?venue='+$routeParams.venueId).success(function(data){
        $scope.courses = data;
    });
    
    $scope.patchVenue = function(field, form) {
        var values = {};
        values[field] = $scope.venue[field];
        $http.patch(
            '/api/admin/venues/'+$routeParams.venueId,
            values
        ).success(function(data) {
            if(field === 'address') {
                var address = ''+$scope.venue[field];
                address = address.replace(/ /g, '+');
                $scope.mapUrl = $sce.trustAsResourceUrl('https://maps.google.com/maps/api/staticmap?language=en&center=&zoom=13&size=1500x200&format=png32&maptype=roadmap&markers=' + address + '&sensor=false');
            }
        });
    };
}]);