

<!DOCTYPE html>
    <html>

        <head>
            <title>슬라임을 사랑하는 사람들의 모임</title>
            @yield('mdb')
            <link href="{{asset('css/index.css')}}" rel="stylesheet">
        </head>
        <body>
            <div class="page-back">
                <div class="container">
                    @yield('header')
                    <div class="content_v">
                    	@yield('video')
                	</div>
                </div>
                <!-- container end--> 
            </div>
            <!-- page-back end--> 
        </body>
            @yield('footer')
<!-- footer 부분 -->
    </html>

    
