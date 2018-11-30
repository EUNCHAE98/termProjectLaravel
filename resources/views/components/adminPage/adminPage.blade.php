
<!-- Table with panel -->
<div class="card card-cascade narrower">

  <!--Card image-->
  <div class="view view-cascade gradient-card-header amy-crisp-gradient narrower py-2 mx-6 mb-3 d-flex justify-content-between align-items-center">

    <div>
      <button type="button" class="btn btn-outline-white btn-sm px-2">
          <i class="fa fa-star mt-0"></i>
      </button>
    </div>

    <a href="" class="white-text mx-4">USER LIST</a>

    <div>
      <button type="button" class="btn btn-outline-white btn-sm px-2" onclick="document.getElementById('userDelete').submit()">
          <i class="fa fa-remove mt-0"></i>
      </button>
    </div>

  </div>
  <!--/Card image-->

  <div class="px-4">

    <div class="table-wrapper">
      <!--Table-->
      <table class="table table-hover mb-0">

        <!--Table head-->
        <thead>
          <tr>
            <th>
              <label class="form-check-label" for="checkbox" class="mr-2 label-table"></label>
            </th>
            <th class="th-lg">
              <a>name</a>
            </th>
            <th class="th-lg">
              <a href="">email</a>
            </th>
            <th class="th-lg">
              <a href="">password</a>
            </th>
            <th class="th-lg">
              <a href="">create_at</a>
            </th>
            <th class="th-lg">
              <a href="">update_at</a>
            </th>
            <th class="th-lg">
              <a href="">작성글</a>
            </th>
          </tr>
        </thead>
        <!--Table head-->

        <!--Table body-->
        <tbody>
          <form id="userDelete" method="post" action="{{url('userDelete')}}">
            @csrf
              
            @foreach($users as $row)
              <tr>
                <th scope="row">
                  <input class="form-check-input" type="checkbox" name="users[]" value="{{$row['id']}}">
                </th>
                <td>{{$row["name"]}}</td>
                <td>{{$row["email"]}}</td>
                <td>*********</td>
                <td>{{$row["created_at"]}}</td>
                <td>{{$row["updated_at"]}}</td>
                <td><a href="{{url('goToUserBoard')}}/{{$row['name']}}">보러가기 <i class="fas fa-angle-right"></i><a></td>
              </tr>
            @endforeach
          </form>
        </tbody>
        <!--Table body-->
      </table>
      <!--Table-->
    </div>

  </div>

</div>
<!-- Table with panel -->