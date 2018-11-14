<?php
?>

<div class="container">
    <header class="blog-header py-3">
        <!-- info랑 login버튼들 부분 -->
        <div class="row flex-nowrap justify-content-between align-items-center">
            <!-- header info 부분 -->
            <div class="mr-auto p-2">
                <span class="text-muted">PHP TERM PROJECT BY EUNCHAE</span>
            </div>
            <!-- header info 끝 -->
            <!-- login/register or logout/update 부분 -->
            <div class="d-flex justify-content-end">

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

                        <form action="login.php" method="post">
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

                    <!-- modal 끝 -->
                    <!-- login 부분 끝 -->

                    <!-- register 부분 -->
                    
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

                        <form action="register.php" method="post">
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


                    <!-- logout 부분 -->
                    <button class="btn btn-link bt-sm" onclick="location.href='logout.php'">LOGOUT</button>
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

                        <form action="update.php" method="post">
                        <!--Body-->
                        <div class="modal-body">
                            <div class="md-form mb-5">
                                <i class="fa fa-tag prefix grey-text"></i>
                                <input type="text" id="form3" class="form-control validate" name="Uname" value="<?= $member["name"] ?>">
                            </div>

                            <div class="md-form">
                                <i class="fa fa-user prefix grey-text"></i>
                                <input type="text" id="form2" class="form-control validate" name="Rid" value="<?= $member["id"] ?>" readonly>
                            </div>
                            <div class="md-form">
                                <i class="fa fa-lock prefix grey-text"></i>
                                <input type="password" id="form2" class="form-control validate" name="Rpw" value="<?= $member["pw"] ?>">
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

                    <!-- modal 끝 -->
                        <!-- update 부분 끝 -->


            </div>
            <!-- login/register or logout/update 부분 끝 -->
        </div>
        <!-- info랑 login버튼들 부분 끝-->
        <!-- logo 부분 -->
        <div class="col-4 text-center logo" style="margin:auto">
            <a class="blog-header-logo" href="index.php" style="color: #02332d;">Smile, </a>
            <a class="blog-header-logo" href="community.php" style="color: #ff8c68;">Slime</a>
        </div>
        <!-- logo 부분 끝-->

    </header>

    <!-- 네비게이션 바 -->
    <div class="nav-scroller mb-2">
        <nav class="nav d-flex justify-content-around">
            <input type="button" id="QnAbtn" class="btn btn-link" value="슬라임 질문답변" onclick="location.href='QnABoard.php'">

            <input type="button" id="Reviewbtn" class="btn btn-link" value="슬라임 후기방" onclick="location.href='ReviewBoard.php'"> 

            <input type="button" id="marketbtn" class="btn btn-link" value="슬라임 마켓" onclick="location.href='MarketBoard.php'">
        </nav>
    </div>
    <!-- 네비게이션 바 끝 -->

