app.controller('LeftbarController', function ($scope, $rootScope, $http, $location, $document, $timeout, $state) {
    $scope.img_assets_url = $rootScope.base_url + "assets/images/";
    $rootScope.route_name = $state.current.name;
    
    $scope.onClicks = function () {
        $rootScope.showToast('error', 'error');
    };

    $scope.turn_light_mode = function () {
        Swal.fire({
            title: 'Turn Light Mode!',
            html: "Are you sure you want to turn <strong>Light Mode</strong>?",
            icon: 'warning',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                var data = { csrf: $rootScope.csrf };
                data.theme = "light";
                $http({ url: $rootScope.base_url + "change-theme", data: $.param(data), ignoreLoadingBar: true, method: 'POST', timeout: 30000, headers: { 'Content-Type': 'application/x-www-form-urlencoded' } })
                    .then(function (response) {
                        if (response.data.success == 1) {
                            window.location.reload();
                        } else {
                            $rootScope.showToast('error', response.data.msg);
                        }
                    }, function (error) {
                        console.log(response);
                    });
            }
        });
    }

    $scope.turn_dark_mode = function () {
        Swal.fire({
            title: 'Turn Dark Mode!',
            html: "Are you sure you want to turn <strong>Dark Mode</strong>?",
            icon: 'warning',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                var data = { csrf: $rootScope.csrf };
                data.theme = "dark";
                $http({ url: $rootScope.base_url + "change-theme", data: $.param(data), ignoreLoadingBar: true, method: 'POST', timeout: 30000, headers: { 'Content-Type': 'application/x-www-form-urlencoded' } })
                    .then(function (response) {
                        if (response.data.success == 1) {
                            window.location.reload()
                        } else {
                            $rootScope.showToast('error', response.data.msg);
                        }
                    }, function (error) {
                        console.log(response);
                    });
            }
        });
    }

    $scope.is_show_search = false;

    $scope.closeSearch = function () {
        $scope.is_show_search = false;
        $timeout(function () {
            $document.off('click', $scope.closeSearch);
        });
    };

    $scope.openSearchBar = function (event) {
        $scope.is_show_search = !$scope.is_show_search;
        $timeout(function () {
            if ($scope.is_show_search) {
                $document.on('click', $scope.closeSearch);
            } else {
                $document.off('click', $scope.closeSearch);
            }
        });
        event.stopPropagation();
    };

    $scope.stop_proprgation = function(event){
        event.stopPropagation();
    }


    $scope.search_username = "";

    $scope.more_options = function () {
        alert('d');
    }

    $scope.is_show_more_option = false;
    $scope.show_more_options = function (event) {
        $scope.is_show_more_option = !$scope.is_show_more_option;

        if ($scope.is_show_more_option) {
            $timeout(function () {
                $document.on('click', $scope.close_more_option);
            });
            event.stopPropagation();
        } else {
            $timeout(function () {
                $document.off('click', $scope.close_more_option);
            });
        }
    }

    $scope.close_more_option = function () {
        $scope.is_show_more_option = false;
        $timeout(function () {
            $document.off('click', $scope.close_more_option);
        });
    }

    $scope.init_leftbar = function () {
        console.log('init_leftbar frmo');
    }


    console.log('search Controller');
    console.log($rootScope.base_url);
});