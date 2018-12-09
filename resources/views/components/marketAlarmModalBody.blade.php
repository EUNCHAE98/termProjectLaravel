
    <div class="modal-body">
            <div class="text-center">
                <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                    <div class="col-12">
                            @if($buys == 0)
                                <p>구매 문의가 없습니다 ! </p>
                            @else
                                @foreach($buys as $buy)
                                    @foreach($buy as $row)
                                        @if(!$row['status'])
                                            <button type="button" id="getRequest" class="btn btn-link">
                                                <input type="hidden" value="{{$row['order_id']}}" id="order_id" />
                                                <span style="color: #ff0000;">{{$row['name']}}</span> 님에게서 구매 문의 도착 !
                                                <p><?= $row['s_regtime'] ?></p>
                                            </button>
                                        @else
                                            <p>주문을 모두 확인했습니다 ! </p>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endif
                    </div>
            </div>
    </div>
    <div class="modal-footer justify-content-center">
        <button class="btn btn-outline-warning" data-dismiss="modal">닫기</a>
    </div>
    


