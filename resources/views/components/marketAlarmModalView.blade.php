<div class="modal-body">
    <div class="text-center">
		<div class="col-12">
			@foreach($buys as $buy)
	   			@foreach($buy as $row)
	   				<input type="hidden" value="{{$row['order_id']}}" name="order_id" />
	    			<p>{{ $row['s_name'] }}</p>
	    			<p>{{ $row['message'] }}</p>

					
	    		@endforeach
			@endforeach
		</div>
	</div>
</div>

<form action="{{url('buyConfirm')}}/{{$order_id}}" method="post">
						@csrf
						<div class="modal-footer justify-content-center">
					   		<button class="btn btn-warning btn-sm" type="submit">주문 접수</a>
						</div>
					</form>


