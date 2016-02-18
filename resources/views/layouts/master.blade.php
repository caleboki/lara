<!-- Stored in resources/views/layouts/master.blade.php -->
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UFT-8">
        <title>Lara.dev </title>
       
        <link rel="stylesheet" type="text/css" href="{{ elixir('css/all.css') }}">

         

        
    </head>
    <body>

        @include('partials.nav')

        <div class="container">

            @include('flash::message')
                
            @yield('content')
        </div>

        <script src="//code.jquery.com/jquery.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <script>
            $('#flash-overlay-modal').modal();
            //$('div.alert').not('.alert-important').delay(3000).slideUp(300);
        </script>

        
        <script src="/js/all.js"></script>
        
       
        @yield('footer')
    </body>
</html>