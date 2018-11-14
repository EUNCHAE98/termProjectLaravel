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

                        <form action="buy.php" method="post">
                        <!--Body-->
                        <div class="modal-body" style="padding:3rem 10rem 1rem 10rem;">
                                <!-- Default unchecked -->
                                <div class="text-center">

                                <!-- Default inline 1-->
                                <div class="custom-control custom-checkbox custom-control-inline">
                                  <input type="checkbox" class="custom-control-input" id="a">
                                  <label class="custom-control-label" for="a">폼폼 슬라임&nbsp;&nbsp;&nbsp;</label>
                                </div>

                                <!-- Default inline 2-->
                                <div class="custom-control custom-checkbox custom-control-inline">
                                  <input type="checkbox" class="custom-control-input" id="b">
                                  <label class="custom-control-label" for="b">클라우드 슬라임&nbsp;&nbsp;&nbsp;</label>
                                </div>

                                <!-- Default inline 3-->
                                <div class="custom-control custom-checkbox custom-control-inline">
                                  <input type="checkbox" class="custom-control-input" id="c">
                                  <label class="custom-control-label" for="c">묘약 슬라임&nbsp;&nbsp;&nbsp;</label>
                                </div>

                            </div>

                            <div class="md-form">
                                <i class="fa fa-comment prefix grey-text"></i>
                                <input type="text" id="form2" class="form-control validate" name="message" placeholder="판매자에게 한마디">
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

<script>                      // Material Select Initialization
    $(document).ready(function() {
    $('.mdb-select').materialSelect();
    });
</script>