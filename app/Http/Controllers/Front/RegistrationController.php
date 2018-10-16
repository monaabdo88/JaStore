<?php

namespace App\Http\Controllers\Front;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    public function index(){
        return view('front.registration.index');
    }
    public function store(Request $request){
        //validate data
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
            'address'=>'required'
        ]);
        //save the data
        $user = User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'address'=>$request->address
        ]);
        // singin user
        auth()->login($user);
        //redirect link
        return redirect('/user/profile');
    }
    public function profile(){
        return "Hello from the other side";
    }
}
