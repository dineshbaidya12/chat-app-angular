@php
    $user_type = 'user';
    $version = rand(10, 1000000);
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Real Chat - Real Time Chatting Web App</title>
    <base href="{{ asset('/') }}" />
    <base csrf="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- CDN Includes --}}

    {{-- #ANGULAR JS --}}
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/1.1.0/angular-ui-router.min.js"></script>
    <script src="{{ asset('angular/ui-bootstrap-tpls-3.0.6.min.js') }}"></script>
    {{-- #ANGULAR JS --}}

    {{-- #FONTAWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    {{-- #FONTAWESOME --}}

    {{-- #JQUERY --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- #JQUERY --}}

    {{-- #BOOTSRTAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- #BOOTSRTAP --}}

    {{-- #SWEETALERT --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- #SWEETALERT --}}

    {{-- CDN Includes --}}

    {{-- ANGULAR NESSESARY SCRIPTS --}}
    <script src="{{ asset('assets/' . $user_type . '/app.js?v=' . $version) }}"></script>
    <script src="{{ asset('assets/' . $user_type . '/config-routes.js?v=' . $version) }}"></script>
    {{-- ANGULAR NESSESARY SCRIPTS --}}

    {{-- ANGULAR JS CONTROLLERS --}}
    @if ($user_type == 'user')
        <script src="{{ asset('assets/' . $user_type . '/controllers/HomeController.js?v=' . $version) }}"></script>
        <script src="{{ asset('assets/' . $user_type . '/controllers/LeftbarController.js?v=' . $version) }}"></script>
    @elseif ($user_type == 'admin')
        <script src="{{ asset('assets/' . $user_type . '/controllers/dummy_controller.js?v=' . $version) }}"></script>
    @endif
    {{-- ANGULAR JS CONTROLLERS --}}

    {{-- OTHERS --}}
    <link rel="stylesheet" href="{{ asset('assets/' . $user_type . '/css/style.css?v=' . $version) }}">
    <script src="{{ asset('assets/' . $user_type . '/js/script.js?v=' . $version) }}"></script>
    {{-- OTHERS --}}
    @if ($userDetails->theme == 'dark')
        <style>
            :root {
                --theme-body: #202124;
                --theme-font-color: #fff;
                --swal-button-color: #092146;
                --swal-button-hover-color: #88f;
                --tooltip-font : #092146;
                --tooltip-bg : #fff;
                --theme-dropdown-body: #303031;
                --theme-dropdown-hover: #595959;
                --liitle-lighter-bg: #47484d;
                --connection-hover: #2d2d2d;
                --gredient: linear-gradient(to left ,#202124, #464444, #202124);
            }
        </style>
    @else
        <style>
            :root {
                --theme-font-color: #202124;
                --theme-body: #fff;
                --swal-button-color: #88f;
                --swal-button-hover-color: #092146;
                --tooltip-font : #fff;
                --tooltip-bg : #092146;
                --theme-dropdown-body: #d2d2d2;
                --theme-dropdown-hover: #a6a6a6;
                --liitle-lighter-bg: #a6a6a6;
                --connection-hover: #cacaca;
                --gredient: linear-gradient(to left ,#ffffff, #c4bfbf, #ffffff);
            }
        </style>
    @endif
    <script>
        window.userDetails = @json($userDetails);
        window.authUser = @json($authUser);
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

</head>

<body ng-app="chat_app" ng-cloak>
    <noscript>
        <div
            style="width:300px; position: absolute; left:50%; top:50%; color: red; background-color: white; border: 1px solid red; padding: 4px; font-family: sans-serif; -moz-transform: translateX(-50%) translateY(-50%); -webkit-transform: translateX(-50%) translateY(-50%); transform: translateX(-50%) translateY(-50%);">
            Your web browser must have JavaScript enabled
            in order for this application to display correctly.
        </div>
    </noscript>
    <div class="box-loader" id="loader_on_off" style="z-index: 10000; display: none; position: fixed;"></div>
    <div ui-view autoscroll="false">
    </div>
</body>

</html>
