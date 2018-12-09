<?php
?>

  <div class="card-deck" style="padding-top: 0.35rem;">
      @foreach ($boards as $row)
      <div class="col-4 text-center " 
      style="padding:0px; border-right:solid 1px #eeeeee; border-left:solid 1px #eeeeee; border-bottom:solid 1px #eeeeee;">
        <h5 class="card-header h5">market</h5>
        <div class="card-body">
          <h5 class="card-title"><?= $row["title"] ?></h5>
          <p class="card-title"><?= $row["writer"] ?></p>
          <p class="card-title"><?= $row["created_at"] ?></p>
          <button type="button" class="btn btn-grey btn-md" onclick="location.href='{{url('view')}}/{{$row['num']}}'">사러 가기</button>
        </div>
      </div>
      @endforeach
  </div>
  <!-- Card-deck -->
</div>  

  <div class="col-14 d-flex p-2 justify-content-end">
    <button type="button" onclick="location.href='{{url('write_form')}}/{{$row['category']}}'" class="btn btn-warning">글쓰기</button>
  </div>

  <!-- pagination -->
  <nav aria-label="Page navigation example">
    <ul class="pagination pg-purple justify-content-center">
        {{ $boards->links() }}
    </ul>
  </nav>





