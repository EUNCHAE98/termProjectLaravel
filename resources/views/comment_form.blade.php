<?php
?>

<form  action="comment.php?num=<?= $num ?>" method="post" style="border-top: 1px solid #ddd; padding-top: 1rem;">
    <div class="col-15" size=10 style="display: inline-block; width: 85%;">
		<input type="text" class="form-control mb-2" id="co_content" name="co_content" placeholder="댓글을 입력해주세요 ! ">
    </div>
	<div class="col-auto float-right" style="display: inline-block;" >
		<button type="submit" class="btn btn-secondary btn-sm" >등록</button>
	</div>
	@yield('comment_view')
</form>

