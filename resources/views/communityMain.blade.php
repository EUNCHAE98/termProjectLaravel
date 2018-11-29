<?php
?>

<!DOCTYPE html>
  <html>
    <head>
      @yield('mdb')
      <link href="{{asset('css/blog.css')}}" rel="stylesheet">
    </head>
    <body>
        @yield('header')
        @if(Session::has('message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>{{ Session::get('message') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        @yield('imageSlide')
        @yield('cardSection')
      </div>
    </body>
        @yield('footer')
  </html>
