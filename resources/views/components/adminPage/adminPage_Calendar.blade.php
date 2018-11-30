<div class="card">

  <div class="card-body">
    <p class="card-title" style="font-size: 1.5rem;">Slime Open Market Calendar</p>
    <p class="card-text">Add Schedule and Make up Our Slime Open Market Calendar !</p>
    


<!-- Button trigger modal -->
<button type="button" class="btn warm-flame-gradient" data-toggle="modal" data-target="#basicExampleModal">
  캘린더 일정 추가
</button>

<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">캘린더 일정 추가</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <form action="{{ route('tasks.store') }}" method="post">
          {{ csrf_field() }}
                
                <!-- Material form grid -->
      
        <!-- Grid row -->
        <div class="row">
          <!-- Grid column -->
          <div class="col">
            <!-- Material input -->
            <div class="md-form mt-0">
              <input type="text" name="name" class="form-control" placeholder="Task Name">
            </div>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col">
            <!-- Material input -->
            <div class="md-form mt-0">
              <input type="text" class="date form-control" name="task_date" placeholder="날짜 선택">

              <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
              <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
              <script>
                  $('.date').datepicker({
                      autoclose: true,
                      dateFormat: "yy-mm-dd"
                  });
              </script>
            </div>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->

      <!-- Material form grid -->
        <!-- Material input -->
        <div class="md-form form-group mt-5">
          <input type="text" class="form-control" name="description" placeholder="Task Description">
        </div>
      


      <div class="modal-footer">
        <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning">Save changes</button>
      </div>
      </form>
    </div>
    </div>
  </div>
</div>

  </div>
</div>



