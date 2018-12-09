<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\board;
use App\User;
use App\Comment;
use App\Task;
use App\market_slime;
use App\Buy;

class BoardController extends Controller
{
	// write_form
    public function write_form($category){

		$user = \Auth::user()['name'];
        $board = Board::where('writer', $user)->where('category', 'market')->get();

        if($board!='[]'){
            for($i=0; $i<count($board); $i++){
                $buys[$i] = Board::find($board[$i]->num)->buys->where('status', 0);
            }
	        return view('write_form')->with('category', $category)->with('buys',$buys);
        }else{
            return view('write_form')->with('category', $category)->with('buys',0);
        }
    }

    // modify_form
    public function modify_form($num){
        $boards = board::where('num', $num)->first();

        $user = \Auth::user()['name'];
        $board = Board::where('writer', $user)->where('category', 'market')->get();

        if($board!='[]'){
            for($i=0; $i<count($board); $i++){
                $buys[$i] = Board::find($board[$i]->num)->buys->where('status', 0);
            }
	        return view('modify_form')->with('board', $boards)->with('buys',$buys);
        }else{
            return view('modify_form')->with('board', $boards)->with('buys',0);
        }
    }

    // file_upload 
    public function writeUpload(){
                
        if ($_FILES["upload"]["size"] > 0 ){

            //오리지널 파일 이름.확장자
            $ext = substr(strrchr($_FILES["upload"]["name"],"."),1);
            $ext = strtolower($ext);
            $savefilename = $_FILES["upload"]["name"];
            $url="{{asset('img/upload')}}";
            $uploadpath  = $_SERVER['DOCUMENT_ROOT']."$url";
            $uploadsrc = $_SERVER['HTTP_HOST']."{{asset('img/upload')}}";
            $http = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') ? 's' : '') . '://';

            if(move_uploaded_file($_FILES['upload']['tmp_name'],$uploadpath."/".iconv("UTF-8","EUC-KR",$savefilename))){
                $uploadfile = $savefilename;
                echo '
                {
                    "fileName": "'.$savefilename.'",
                    "uploaded": 1,
                    "url": "'.$url.'/'.$savefilename.'"
                }
                ';
            }

        }else{
            exit;
        }
    }

    // board 와 pagination
    public function Board($category){
    	$boards = board::where('category', $category)->paginate(6);

    	$user = \Auth::user()['name'];
        $board = Board::where('writer', $user)->where('category', 'market')->get();

        if($board!='[]'){
            for($i=0; $i<count($board); $i++){
                $buys[$i] = Board::find($board[$i]->num)->buys->where('status', 0);
            }
            return view($category.'Board')->with('boards', $boards)->with('buys',$buys);
        }else{
            return view($category.'Board')->with('boards', $boards)->with('buys',0);
        }
    }

    /*
		write

		추가기능 : 
		category = market 인 경우, 사용자가 추가한 슬라임이 slime_market 테이블에 저장
    */
    public function write(Request $request){
        $board = new board();

        $board->title = $request->title;
        $board->writer = $request->writer;
        $board->content = $request->content;
        $board->category = $request->category;

        $board->save();

        if($request->category == 'market'){
            for($i=0; $i<count($request->all())-5; $i++){

                $market_slimes = new market_slime();   

                $sellSlime['s'.$i] = $request['s'.$i];
                $market_slimes->board_id = $board->num;     // 해당 게시글의 num 값이 저장된다
                $market_slimes->s_name = $sellSlime['s'.$i];

                $market_slimes->save();
            }
        }

        return redirect('/view/'.$board->num)->with('message',"글이 정상적으로 등록되었습니다 ! ");
   	}

   	// comment 
   	public function comment(Request $request, $num){
        $comment = new comment();

        $comment->board_id = $num;
        $comment->c_writer = \Auth::user()['name'];
        $comment->c_content = $request->c_content;

        $comment->save();

        return redirect('/view/'.$num)->with('message',"댓글이 정상적으로 등록되었습니다 ! ");
    }

    // view 글 상세보기
    public function view($num){
        $boards = board::where('num', $num)->first();
        $comments = comment::all()->where('board_id',$num);
        $slime_market = market_slime::all()->where('board_id',$num);

        $user = \Auth::user()['name'];
        $board = Board::where('writer', $user)->where('category', 'market')->get();

        if($board!='[]'){
            for($i=0; $i<count($board); $i++){
                $buys[$i] = Board::find($board[$i]->num)->buys->where('status', 0);
            }
            return view('view')->with('board',$boards)->with('comments',$comments)->with('slime_market',$slime_market)->with('buys',$buys);
        }else{
            return view('view')->with('board',$boards)->with('comments',$comments)->with('slime_market',$slime_market)->with('buys',0);
        }
    }


    // modify
    public function modify(Request $request){
        $board = board::where('num', $request->num)->first();

        $board->title = $request->title; 
        $board->writer = $request->writer;
        $board->content = $request->content;

        $board->save(); 

        return redirect('/view/'.$board->num)->with('message',"글이 정상적으로 수정되었습니다 ! ");
    }

    // delete
    public function destroy($board){
        board::where('num',$board)->delete();

        return redirect('/community')->with('message',"게시글이 삭제되었습니다 ! ");
    }

    // comment delete
    public function commentDestroy($c_id)
	{
    	comment::where('c_id',$c_id)->delete();
    	return back();
	}

    // buy
    public function buy(Request $request, $num){

        for($i=0; $i<count($request['buySlimes']); $i++){
        	$buy = new buy();

	        $buy->board_id = $num;
	        $buy->name = \Auth::user()['name'];
	        $buy->message = $request->message;
			$buy->s_name = $request['buySlimes'][$i];
			$buy->order_id = $num;
			$buy->save();
		}

		return redirect('/view/'.$num);
	
	}

	public function buyConfirm($order_id){
		// return $order_id;

		$buy = buy::where('order_id',$order_id)->first();

		$buy->status = true;
		$buy->save();

		return redirect('community');
	}
}
