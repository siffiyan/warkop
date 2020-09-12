<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;

class AuthController extends Controller
{

	public function login(){
		return view('admin.auth.login');
	}

	public function login_action(Request $request){

		$email= $request->email;
		$password = $request->password;

		$data = Admin::where('email',$email)->first();

		if($data){

			if(Hash::check($password,$data->password)){

				Session::put('email',$data->email);
				Session::put('id',$data->id);
				Session::put('nama',$data->nama);
                Session::put('login',TRUE);
                Session::put('role','admin');

               return redirect('/admin/dashboard');

			}

			else{

				return redirect('/admin/login')->with('error','email / password anda salah');

			}


		}

		else{

			return redirect('/admin/login')->with('error','email / password anda salah');

		}

	}

	public function logout(Request $request){

		$request->session()->forget('email');
		$request->session()->forget('id');
		$request->session()->forget('nama');
        $request->session()->forget('login');
         $request->session()->forget('role');
        $request->session()->flush();
        
	    return redirect('/admin/login')->with('success','Anda berhasil logout !');

	}

}