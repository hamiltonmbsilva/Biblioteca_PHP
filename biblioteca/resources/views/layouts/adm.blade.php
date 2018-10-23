<!DOCTYPE html>
<html>
    @include('layouts.header')
    <body>
        @include('layouts.sidebar')
        @yield('content')
    </body>
    @include('layouts.footer')
</html>
