<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => hash::make($data['password']),
        ]);
    }

    public function register(Request $request){
        $this->validator($request->all())->validate();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'confirm_code' => str_random(60),
        ]);

        // 메일 전송        
        \Mail::send('auth.email.confirm', compact('user') , function($message) use($user) {
            $message->to($user->email);
            $message->subject("SmileSlime 회원가입 확인");
        });

        return redirect(route('community'))->with('message', '이메일 인증 메일을 발송하였습니다 ! 이메일을 확인하여 가입 절차를 완료해주세요 ! ');
    }

    // 인증 매소드
    public function confirm($code) {
        $user = User::where('confirm_code', $code)->first();
        
        // confirm_code 를 부여받지 않은 회원인 경우
        if(!$user) {
            return redirect(route('community'))->with('message', '이메일 인증 절차를 거치지 않았습니다 ! ');
        }

        /*
            activated = 1
            confirm_code = null

            인 경우 인증을 받은 회원이다. 해당 회원의 정보를 save
        */
        $user->activated = true;
        $user->confirm_code = null;
        $user->save();

        // login 실행
        \Auth::login($user);
        return redirect(route('community'));
    }
}
