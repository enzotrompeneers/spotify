<!DOCTYPE html>
<html>
    <head>
        @include('includes.header')
    </head>
    <body>
        <div class="content">
            @include('includes.navbar')
            @yield('content')
        </div>
        <footer class="footer">@include('includes.footer')</footer>
    </body>
</html>