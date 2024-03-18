<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PasswordResetToken;
use App\Mail\ForgotPassword;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function login(){
       
       return view('admin.login');
    }

    public function check_login(Request $req){
        $req->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
            
        ]);

        $data = $req->only('email', 'password');
        $check = auth()->attempt($data);
        if($check) {
            return redirect()->route('admin.index')->with('yes', 'Đăng nhập thành công');
        }
        return redirect()->back()->with('no', 'Tài khoản hoặc mật khẩu không đúng');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('admin.login')->with('no', 'Đăng xuất thành công');
    }

   
    // public function check_forgot_password(Request $req){
    //     $req->validate([
    //         'email' => 'required|email|exists:users',
    //     ]);
    //     $user = User::where('email', $req->email)->first();
    //     $token = \Str::random(40);

    //     $tokenData = [
    //         'email' => $req->email,
    //         'token' => $token
    //     ];
    //     if(PasswordResetToken::create($tokenData)) {
    //         Mail::to()->send(new ForgotPassword($user, $token));
    //         return redirect()->back()->with('yes', 'Kiểm tra lại email để tiếp tục');
    //     }

    //     return redirect()->back()->with('no', 'Kiểm tra lại email');
    // }
    // public function register(){
    //     return view('admin.register');
    // }

    // public function check_register(){
    //     request()->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required',
    //         'confirm_password' => 'required|same:password',
    //     ]);

    //     $data = request()->all('email', 'name');
    //     $data['password'] = bcrypt(request('password'));
    //     User::create($data);
    //     return redirect()->route('admin.login');
    // }
}
