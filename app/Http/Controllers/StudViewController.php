<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudViewController extends Controller
{
    public function index(){
        return "Controller!!";
    }
    public function login(){
        return view('login');
    }
    public function act_login(Request $request){
        $name= $request->input('name');
        $pass=$request->input('pswd');
        $result=DB::table('user')->where('name', $name)->where('password',$pass)->get();
        if(isset($result))
            return $result;
        else
            return $result;
    }
}
