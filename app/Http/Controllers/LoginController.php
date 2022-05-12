<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterAcountRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //show form dang nhap
    public function showLoginForm(){
        return view('todos.login');
    }

    //xu li check dang nhap 
    public function processLogin(LoginRequest $request)
    {
        $data = [
            'name' => $request->name,
            'password' => $request->password,
        ];

        if(Auth::attempt($data) && Auth::user()->level == '1'){
            return redirect(route('admin.index'));
            
        }else if(Auth::attempt($data) && Auth::user()->level == '0')
        {
            return redirect(route('todos.index'));
            
        }else{
            //can not login
            return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
        }

    }

    //hien thi form dang ki
    public function showRegisterForm()
    {
        return view('todos.register');

    }

    //xu li dang ki
    public function processRegister(RegisterAcountRequest $request){
        //create User and set data
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->level = 0;
        $user->password = bcrypt($request->input('password'));
        //save user
        $user->save();
        return redirect()->route('login')->with('success', 'Đăng ký tài khoản thành công');
    }
    //xu li logout
    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
