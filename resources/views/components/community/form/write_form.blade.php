<?php
?>

<div class="container" style="border: 1.5px solid #EAEAEA; border-radius: 20px;">

        <!-- 글 등록 버튼을 누르면 write 된다. 방식은 post -->
        <form action="{{url('write')}}" method="post">
            @csrf
            <div class="md-form">
                <input id="input-char-counter" type="text" length="20" name="title" class="form-control col-md-12" placeholder="title" required>
            </div>
            <div class="md-form">
              <input id="input-char-counter" type="text" length="4" class="form-control col-md-2" name="writer" 
              value="{{\Auth::user()['name']}}" readonly>
              <!-- 로그인 했을때 value="\Auth::user()['name']" -->
            </div>
            <div>
                <input name="category" type="hidden" value="{{$category}}">
            </div>

            <div class="form-group">
                <textarea name="content" id="editor1" rows="12" required></textarea>
            </div>



            <button type="submit" class="btn btn-secondary btn-sm">등록</button>
            <!-- 목록보기 버튼을 누를 경우 board.php로 되돌아간다. -->
            <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='{{url('Board')}}/{{$category}}'">목록 보기</button>
        </form>

</div>