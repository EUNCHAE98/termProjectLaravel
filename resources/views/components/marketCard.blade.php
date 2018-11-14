<?php
?>

<div class="card-deck">
    @foreach ($boards as $row)
    <div class="card col-4" style="padding:0px;">

      <!--Card image-->
      <div class="view overlay">
        <img class="card-img-top" src="{{asset('img/rillyS.jpg')}}" alt="Card image cap">
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

      <!--Card content-->
      <div class="card-body">

        <!--Title-->
        <h5 class="card-title"><?= $row["num"] ?></h5>
        <p class="card-title"><?= $row["writer"] ?></p>
        <p class="card-title"><?= $row["created_at"] ?></p>
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
        <button type="button" class="btn btn-grey btn-md" onclick="location.href='{{url('view')}}/{{$row['num']}}'">사러 가기</button>

      </div>

  </div>
  <!-- Card -->
  @endforeach
</div>
  <!-- Card-deck -->

          <form action="{{url('write/market')}}" method="post">
          <div class="col-14 d-flex justify-content-end">
              <button type="submit" class="btn btn-warning">글쓰기</button>
          </div>
        </form>