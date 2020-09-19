<?php

namespace App\Http\Controllers\Siswa;

use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Murid;
use Illuminate\Support\Facades\Validator;

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

				if($data->verified==0){
					$callback['status'] = 'error';
					$callback['message'] = 'anda belum melakukan konfirmasi email';
					return response()->json($callback);
				}

				else{

				Session::put('email',$data->email);
				Session::put('nama',$data->nama);
				Session::put('id',$data->id);
				Session::put('role','siswa');
                Session::put('login',TRUE);

                $callback['status'] = 'success';
				$callback['message'] = 'berhasil login';
				return response()->json($callback);

				}

			}

			else{

				$callback['status'] = 'error';
				$callback['message'] = 'email / password anda salah';
				return response()->json($callback);

			}


		}

		else{

			$callback['status'] = 'error';
			$callback['message'] = 'email / password anda salah';
			return response()->json($callback);

		}

	}

	public function logout(Request $request){

		$request->session()->forget('email');
		$request->session()->forget('nama');
		$request->session()->forget('id');
        $request->session()->forget('login');
        $request->session()->forget('login');
        $request->session()->flush();
        
	    return redirect('/siswa/login')->with('success','Anda berhasil logout !');

	}

	public function register(){

		return view('siswa.auth.register');

	}

	public function register_action(Request $request){

		 $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
		    'confirm_password' =>'required|same:password'
        ]);

		if ($validator->fails()) {
			$callback['status'] = 'error';
			$callback['message'] = $validator->errors()->all();
			return response()->json($callback);
		}

		$data = $request->except('confirm_password');
		$data['password'] = Hash::make($request->password);
		Murid::create($data);

		try{

			$token = base64_encode(random_bytes(32));
		
			DB::table('murid_token')->insert([
			    'email'=>$request->email,
			    'token'=>$token
			]);
			
			$url = "http://localhost:8000/siswa/verify?email=". $request->email . "&token=" .urlencode($token);

			Mail::send('siswa.auth.email', ['nama' => $request->nama,'email'=>$request->email,'url'=>$url], function ($message) use ($request){

            $message->subject("[Cariguru] Informasi Akun Mitra Cariguru");
            $message->from('cs.cariguru@gmail.com', 'Cariguru');
            $message->to($request->email);

            });

			$callback['status'] = 'success';
			$callback['message'] = 'Selamat anda berhasil mendaftar, silahkan cek email anda untuk melakukan verifikasi';
			return response()->json($callback);

		}

		catch (Exception $e){

			$callback['status'] = 'error';
			$callback['message'] = $validator->errors()->all();
			return response()->json($callback);

		}

	}

	public function verify(){
	    
	    $email = $_GET['email'];
	    $token = $_GET['token'];
	    
	    $user = DB::table('murid')->where(['email'=>$email])->first();
	    
	    if($user){
	       
	    $user_token = DB::table('murid_token')->where('token',$token)->first();
	    
	        if($user_token){
	            
	            DB::table('murid')->where('email',$email)->update(['verified'=>1]);
	            
	            DB::table('murid_token')->where('email',$email)->delete();
	            
	            return redirect('/siswa/login')->with('success','Selamat anda berhasil verifikasi, silahkan login');
	        }
	        
	        else{
	            return "account activated is failed , token invalid";
	        }
	       
	    }
	    
	    else{
	        return "account activated is failed , wrong email";
	    }
	    
	}

}