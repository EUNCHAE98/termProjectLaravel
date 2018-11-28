<?php
?>    
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">writer</th>
                    <th scope="col">when</th>
                    <th scope="col">hit</th>
                </tr>
            </thead>
            <tbody>
                <!-- 글 들어가는 부분 -->
                @foreach($userBoards as $row)
                <tr>
                        <th scope="row">
                            {{$row["num"]}}
                        </th>

                    <td><input type="button" class="btn btn-link" value="{{$row['title']}}" 
                        onclick="location.href='{{url('view')}}/{{$row['num']}}'"></td>
                        <td>
                            {{$row["writer"]}}
                        </td>
                        <td>
                            {{$row["created_at"]}}
                        </td>
                        <td>
                            {{$row["hits"]}}
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>



<nav aria-label="Page navigation example">
  <ul class="pagination pg-purple justify-content-center">
        {{ $userBoards->links() }}
    </ul>
    </nav>
