<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Murid;

class AuthController extends Controller
{

	public function login(){
		return view('siswa.auth.login');
	}

	public function login_action(Request $request){

		$email= $request->email;
		$password = $request->password;

		$data = Murid::where('email',$email)->first();

		if($data){

			if(Hash::check($password,$data->password)){

				Session::put('email',$data->email);
				Session::put('nama',$data->nama);
				Session::put('id',$data->id);
                Session::put('login',TRUE);

               return redirect('/siswa/dashboard');

			}

			else{

				return redirect('/siswa/login')->with('error','email / password anda salah');

			}


		}

		else{

			return redirect('/siswa/login')->with('error','email / password anda salah');

		}

	}

	public function logout(Request $request){

		$request->session()->forget('email');
		$request->session()->forget('nama');
		$request->session()->forget('id');
        $request->session()->forget('login');
        $request->session()->flush();
        
	    return redirect('/siswa/login')->with('success','Anda berhasil logout !');

	}

	public function register(){

		return view('siswa.auth.register');

	}

	public function register_action(Request $request){

		$this->validate($request,[
           'password' => 'required|min:6',
		   'confirm_password' =>'required|same:password'
        ]);

		$data = $request->except('confirm_password');
		$data['password'] = Hash::make($request->password);
		Murid::create($data);
		return redirect('/siswa/login')->with('success','Anda berhasil register silahlan login');

	}

}