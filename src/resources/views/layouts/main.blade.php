<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="../../favicon.ico">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!--<link rel="stylesheet" href="{{asset('assets/bootstrap3/css/bootstrap.min.css')}}">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js" charset="utf-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.min.js" charset="utf-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-sanitize.min.js" charset="utf-8"></script>
    <script src="{{asset('app/app.js')}}"></script>
    <script src="{{asset('app/controllers/PersonController.js')}}"></script>

    <title>Fundacion Colono</title>
</head>

<body class="container-fluid">


    <div class="row" ng-app="App" ng-controller="Main">

        @yield('static_components')

        <!-- Main content -->
        <section id="main" class="col-sm-8 col-md-10 col-md-push-2" ng-view></section>

        @yield('modal')

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" charset="utf-8"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.sidebar a.list-item').click(function(e){
                $('.sidebar a.list-item').removeClass('active');
                if(!e.currentTarget.hasAttribute('data-toggle')){
                    $(e.currentTarget).addClass('active');
                }
            });

            $('.notification-list').ready(function(){
                $('.notification .close').click(function(e){
                    $(this).parent().addClass('animated '+((Math.random() > 0.5)?'fadeOutLeftBig':'fadeOutRightBig'));
                    $(this).parent().one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){$(this).remove();});

                    // Check if notification list is empty,
                    // (true) show message
                });
            });

            // $('form .dropdown-menu').ready(function(){
            //     $('.dropdown *').click(function(e){
            //         e.stopPropagation();
            //     });
            // });

            $('form.async').ready(function(e){
                $('form.async').submit(function(e){
                    e.preventDefault();
                });
            });

        });
    </script>
</body>
</html>
