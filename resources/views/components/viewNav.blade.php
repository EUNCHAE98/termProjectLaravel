<span class="btn-group d-flex justify-content-end p-3">

	@if(\Auth::user()['name'] != $board['writer'])
    <a class="btn btn-link" data-toggle="modal" href="#myModal"><h5 class="fas fa-shopping-cart" style="color: #ff8c68;"> 구매할래요 ! </h5></a>

    <button class="btn btn-link btn-lg" onclick="location.href='{{url('Board')}}/{{$board['category']}}'"><h4 class="fa fa-arrow-left"></h4></button>
    </span>  

    @else
    <button class="btn btn-link btn-lg" onclick="location.href='{{url('Board')}}/{{$board['category']}}'" style="width:2rem;" ><h4 class="fa fa-arrow-left"></h4></button>
    <button class="btn btn-link btn-lg" onclick="location.href='{{url('modify_form')}}/{{$board['num']}}'" style="width:2rem;" ><h4 class="fa fa-pencil"></h4></button>

    <form action="{{url('destroy'}}/{{$board['num')]}}" method="post" style="display: none;">
    @csrf
    </form>
    	<button class="btn btn-link btn-lg" onclick="document.getElementById(destroy).submit()" style="width:2rem;" ><h4 class="fa fa-trash"></h4></button>
    @endif

</span>