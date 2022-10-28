<?php

namespace App\Http\Controllers;

use App\Mail\userVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class userController extends Controller
{
    public function show_register(){
        return view('user.register');
    }
    public function register(){
        $this->validate(\request(),[
            'name'=>'required|min:4|unique:users,name|alpha_dash',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|alpha_dash|confirmed',
        ]);
       $user= User::create([
            'name'=>\request('name'),
            'email'=>\request('email'),
            'password'=>bcrypt(\request('password')),
        ]);
       $code=sha1(rand(1000,8000));
       $user->userVerify()->create([
           'code'=> $code
       ]);
       $generateurl=route('verifyUser',[$user->email,$code]);
       Mail::to($user->email)->send(new userVerification($generateurl));
        return  'successful';

    }
    public function verifyUser($email,$code)
    {
        $user=User::where('email',$email)->first();
        if ($user){
            $userCode =$user->userVerify->code;
            if ($userCode==$code){
                $user->update([
                    'email_verified'=>'yes'
                ]);
                $user->userVerify->delete();
                return 'user verified';
            }else{
                return 'unauthorized email';
            }
        }else{
            return 'unauthorized!';
        }
    }
}
