<?php

namespace App\Http\Controllers\Tentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PengalamanMengajarMitra;

class PengalamanMengajarMitraController extends Controller
{

	public function store(Request $request){

    	$data = $request->all();
    	$data['mitra_id'] = session('id');
    	PengalamanMengajarMitra::create($data);

    	return redirect('/tentor/profil')->with('msg','Pengalaman mengajar berhasil ditambahkan');

    }

    public function edit(Request $request,$id){

    	$data['pengalaman'] = PengalamanMengajarMitra::find($id);
    	$data['tahun_awal'] = range(2020, 1960);
    	$hasil = $data['tahun_awal'];
    	array_unshift($hasil, "Sampai Sekarang");
    	$data['tahun_akhir'] = $hasil;
    	return response()->json($data);

    }

    public function update(Request $request){


    	$id = $request->id_pengalaman;
    	$data = PengalamanMengajarMitra::find($id);
    	$data->update($request->except('id_pengalaman'));

    	return redirect('/tentor/profil')->with('msg','Pengalaman mengajar berhasil diedit');

    }

    public function destroy(Request $request){

        $id = $request->id_pengalaman;
        PengalamanMengajarMitra::destroy($id);

        return redirect('/tentor/profil')->with('msg','Pengalaman mengajar berhasil dihapus');

    }

}