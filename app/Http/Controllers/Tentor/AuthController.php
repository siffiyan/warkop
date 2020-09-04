<?php

namespace App\Http\Controllers\Tentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Mitra;

class AuthController extends Controller
{

	public function login(){
		return view('tentor.auth.login');
	}

	public function login_action(Request $request){

		$email= $request->email;
		$password = $request->password;

		$data = Mitra::where('email',$email)->first();

		if($data){

			if(Hash::check($password,$data->password)){

				Session::put('email',$data->email);
				Session::put('id',$data->id);
				Session::put('nama',$data->nama);
                Session::put('login',TRUE);

               return redirect('/tentor/dashboard');

			}

			else{

				return redirect('/tentor/login')->with('error','email / password anda salah');

			}


		}

		else{

			return redirect('/tentor/login')->with('error','email / password anda salah');

		}

	}

	public function logout(Request $request){

		$request->session()->forget('email');
		$request->session()->forget('id');
		$request->session()->forget('nama');
        $request->session()->forget('login');
        $request->session()->flush();
        
	    return redirect('/tentor/login')->with('success','Anda berhasil logout !');

	}

	public function ubah_password(){

		return view('tentor.auth.ubah_password');

	}

	public function ubah_password_action(Request $request){

		$this->validate($request,[
           'password_lama' => 'required',
		   'password_baru' =>'required|min:6|same:password_konfirmasi',
		   'password_konfirmasi' =>'required'
        ]);

		// cek apakah password lamanya benar
		$data = Mitra::find(session('id'));

		if(Hash::check($request->password_lama,$data->password)){
			$data->password = Hash::make($request->password_baru);
			$data->save();
			return redirect('/tentor/ubah_password')->with('success','Password berhasil diubah');
		 }

		 else{
		 	return redirect('/tentor/ubah_password')->with('error','Password lama anda salah');
		 }		
        

	}

}