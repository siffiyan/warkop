<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Murid;
use App\Models\Mitra;
use App\Models\Admin;

class ManajemenUserController extends Controller
{

    public function index()
    {	

    	$data['murid'] = Murid::all();
    	$data['mitra'] = Mitra::all();
    	$data['admin'] = Admin::all();
        return view('admin.manajemen_user.index',$data);
    }

    public function destroy(Request $request){

    	$id = $request->id;

    	$admin = Admin::findOrFail($id);
    	$admin->delete();

    	return redirect('/admin/manajemen_user')->with('msg','data berhasil dihapus');

    }

    public function edit($id){

    	$data = Admin::find($id);
    	echo json_encode($data);	
    }

     public function update(Request $request){

        $id = $request->id;

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|unique:admin,email,'.$id,
            ]);

            if ($validator->fails()) {
                return redirect('/admin/manajemen_user')
                            ->withErrors($validator)
                            ->withInput();
        }

    	$admin = Admin::findOrFail($id);
    	$admin->nama = $request->nama;
    	$admin->email = $request->email;
    	$admin->update();

    	return redirect('/admin/manajemen_user')->with('msg','data berhasil di edit');

    }

    public function store(Request $request){

        if($request->role == 'admin'){

            $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|unique:admin,email',
            'password'=> 'required'
            ]);

            if ($validator->fails()) {
                return redirect('/admin/manajemen_user')
                            ->withErrors($validator)
                            ->withInput();
            }

            $data = $request->except('role');
            $data['password'] = Hash::make($request->password);
            Admin::create($data);

            return redirect('/admin/manajemen_user')->with('msg','data admin berhasil ditambahkan');

        }

        else{

            $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|unique:mitra,email'
            ]);

            if ($validator->fails()) {
                return redirect('/admin/manajemen_user')
                            ->withErrors($validator)
                            ->withInput();
            }

            $data = $request->except('role');
            $data['password'] = Hash::make('mitracariguru');
            Mitra::create($data);

            return redirect('/admin/manajemen_user')->with('msg','data mitra berhasil ditambahkan');

        }

    }

}