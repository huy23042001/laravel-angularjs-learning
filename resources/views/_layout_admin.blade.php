<!DOCTYPE html>
<html lang="en" ng-app="app">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Tables - SB Admin</title>
        <link href="/assets/admin/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body class="sb-nav-fixed" ng-app="app">
        <!-- header -->
        @include('includes.header')
        <div id="layoutSidenav">
            <!-- sidebar -->
            @include('includes.sidebar')
            <div id="layoutSidenav_content">
                <!-- content -->
                @yield('content')
                <!-- footer -->
                @include('includes.footer')
            </div>
        </div>
        <script src="/assets/admin/js/scripts.js"></script>
        <script src="/assets/admin/js/datatables-simple-demo.js"></script>
        <script src="/JS/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="/JS/angular.min.js"></script>
        <script>
            var app = angular.module('app', []);
        </script>
        @yield('js')
    </body>
</html>
