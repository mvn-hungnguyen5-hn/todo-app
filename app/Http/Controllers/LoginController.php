<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //show form dang nhap
    public function showLoginForm(){
        return view('todos.login');
    }

    //xu li check dang nhap 
    public function processLogin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

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
            return redirect()->back();
        }

    }

    //hien thi form dang ki
    public function showRegisterForm()
    {
        return view('todos.register');

    }

    //xu li dang ki
    public function processRegister(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
    
        //create User and fill data
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect()->route('login');
    }
    //xu li logout
    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
