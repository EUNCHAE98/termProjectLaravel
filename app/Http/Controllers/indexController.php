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

    // community
    public function community(){
        return view('community');
    }

    // about 
    public function about(){
        $tasks = Task::all();
        return view('about')->with('tasks',$tasks);
    }
    
    // adminPage
     public function adminPage(){
        $tasks = Task::all();
        $users = user::all();

        return view('adminPage')->with('users',$users)->with('tasks',$tasks);;
    }

    // adminPage 중 userDelete
    public function userDelete(Request $request){

        for($i=0; $i<count($request['users']); $i++){
            user::where('id', $request['users'][$i])->delete();
        }

        return redirect('/adminPage');
    }

    // adminPage 중 해당 user 작성글 보기
    public function goToUserBoard($name){
        $user = user::where('name',$name)->value('name');
        $userBoards = board::where('writer',$user)->paginate(6);

        return view('/goToUserBoard')->with('userBoards',$userBoards);
    }

    // 회원 정보 update_form
    public function update_form($id){
        $user = user::where('id', $id)->first();

        return view('header')->with('user', $user);
    }

    // 회원 정보 update
    public function update(Request $request){
        $user = user::where('id',$id)->first();

        $user->name = $request->name;
        $user->password = $request->password;

        $user->save();

        return redirect('/community')->with('message',"회원 정보가 정상적으로 수정되었습니다 ! ");
    }
}
