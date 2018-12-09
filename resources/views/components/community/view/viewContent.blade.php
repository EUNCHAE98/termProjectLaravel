<div class="message-title" style="font-size: 1.5rem;">
    {{$board["title"]}}
</div>
<div class="header">
    <img class="avatar" src="{{asset('img/6.png')}}" style="margin-top: .5rem;">
    <div class="from" style="padding-top: .5rem;">
        <span>{{$board["writer"]}}</span>
        <a href="{{url('goToUserBoard')}}/{{$board['writer']}}"> 작성글 보기 </a>
    </div>
    <div class="date"><span class="fa fa-paper-clip"></span>
       {{$board["create_at"]}}
    </div>
    <div class="menu"></div>
</div>
<div class="content">
    <blockquote>
        {!!$board["content"]!!}
    </blockquote>
</div>