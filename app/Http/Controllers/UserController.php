<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    // ==== PHẦN QUẢN LÝ NGƯỜI DÙNG ====
    public function insert_form(){
        return view('admin/user_insert_form');
    }

    public function action_insert(Request $request){
        $name = $request->input('username'); 
        $password = $request->input('password'); 
        $fullname = $request->input('fullname'); 
        $address = $request->input('address'); 
        $result=['user_username'=>$name,
                    'user_password'=>$password,
                    'user_fullname'=>$fullname,
                    'user_address'=>$address];
        Users::insert($result);
        return redirect()->to('admin/danh-sach-nguoi-dung');
    }

    public function action_update(Request $request){
        $name = $request->input('username'); 
        $id = $request->input('id'); 
        $fullname = $request->input('fullname'); 
        $address = $request->input('address'); 
        $result=['user_username'=>$name,
                    'user_fullname'=>$fullname,
                    'user_address'=>$address];
        Users::where('user_id',$id)->update($result);
        return redirect()->to('admin/danh-sach-nguoi-dung');
    }

    public function get_all(){
        $users = Users::all();
        return view('admin/user_list',['users'=>$users]);
    }

    public function del($id){
        Users::where('user_id',$id)->delete();
        return redirect()->to('admin/danh-sach-nguoi-dung');
    }

    public function show($id){
        $users = Users::where('user_id',$id)->get();
        return view('admin/user_info_form',['users'=>$users]);
    }

    // ==== PHẦN LOGIN / LOGOUT ====
    public function showLoginForm() {
        return view('login'); // Hiển thị form login
    }

    public function action_login(Request $request) {
        $request->validate([
            'name' => 'required',
            'pswd' => 'required',
        ]);

        $name = $request->input('name');
        $pswd = $request->input('pswd');

        $user = Users::where('user_username', $name)->first();

        if ($user && $user->user_password === $pswd) { // So sánh plain text, nếu dùng hash thì phải dùng Hash::check
            session([
                'user_role' => $name === 'admin' ? 'admin' : 'user',
                'user_name' => $user->user_fullname
            ]);

            return $name === 'admin' 
                ? redirect()->to('admin/danh-sach-nguoi-dung') 
                : redirect()->route('home');
        }

        return redirect()->route('login')->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng!');
    }

    public function logout() {
        session()->forget(['user_role', 'user_name']);
        return redirect()->route('login');
    }
}
