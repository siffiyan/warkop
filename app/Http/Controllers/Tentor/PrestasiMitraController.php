<?php

namespace App\Http\Controllers\Tentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Murid;
use App\Models\Mitra;
use App\Models\Admin;
use App\Models\PengalamanMengajarMitra;
use App\Models\PrestasiMitra;

class PrestasiMitraController extends Controller
{

    public function store(Request $request){

    	$data = $request->all();
    	$data['mitra_id'] = session('id');
    	PrestasiMitra::create($data);

    	return redirect('/tentor/profil')->with('msg','Prestasi berhasil ditambahkan');

    }

    public function edit($id){

    	$data['prestasi'] = PrestasiMitra::find($id);
    	$data['tahun'] = range(2020, 1960);

    	return response()->json($data);

    }

    public function update(Request $request){


    	$id = $request->id_prestasi;
    	$data = PrestasiMitra::find($id);
    	$data->update($request->except('id_prestasi'));

    	return redirect('/tentor/profil')->with('msg','Prestasi berhasil diedit');

    }

     public function destroy(Request $request){

        $id = $request->id_prestasi;
        PrestasiMitra::destroy($id);

        return redirect('/tentor/profil')->with('msg','Prestasi berhasil dihapus');

    }

}