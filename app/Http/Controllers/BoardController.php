<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\board;
use App\User;
use App\Comment;
use App\Task;
use App\market_slime;

class BoardController extends Controller
{
	// write_form
    public function write_form($category){
        return view('write_form')->with('category', $category);
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
    	$boards = board::where('category', $category)->paginate(5);
        
        return view($category.'Board')->with('boards', $boards);
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
                $market_slimes->id = $board->num;     // 해당 게시글의 num 값이 저장된다
                $market_slimes->name = $sellSlime['s'.$i];

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
        $board = board::where('num', $num)->first();
        $comments = comment::all()->where('board_id',$num);

        return view('view')->with('board',$board)->with('comments',$comments);
    }

    // modify_form
    public function modify_form($num){
        $board = board::where('num', $num)->first();

        return view('modify_form')->with('board', $board);
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
    public function destroy($num){
        $board = board::where('num',$num)->delete();

        return redirect('/board/'.$board->category)->with('message',"게시글이 삭제되었습니다 ! ");
    }


    // market buy (미구현)
    public function buy(){
        return view('buy');
    }
}
