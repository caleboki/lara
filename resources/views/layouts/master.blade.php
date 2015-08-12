<!-- Stored in resources/views/layouts/master.blade.php -->
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UFT-8">
        <title>Lara.dev </title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>       

        <div class="container">
            @yield('content')
        </div>

        @yield('footer')
    </body>
</html>