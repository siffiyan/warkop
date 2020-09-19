<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Murid;

class ProfilController extends Controller
{

    public function index()
    {
        $data['siswa'] = Murid::where('id', session()->get('id'))->firstOrFail();

        return view('siswa.profil.index',$data);
    }

    public function update_profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'nama' => 'required',
        'username' => 'required',
        'email' => 'required',
        'no_hp' => 'required',
        'alamat' => 'required',
        'tanggal_lahir' => 'required',
        ]);
        
        if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput();
        }

        $murid = Murid::findOrFail(session()->get('id'));
        $murid->nama = $request->nama;
        $murid->username = $request->username;
        $murid->email = $request->email;
        $murid->no_hp = $request->no_hp;
        $murid->alamat = $request->alamat;
        $murid->tanggal_lahir = $request->tanggal_lahir;
        $murid->save();

        return redirect()->back()->with('msg','Data Profile Murid berhasil di update');
        
    }

}