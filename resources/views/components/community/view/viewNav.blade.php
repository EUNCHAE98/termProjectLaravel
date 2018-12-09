<span class="btn-group d-flex justify-content-end p-3">

	<!-- marketBoard 인 경우에는 구매 버튼을 보여준다 -->
	@if($board['category'] == 'market')
		@if(\Auth::user()['name'] != $board['writer'])
    		<a class="btn btn-link" data-toggle="modal" href="#myModal"><h5 class="fas fa-shopping-cart" style="color: #ff8c68;"> 구매할래요 ! </h5></a>
    	@endif
    @endif

    <!-- 다른 사람이 쓴 글이면 목록 가기 버튼만 보여줌-->
	@if(\Auth::user()['name'] != $board['writer'])
    <button class="btn btn-link btn-lg" onclick="location.href='{{url('Board')}}/{{$board['category']}}'"><h4 class="fa fa-arrow-left"></h4></button>
    </span>  

    <!-- 본인이 쓴 글이면 수정버튼 + 삭제버튼도 보여줌-->
    @else
    <button class="btn btn-link btn-lg" onclick="location.href='{{url('Board')}}/{{$board['category']}}'" style="width:2rem;" ><h4 class="fa fa-arrow-left"></h4></button>
    <button class="btn btn-link btn-lg" onclick="location.href='{{url('modify_form')}}/{{$board['num']}}'" style="width:2rem;" ><h4 class="fa fa-pencil"></h4></button>
    <form action="{{route('board.destroy',['board'=>$board['num']])}}" method="post">    
        @csrf
        @method('delete')
        <button class="btn btn-link btn-lg" style="width:2rem;" type="submit"><h4 class="fa fa-trash"></h4></button>
    </form>
    @endif

</span>