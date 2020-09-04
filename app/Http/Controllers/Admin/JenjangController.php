<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Jenjang;

class JenjangController extends Controller
{
    public function index()
    {	
    	$data['jenjang'] = Jenjang::all();
        return view('admin.pembelajaran.jenjang.index',$data);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'jenjang' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $insert = Jenjang::create($request->all());
        if($insert){
            return redirect()->back()->with('msg','data Jenjang berhasil ditambahkan');
        }else{
            return 'gagal';
        }
    }

    public function destroy(Request $request){

        Jenjang::destroy($request->id);

        return redirect()->back()->with('msg','data Jenjang berhasil hapus');
    }

    public function edit($id)
    {
        $data = Jenjang::find($id);
        echo json_encode($data);
    }

    public function update(Request $request)
    {
        $id= $request->id;

        $validator = Validator::make($request->all(), [
            'jenjang' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(); 
        }

        $jenjang = Jenjang::findOrFail($id);
        $jenjang->jenjang = $request->jenjang;
        $jenjang->update();

        return redirect()->back()->with('msg','data Jenjang berhasil diedit');

    }
}
