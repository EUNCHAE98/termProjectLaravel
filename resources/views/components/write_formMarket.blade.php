<?php
?>


<div class="container" style="border: 1.5px solid #EAEAEA; border-radius: 20px;">

        <!-- 글 등록 버튼을 누르면 write 된다. 방식은 post -->
        <form action="{{url('write')}}" method="post">
            @csrf

            <!-- 글 쓰는 폼 -->
            <div class="md-form">
                <input id="input-char-counter" type="text" length="20" name="title" class="form-control col-md-12" placeholder="title" required>
            </div>
            <div class="md-form">
              <input id="input-char-counter" type="text" length="4" class="form-control col-md-2" name="writer" 
              value="{{\Auth::user()['name']}}" readonly>
              <!-- 로그인 했을때 value="\Auth::user()['name']" -->
            </div>


            <!-- 판매할 슬라임 등록 -->
            <div class="mb-4">
                <table id="addTable" width="600">
                   <input class="form-control" type="text" style="width:300px; display:inline-block;" placeholder="슬라임 이름 입력" name="s0">
                   <input name="addButton" type="button" class="btn btn-warning btn-sm" onClick="insRow()" value="ADD">
                   <!-- <input type="button" class="btn btn-warning btn-sm" name="button" value="Confirm" onClick="frmCheck();"> -->
                </table>
            </div>
            <!-- 카테고리 값 market 으로 받아옴 -->
            <div>
                <input name="category" type="hidden" value="{{$category}}">
            </div>

            <div class="form-group">
                <textarea name="content" id="editor1" rows="12" required></textarea>
            </div>


            <button type="submit" class="btn btn-secondary btn-sm">등록</button>
            <!-- 목록보기 버튼을 누를 경우 board.php로 되돌아간다. -->
            <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='{{url('community')}}">목록 보기</button>
        </form>

</div>