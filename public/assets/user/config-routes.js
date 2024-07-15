app.config(function($stateProvider, $urlRouterProvider, $locationProvider) {
    $stateProvider
        .state('home', {
            url: '/home',
            templateUrl: 'angular_templates/home.html',
            controller: 'HomeController'
        })
        .state('requested', {
            url: '/requested',
            templateUrl: 'angular_templates/home-requested.html',
            controller: 'HomeController'
        })
        .state('view_profile', {
            url: '/view_profile',
            templateUrl: 'angular_templates/view-profile.html',
            controller: 'ProfileController'
        })

    $urlRouterProvider.otherwise('/home');

    $locationProvider.hashPrefix('');
});