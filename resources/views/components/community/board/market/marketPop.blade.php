<!-- modal 시작 -->
                    <div class="modal fade bottom" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-full-height modal-bottom" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header text-center" style="background-color: #02332d;">
                            <h4 class="modal-title white-text w-100 py-1 ">
                                <i class="fas fa-shopping-cart"> CHOICE </i>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">&times;</span>
                            </button>
                        </div>

                        <form action="{{url('buy')}}/{{$board['num']}}" method="post">
                        @csrf
                        <!--Body-->
                        <div class="modal-body" style="padding:3rem 10rem 1rem 10rem;">
                                <!-- Default unchecked -->
                                <div class="text-center">

                                @foreach($slime_market as $row)

                                <!-- Default inline 1-->
                                <div class="custom-control custom-checkbox custom-control-inline">
                                  <input type="checkbox" class="custom-control-input" name="buySlimes[]" value="{{$row['s_name']}}" id="<?= $row["s_name"] ?>">
                                  <label class="custom-control-label" for="<?= $row["s_name"] ?>"><?= $row["s_name"] ?></label>
                                </div>

                                @endforeach

                            </div>

                            <div class="md-form">
                                <i class="fa fa-comment prefix grey-text"></i>
                                <input type="text" id="form2" class="form-control validate" name="message" placeholder="판매자와 연락 가능한 휴대전화 번호 / 카카오톡 ID / email 을 입력해주세요 ! ">
                            </div>
                        </div>

                        <!--Footer-->
                        <div class="modal-footer justify-content-end">
                            <button type="submit" class="btn btn-warning">confirm</button>
                        </div>
                    </form>
                    </div>
                    <!--/.Content-->
                    </div>
                    </div>

                    <!-- modal 끝 -->

