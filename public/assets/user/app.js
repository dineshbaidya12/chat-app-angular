var app = angular.module('chat_app', ['ui.router', 'ui.bootstrap']);
app.run(function ($rootScope, $interval, $http, $state) {
    $rootScope.base_url = $('base').attr('href');
    $rootScope.user_details = window.userDetails;
    $rootScope.authUser = window.authUser;


    $rootScope.showToast = function (which_icon = 'success', which_title = "Hi!", toastPosition = 'top-end', timerProgressBarShow = false, timming = 3000) {
        const Toast = Swal.mixin({
            toast: true,
            position: toastPosition,
            showConfirmButton: false,
            timer: timming,
            timerProgressBar: timerProgressBarShow,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        Toast.fire({
            icon: which_icon,
            title: which_title
        });
    }


});