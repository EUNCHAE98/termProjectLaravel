<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\board;
use App\User;
use App\Comment;
use App\Task;
use App\market_slime;

class indexController extends Controller
{
    public function main(){
        return view('index');
    }

    public function userDelete(Request $request){
        // return response()->json($request['users'], 200, [], JSON_PRETTY_PRINT);
        
        for($i=0; $i<count($request['users']); $i++){
            // echo $request['users'][$i];
            user::where('id', $request['users'][$i])->delete();
        }
        // foreach($request as $row){
        //     return $row->users;
        //     user::where('id',$row['users'])->delete();
        // }

        return redirect('/adminPage');
    }


    public function goToUserBoard($name){
        $user = user::where('name',$name)->value('name');
        $userBoards = board::where('writer',$user)->paginate(6);

        return view('/goToUserBoard')->with('userBoards',$userBoards);
    }

    public function community(){
        return view('community');
    }

    public function about(){
        $tasks = Task::all();
    	return view('about')->with('tasks',$tasks);
    }

    public function write_form($category){
        return view('write_form')->with('category', $category);
    }

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

            //php 파일업로드하는 부분

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

    public function buy(){
        return view('buy');
    }


    // public function marketSlime(request $requset){
    //     $market_slime = new market_slime();

    //     // 사용자가 추가한 슬라임 이름을 marekt_slime 테이블에 추가해준다
    //     $market_slime->name = $request->name;

    //     $market_slime->save();
    // }

    public function Board($category){
    	$boards = board::where('category', $category)->paginate(5);
        
        return view($category.'Board')->with('boards', $boards);
    }

    // public function QnABoard(){
    // 	$qboards = board::all()->where('category', "QnA");

    // 	return view('QnABoard')->with('boards', $qboards);
    // }

    // public function marketBoard(){
    //     $mboards = board::all()->where('category', "market");

    // 	return view('marketBoard')->with('boards', $mboards);
    // }

    // 게시글 작성
    public function write(Request $request){
        

        // $bdao = new boardDao();
        $board = new board(); //boards 테이블을 생성해서 담음
        // $title = requestValue("title");
         /*=> form태그에서 action으로 이 메서드로 데이터를 전송하면 매개변수 Request $request로 받아 온다*/
        $board->title = $request->title; /*$_REQUEST['title'] == $request->title*/
        $board->writer = $request->writer;
        $board->content = $request->content;
        $board->category = $request->category;

        $board->save();


        if($request->category == 'market'){
            // $sellSlime = array_pop($request);
            // return $sellSlime;
            for($i=0; $i<count($request->all())-5; $i++){

                $market_slimes = new market_slime();    
                $sellSlime['s'.$i] = $request['s'.$i];
                $market_slimes->id = $board->num;
                $market_slimes->name = $sellSlime['s'.$i];
            

                $market_slimes->save();
            } 


                // return response()->json($sellSlime,200,[],JSON_PRETTY_PRINT);
        }

        // $marketSlime = new market_slime();

        // $marketSlime->name = $request->s0;
        // $marketSlime->name = $request->s1;
        // $marketSlime->name = $request->s2;
        // $marketSlime->name = $request->s3;
        // $marketSlime->name = $request->s4;

        // $writer = requestValue("writer");
        // $content = requestValue("content");
         // 마지막으로 $board->save(); 하면 insert됨

         /*여기서 save()*/
    //         okGo("글이 등록되었습니다 ! ","$nowBoard.php");
            return redirect('/view/'.$board->num)->with('message',"글이 정상적으로 등록되었습니다 ! ");
    //     }else{ // 모든 항목이 채워지지 않았을 경우
    //         errorBack("모든 항목이 빈칸 없이 입력 되어야 합니다 ! ");
    //     }

    }

    public function comment(Request $request, $num){
        $comment = new comment();
        

        $comment->board_id = $num;
        $comment->c_writer = \Auth::user()['name'];
        $comment->c_content = $request->c_content;

        $comment->save();

        return redirect('/view/'.$num)->with('message',"댓글이 정상적으로 등록되었습니다 ! ");
    }

    // 해당 게시글 보기
     public function view($num){
        $board = board::where('num', $num)->first();
        $comments = comment::all()->where('board_id',$num);

        return view('view')->with('board',$board)->with('comments',$comments);
    }

    // 관리자 페이지 회원 정보 보기
     public function adminPage(){
        $tasks = Task::all();
        $users = user::all();

        return view('adminPage')->with('users',$users)->with('tasks',$tasks);;
    }


    // 수정 폼
    public function modify_form($num){
        $board = board::where('num', $num)->first();

        return view('modify_form')->with('board', $board);
    }


    // 글 수정
    public function modify(Request $request){
        $board = board::where('num', $request->num)->first();

        $board->title = $request->title; /*$_REQUEST['title'] == $request->title*/
        $board->writer = $request->writer;
        $board->content = $request->content;
        // $writer = requestValue("writer");
        // $content = requestValue("content");
        // 마지막으로 $board->save(); 하면 insert됨

        $board->save(); /*여기서 save()*/

//         okGo("글이 등록되었습니다 ! ","$nowBoard.php");
        return redirect('/view/'.$board->num)->with('message',"글이 정상적으로 수정되었습니다 ! ");
//     }else{ // 모든 항목이 채워지지 않았을 경우
//         errorBack("모든 항목이 빈칸 없이 입력 되어야 합니다 ! ");
//     }
    }



    // 회원 정보 수정
    public function update_form($id){
        $user = user::where('id', $id)->first();

        return view('header')->with('user', $user);
    }

    public function update(Request $request){
        $user = user::where('id',$id)->first();

        $user->name = $request->name;
        $user->password = $request->password;

        $user->save();

        return redirect('/community')->with('message',"회원 정보가 정상적으로 수정되었습니다 ! ");
    }


    public function destroy($num){
        $board = board::where('num',$num)->delete();

        return redirect('/board/'.$board->category)->with('message',"게시글이 삭제되었습니다 ! ");
    }



}
