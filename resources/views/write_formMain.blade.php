<?php
?>

    <!doctype html>
    <html>

    <head>
        <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
        <link href="{{asset('css/blog.css')}}" rel="stylesheet">
        @yield('mdb')
    </head>
    <body>
        @yield('header')      
        @yield('write_form')
        <script>
            CKEDITOR.replace( 'editor1', {

                filebrowserUploadUrl : '{{asset('writeUpload.php')}}',
            });
        </script>
    </body>
        @yield('footer')
    </html>