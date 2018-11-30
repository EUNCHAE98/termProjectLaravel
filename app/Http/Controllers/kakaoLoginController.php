<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\User;

class kakaoLoginController extends Controller
{
    public function index(){
    	return view('kakaoLogin');
    }
    public function redirectToProvider(){
    	return Socialite::with('kakao')->redirect();
    }

    // 로그인 할 때 실행되는 매소드
    public function handleProviderCallback(){
    	$kaUser = Socialite::with('kakao')->user();

    	$token = $kaUser->token;    	
    	$id = $kaUser->getId();
    	$nickName = $kaUser->getNickName();
    	$avatar = $kaUser->getAvatar();

    	if(!User::where('email', $id)->exists()){
    		User::create([
    			'email' => $id,
    			'password' => Hash::make($token),
    			'name' => $nickName,
    		]);
    	}else{
    		User::where('email', "$id")
    		->update(['password' => Hash::make($token)]);
    	}	

    	if(Auth::attempt(['email' => $id,
    					  'password' => $token]));
    	{
    		return redirect('/community');
    	}


    	return response()->json($kaUser, 200, [], JSON_PRETTY_PRINT);
    }


}
