<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <title> @yield('title') </title>

    </head>
    <body>
        <div class="container">
            @yield('container')
        </div>
    </body>
</html>