<html>
    <head>
        @yield('mdb')
    <link href="{{asset('css/blog.css')}}" rel="stylesheet">
    </head>
    <body>
            @yield('header')
        <div class="slider-container">
            @yield('reviewImage')
            @yield('board')
        </div>
    </div>
    </body>
            @yield('footer')
</html>