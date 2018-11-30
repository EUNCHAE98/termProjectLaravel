<?php
?>

    <!DOCTYPE html>
    <html>

    <head>
        <link href="{{asset('css/view.css')}}" rel="stylesheet">
        <!-- marketPop 스크립트 -->
        <script>                      
            $(document).ready(function() {
                $('.mdb-select').materialSelect();
            });
        </script>
        @yield('mdb')
    </head>

    <body>

        <!-- 비로그인인 경우에는 접근에 제한을 둔다-->
        @if(!\Auth::check())
        <script>alert("접근 권한이 없습니다 ! ")
                history.back();
        </script>

        <!-- 로그인 회원인 경우 글을 보여준다-->
        @else
        @yield('header')

        <div class="container" style="border: 1.5px solid #EAEAEA; border-radius: 20px; margin-top: 1rem;">
            <div class="row inbox">
                <div class="col-md-12">
                    <div class="panel panel-default ">
                        <div class="panel-body message">

                            @yield('viewContent')
                            @yield('viewNav')
                            @yield('marketPop')

                        </div>
                            <!-- 댓글창 -->
                            @yield('comment_form')
                    </div>
                </div>
            </div>
        </div>

        </div>

        @yield('footer')

        </body>

    </html>
    @endif
