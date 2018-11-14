<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\board;

class indexController extends Controller
{
    public function main(){
        return view('index');
    }

    public function community(){
        return view('community');
    }

    public function about(){
    	return view('about');
    }

    public function write_form($category){
        return view('write_form')->with('category', $category);
    }

    public function write_formMarket(){
        return view('write_formMarket');
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


    public function Board($category){
    	$boards = board::all()->where('category', $category);
        
        return view($category.'Board')
        ->with('boards', $boards);
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
         /*=>*/ $board = new board(); //boards 테이블을 생성해서 담음

        // $title = requestValue("title");
         /*=> form태그에서 action으로 이 메서드로 데이터를 전송하면 매개변수 Request $request로 받아 온다*/
        $board->title = $request->title; /*$_REQUEST['title'] == $request->title*/
        $board->writer = $request->writer;
        $board->content = $request->content;
        $board->category = $request->category;
        // $writer = requestValue("writer");
        // $content = requestValue("content");
         // 마지막으로 $board->save(); 하면 insert됨

        $board->save(); /*여기서 save()*/
    //         okGo("글이 등록되었습니다 ! ","$nowBoard.php");
            return redirect('/view/'.$board->num)->with('message',"글이 정상적으로 등록되었습니다 ! ");
    //     }else{ // 모든 항목이 채워지지 않았을 경우
    //         errorBack("모든 항목이 빈칸 없이 입력 되어야 합니다 ! ");
    //     }



    }

    // 해당 게시글 보기
     public function view($num){
        $board = board::where('num', $num)->first();

        return view('view')->with('board',$board);
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
