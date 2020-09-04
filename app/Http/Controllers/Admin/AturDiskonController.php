<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShareProfit;
use App\Models\KodePromo;
use App\Models\Diskon;
use App\Models\Jenjang;
use App\Models\Kurikulum;
use App\Models\BiayaLes;

class AturDiskonController extends Controller
{

	public function index(){

		$data['diskon'] = Diskon::all();
		return view('admin.setting.diskon.index',$data);

	}

	public function store(Request $request){

		Diskon::create($request->all());
		return redirect('/admin/setting/atur_diskon')->with('msg','kode promo berhasil di tambahkan');
	}

	public function edit($id){

		$data = Diskon::findOrFail($id);
		return response()->json($data);

	}

	public function update(Request $request){

		$id = $request->id;

		$data = Diskon::findOrFail($id);
		$data->update($request->all());

		return redirect('/admin/setting/atur_diskon')->with('msg','kode promo berhasil di edit');

	}

	public function destroy(Request $request){

		$id = $request->id;
		$data = Diskon::findOrFail($id);
		$data->delete();

		return redirect('/admin/setting/atur_diskon')->with('msg','kode promo berhasil di hapus');

	}
}