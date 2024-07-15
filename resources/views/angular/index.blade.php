<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>

</head>
<body ng-app="myApp">

    <p><a href="#/!">Main</a></p>
    
    <a href="#!red">Red</a>
    <a href="#!green">Green</a>
    <a href="#!blue">Blue</a>
    
    <div ng-view></div>
    
    <script>
    var app = angular.module("myApp", ["ngRoute"]);
    app.config(function($routeProvider) {
      $locationProvider.hashPrefix(''); 
      $routeProvider
      .when("/main", {
        templateUrl : "angular_templates/main.html"
      })
      .when("/red", {
        templateUrl : "angular_templates/red.html"
      })
      .when("/green", {
        templateUrl : "angular_templates/green.html"
      })
      .when("/blue", {
        templateUrl : "angular_templates/blue.html"
      });
    });
    </script>
    </body>
</html>