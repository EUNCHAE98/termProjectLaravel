<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/community';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $user = User::where('email', $request->email)->first();

        if(!$user){
            return redirect(route('community'))->with('message', '존재하지 않는 회원입니다 ! ');
        }

        if($user->activated == false){


            \Mail::send('auth.email.confirm', compact('user') , function($message) use($user) {
                $message->to($user->first()->email);
                $message->subject("SmileSlime 회원가입 확인");
            });
            return redirect(route('community'))->with('message', '이메일 인증 절차를 거치지 않은 회원입니다 ! 이메일을 발송하였으니 가입을 완료해주세요 ! ');
        }

        $credentials = $request->only('email', 'password');
            if(\Auth::attempt($credentials)) {
                return redirect('community');
            }
    }

}
