<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('LogOut');
    }
    
    public function halamanLogin(){
         return view('pages.auth.login');
     }

    // public function showLoginForm()
    // {
    //     return view('pages.auth.login');
    // }

    public function Login(Request $request){
       // dd($request->all());
       
        if (Auth::attempt($request->only('name','email','password'))){
            return redirect('/dashboard');
        }
        return redirect('/')->with('message','login gagal! NIK dan Nama tidak di temukan');
    }

    public function LogOut(){
       Auth::logout();
        return redirect('/');
    }

    public function halamanRegister(){
        return view('pages.register');
    }
    public function simpanRegister(Request $request){

              $request->validate([
           'nik'=>'required|unique:users,email',
           'nama'=>'required'
       ],
       [
           'nik.unique'=>'NIK tidak valid',
           'nama.required'=>'nama tidak boleh kosong'
       ]
    );
   // dd($request->all());
        $data=[
            'name'=>$request->nama,
            'email'=>$request->nik,
            'password'=>bcrypt($request->nik)
        ];

        User::create($data);
        return redirect('/register')->with('message',"Registrasi berhasil");
     }
}

