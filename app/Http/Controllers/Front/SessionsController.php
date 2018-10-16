<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view('front.sessions.index');
    }
    public function store(Request $request){
        $this->validate($request,[
        'email'=> 'required|email',
        'password' => 'required'
        ]);
        $data = request(['email','password']);
        if(! auth()->attempt($data)){
            return back()->withErrors([
                'message' => 'Wrong Email Or Password Please Try again'
            ]);
        }
        return redirect('/user/profile');

    }
    public function logout(){
        auth()->logout();
        session()->flash('msg','You have been logout successfully');
        return redirect('/user/login');
    }
}
