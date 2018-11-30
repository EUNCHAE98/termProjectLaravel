<?php
?>
        <header class="blog_header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="mr-auto p-2">
                    <span class="text-muted">PHP TERM PROJECT BY EUNCHAE</span>
                </div>
                <div class="d-flex justify-content-end">

   <?php

    // $id = isset($_SESSION["id"])?($_SESSION["id"]):"";
    // $name = isset($_SESSION["name"])?($_SESSION["name"]):"";
                        
    // $member = $mdao -> getMember($id);

    // 만약 세션에 id가 없다면 로그인 하지 않은 user 이므로
    // if(!$id){
?>

                    <!-- login 부분 -->
                    <button data-toggle="modal" data-target="#orangeModalSubscription" class="btn btn-link bt-sm">LOGIN</button>

                    <!-- modal 시작 -->
                    <div class="modal fade" id="orangeModalSubscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-notify" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header text-center" style="background-color: #02332d;">
                            <h4 class="modal-title white-text w-100 py-2" style="font-family: 'Julius Sans One';">LOGIN</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">&times;</span>
                            </button>
                        </div>
                        <form action="#" method="post">
                        <!--Body-->
                        <div class="modal-body">
                            <div class="md-form mb-5">
                                <i class="fa fa-user prefix grey-text"></i>
                                <input type="text" id="form3" class="form-control validate" name="id" placeholder="ID">
                            </div>

                            <div class="md-form">
                                <i class="fa fa-lock prefix grey-text"></i>
                                <input type="password" id="form2" class="form-control validate" name="pw" placeholder="PASSWORD">
                            </div>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer justify-content-center">
                            <button type="submit" class="btn btn-outline-warning waves-effect">Login</button>
                        </div>
                    </form>
                    </div>
                    <!--/.Content-->
                    </div>
                    </div>

                    
                    <button data-toggle="modal" data-target="#orangeModalSubscription-1" class="btn btn-link bt-sm">REGISTER</button>

                    <div class="modal fade" id="orangeModalSubscription-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-notify" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header text-center" style="background-color: #02332d;">
                            <h4 class="modal-title white-text w-100 py-2" style="font-family: 'Julius Sans One';">REGISTER</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">&times;</span>
                            </button>
                        </div>

                        <form action="#" method="post">
                        <!--Body-->
                        <div class="modal-body">
                            <div class="md-form mb-5">
                                <i class="fa fa-tag prefix grey-text"></i>
                                <input type="text" id="form3" class="form-control validate" name="Rname" placeholder="NAME">
                            </div>

                            <div class="md-form">
                                <i class="fa fa-user prefix grey-text"></i>
                                <input type="text" id="form2" class="form-control validate" name="Rid" placeholder="ID">
                            </div>
                            <div class="md-form">
                                <i class="fa fa-lock prefix grey-text"></i>
                                <input type="password" id="form2" class="form-control validate" name="Rpw" placeholder="PASSWORD">
                            </div>
                        </div>

                        <!--Footer-->
                        <div class="modal-footer justify-content-center">
                            <button type="submit" class="btn btn-outline-warning waves-effect">Register</button>
                        </div>
                    </form>
                    </div>
                    <!--/.Content-->
                    </div>
                    </div>

<?php
    // 세션에 id가 있다면 로그인 한 user 이므로
    // } else{
?>
                    <!-- logout 부분 -->
                    <button class="btn btn-link bt-sm" onclick="location.href='#'">LOGOUT</button>
                    <!-- logout 부분 끝 -->

                    <!-- update 부분 -->
                    <button data-toggle="modal" data-target="#orangeModalSubscription-2" class="btn btn-link bt-sm">UPDATE</button>

                    <div class="modal fade" id="orangeModalSubscription-2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-notify" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header text-center" style="background-color: #02332d;">
                            <h4 class="modal-title white-text w-100 py-2" style="font-family: 'Julius Sans One';">UPDATE</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">&times;</span>
                            </button>
                        </div>

                        <form action="#" method="post">
                        <!--Body-->
                        <div class="modal-body">
                            <div class="md-form mb-5">
                                <i class="fa fa-tag prefix grey-text"></i>
                                <input type="text" id="form3" class="form-control validate" name="Uname" value=".">
                            </div>

                            <div class="md-form">
                                <i class="fa fa-user prefix grey-text"></i>
                                <input type="text" id="form2" class="form-control validate" name="Rid" value="." readonly>
                            </div>
                            <div class="md-form">
                                <i class="fa fa-lock prefix grey-text"></i>
                                <input type="password" id="form2" class="form-control validate" name="Rpw" value=".">
                            </div>
                        </div>

                        <!--Footer-->
                        <div class="modal-footer justify-content-center">
                            <button type="submit" class="btn btn-outline-warning waves-effect">Update</button>
                        </div>
                    </form>
                    </div>
                    <!--/.Content-->
                    </div>
                    </div>


<?php
    // }
?>

            </div>
        </div>
    </header>

            <!-- logo 부분 -->
            <div class="header_cont">
                <div class="logo_s" style="color: #fff;">슬라임을 모르고 살기엔, 인생은 너무 길다 </div>
                <div class="logo" style="color: #fff;">Smile , <span class="logo_h">Slime</span></div>
            </div>
        </header>

        <div class="content_nav">
            <button class="btn btn_link about_btn" type="button" onclick="location.href='{{url('about')}}'">ABOUT 'SLIME'</button>
            <button class="btn btn_link community_btn" type="button" onclick="location.href='{{url('community')}}'">
            'SLIME' COMMUNITY</button>
        </div>