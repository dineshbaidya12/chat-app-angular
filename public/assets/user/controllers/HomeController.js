app.controller('HomeController', function ($scope, $rootScope, $http, $location, $document, $timeout, $state) {
    $scope.img_assets_url = $rootScope.base_url + "assets/images/";
    $rootScope.route_name = $state.current.name;

    $scope.onClicks = function () {
        $rootScope.showToast('error', 'error');
    };
    // console.log($rootScope.base_url);
});