<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="../../favicon.ico">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <title>Fundacion Colono</title>
</head>

<body class="container-fluid">


    <div class="row">

            <!-- Sidebar -->
            @include('partials._sidebar')

            <!--Navbar-->
            @include('partials._navbar')

            <!-- Main content -->
            <section id="main" class="col-sm-8 col-md-8 col-md-push-3">
                @yield('main_content')
            </section>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" charset="utf-8"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript">

        $('.sidebar a.list-item').click(function(e){
            $('.sidebar a.list-item').removeClass('active');
            toggleContent(e);
        });

        function toggleContent(e){
            var attr = $(e.currentTarget).attr('data-toggle');
            if(attr !== 'collapse'){
                $(e.currentTarget).addClass('active');
                $('#main > *').fadeOut(0);
                $(attr).fadeIn(0);
            }
            console.log(attr);
        }
    </script>
</body>
</html>
