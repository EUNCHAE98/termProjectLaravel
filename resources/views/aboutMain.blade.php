<!DOCTYPE html>
<html lang="en">

<head>
    @yield('mdb')

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('css/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('css/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('css/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="asset{{('js/resume.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/calendar.css')}}">

    <link href="{{asset('css/resume.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">
    @yield('aboutNav')

    <div class="container-fluid p-0">
        @yield('aboutSlime')
        <hr class="m-0">
        @yield('aboutCalendar')
        <hr class="m-0">
        @yield('aboutClear')
        <hr class="m-0">
        @yield('aboutButter')
        <hr class="m-0">
        @yield('aboutCrunch')
        <hr class="m-0">
        @yield('aboutJellycube')
        <hr class="m-0">
        @yield('aboutJiggly')
    </div>


</body>
        @yield('footer')


</html>


