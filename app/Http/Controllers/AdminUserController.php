<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function index(){
        return view('admin.login');
    }
    public function store(Request $request){
        //validate login data
        $this->validate($request,[
            'email'=> 'required|email',
            'password'=>'required'
            ]);
        $credentials = $request->only('email','password');
        if(! Auth::guard('admin')->attempt($credentials)){
            return back()->withErrors([
                'message' => 'Wrong Email Or Password Please Tr Again '
            ]);
        }else{
            session()->flash('msg','You have been logged in');
            return redirect('admin/');
        }
    }
    public function logout(){
        auth()->guard('admin')->logout();
        session()->flash('msg','You have been logout successfully');
        return redirect('admin/login');
    }
}
