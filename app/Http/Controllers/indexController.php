<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\board;
use App\User;
use App\Comment;
use App\Task;
use App\Buy;
use App\market_slime;

class indexController extends Controller
{
    public function main(){
        return view('index');
    }

    // community
    public function community(){

        if(!\Auth::check()){
            return view('community')->with('buys');
        }
        
        $user = \Auth::user()['name'];
        $board = Board::where('writer', $user)->where('category', 'market')->get();

        if($board!='[]'){
            for($i=0; $i<count($board); $i++){
                $buys[$i] = Board::find($board[$i]->num)->buys->where('status', 0);
            }
            return view('community')->with('buys',$buys);
        }else{
            return view('community')->with('buys',0);
        }

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

        $user = \Auth::user()['name'];
        $board = Board::where('writer', $user)->where('category', 'market')->get();

        if($board!='[]'){
            for($i=0; $i<count($board); $i++){
                $buys[$i] = Board::find($board[$i]->num)->buys->where('status', 0);
            }
            return view('adminPage')->with('buys',$buys)->with('users',$users)->with('tasks',$tasks);
        }else{
            return view('adminPage')->with('buys',0)->with('users',$users)->with('tasks',$tasks);
        }
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
        $users = user::where('name',$name)->value('name');
        $userBoards = board::where('writer',$users)->paginate(6);

        $user = \Auth::user()['name'];
        $board = Board::where('writer', $user)->where('category', 'market')->get();

        if($board!='[]'){
            for($i=0; $i<count($board); $i++){
                $buys[$i] = Board::find($board[$i]->num)->buys->where('status', 0);
            }
            return view('/goToUserBoard')->with('userBoards',$userBoards)->with('buys',$buys);
        }else{
            return view('/goToUserBoard')->with('userBoards',$userBoards)->with('buys',0);
        }
    }

    // 회원 정보 update_form
    public function update_form($id){
        $user = user::where('id', $id)->first();

        return view('header')->with('user', $user);
    }

    // 회원 정보 update
    public function update(Request $request, $id){
        $user = user::where('id',$id)->first();

        $user->name = $request->Uname;
        $user->password = $request->Upassword;

        $user->save();

        return redirect('/community')->with('message',"회원 정보가 정상적으로 수정되었습니다 ! ");
    }
}
