<?php
?>

<div class="container" style="border: 1.5px solid #EAEAEA; border-radius: 20px;">

        <!-- 글 등록 버튼을 누르면 write 된다. 방식은 post -->
        <form action="{{url('modify')}}" method="post">
            @csrf
            <input type="hidden" name="num" value="{{$board['num']}}">
            <div class="md-form">
                <input id="input-char-counter" type="text" length="20" name="title" class="form-control col-md-12" value="{{$board['title']}}" required>
            </div>
            <div class="md-form">
              <input id="input-char-counter" type="text" length="4" class="form-control col-md-2" name="writer" 
              value="{{$board['writer']}}" readonly>
              <!-- 로그인 했을때 value="\Auth::user()['name']" -->
            </div>            

            <div class="form-group">
                <textarea name="content" id="editor1" rows="12" required><?= $board['content'] ?></textarea>
            </div>



            <button type="submit" class="btn btn-secondary btn-sm">등록</button>
            <!-- 목록보기 버튼을 누를 경우 board.php로 되돌아간다. -->
            <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='{{url('Board')}}/{{$board['category']}}'">목록 보기</button>
        </form>

</div>