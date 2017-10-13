<!DOCTYPE html>
<html>
    <head>
        @include('includes.header')
    </head>
    <body>
        @include('includes.navbar')
        <container>
            @yield('content')
        </container>
        <footer>
            @include('includes.footer')
        </footer>
    </body>
</html>