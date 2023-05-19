<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function LoginProses(){
		
        if (auth()->guard('pegawai')->attempt(['email' => request('email'), 'password' => request('password')])){
            return redirect('pegawai/dashboard');
        }

        if (auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')])){
            return redirect('admin/dashboard');
        }

		return redirect('login');
	}

    public function logout(Request $request){
		auth()->logout();
		$request->session()->invalidate();
		return redirect('login');
	}
}
