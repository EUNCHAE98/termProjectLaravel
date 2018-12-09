<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Board;

class AjaxController extends Controller {
   public function returnMessage(Request $request){
		// return $request;
		if($request->ajax()){
			// return "aa";
			// return $request->order_id;
			$user = \Auth::user()['name'];
        	$board = Board::where('writer', $user)->where('category', 'market')->get();

        // if($board!='[]'){
            for($i=0; $i<count($board); $i++){
                $buys[$i] = Board::find($board[$i]->num)->buys->where('order_id',$request->order_id)->where('status', 0);
            }
            return view('components.marketAlarmModalView')->with('buys',$buys)->with('order_id',$request->order_id);
        // }else{
        //     return view($url)->with('buys',0);
        // }
        }
	}
}