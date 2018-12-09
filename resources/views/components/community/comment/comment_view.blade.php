<?php
?>
		@if($comments)
        
		<table class="table table-hover" style="width: 100%;">
            @foreach($comments as $row)
            <form action="{{url('commentDestroy')}}/{{$row['c_id']}}" method="post">    
                        @csrf
                        @method('delete')
            
            <tr>
                <td style="width: 15%;">{{$row["c_writer"]}}</td>
                <td>{{$row["c_content"]}}</td>
                <td style="width: 20%;">{{$row["c_regtime"]}}      
                    <button class="close float-right" type="submit" aria-label="Close">
                        <a aria-hidden="true">×</a>
                    </button>
			     </td>
            </tr>
            </form>
            @endforeach
        </table>
        @endif


