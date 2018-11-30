<?php
?>
		@if($comments)
		<table class="table table-hover" style="width: 100%;">
            @foreach($comments as $row)
            <tr>
                <td style="width: 15%;">{{$row["c_writer"]}}</td>
                <td>{{$row["c_content"]}}</td>
                <td style="width: 20%;">{{$row["c_regtime"]}}
                <button class="close float-right" type="button" aria-label="Close">
				  <a href="#" aria-hidden="true">×</a>
				</button>
			</td>
            </tr>
            @endforeach
        </table>
        @endif


