<?php

namespace App\Http\Controllers\Tentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mapel;
use App\Models\Jenjang;
use App\Models\Kurikulum;
use App\Models\PilihanMengajarMitra;

class PilihanMengajarMitraController extends Controller
{

    public function store(Request $request){

    	$data = $request->all();
    	$data['mitra_id'] = session('id');
    	PilihanMengajarMitra::create($data);

    	return redirect('/tentor/profil')->with('msg','Pilihan Mengajar berhasil ditambahkan');

    }

    public function edit($id){

    	$data['jenjang'] = Jenjang::all();
        $data['kurikulum'] = Kurikulum::all();
        $data['mapel'] = Mapel::all();
        $data['pilihan'] = PilihanMengajarMitra::find($id);

        return response()->json($data);

    }

     public function update(Request $request){


    	$id = $request->id_pilihan_mengajar;
    	$data = PilihanMengajarMitra::find($id);
    	$data->update($request->except('id_pilihan_mengajar'));

    	return redirect('/tentor/profil')->with('msg','Pilihan mengajar berhasil diedit');

    }

    public function destroy(Request $request){

        $id = $request->id_pilihan_mengajar;
        PilihanMengajarMitra::destroy($id);

        return redirect('/tentor/profil')->with('msg','Pilihan Mengajar berhasil dihapus');

    }

}