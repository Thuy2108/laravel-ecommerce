<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class StudInsertController extends Controller
{
    public function list(){
        $users = DB::select('select * from user');
        return view('stud_view',['users'=>$users]);
    }
}
