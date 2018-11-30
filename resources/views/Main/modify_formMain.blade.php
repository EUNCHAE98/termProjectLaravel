<?php
?>

    <!doctype html>
    <html>

    <head>
        <link href="{{asset('css/blog.css')}}" rel="stylesheet">
        <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>

        @yield('mdb')

    </head>
    <body>

        @yield('header')
        @yield('modify_form')
        <script>
            CKEDITOR.replace( 'editor1', {

                filebrowserUploadUrl : '{{asset('writeUpload.php')}}',
            });
        </script>
    </body>
        @yield('footer')
    </html>