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
use Illuminate\Support\Facades\DB;

class BiayaLesController extends Controller
{

	public function index(){

		$data['jenjang'] = Jenjang::all();
		$data['kurikulum'] = Kurikulum::all();
		$data['biaya'] = DB::table('biaya_les')
			            ->join('jenjang', 'biaya_les.jenjang_id', '=', 'jenjang.id')
			            ->join('kurikulum', 'biaya_les.kurikulum_id', '=', 'kurikulum.id')
			            ->select('biaya_les.*', 'kurikulum.kurikulum', 'jenjang.jenjang')
			            ->get();
		return view('admin.setting.biaya_les.index',$data);

	}

	public function store(Request $request){

		BiayaLes::create($request->all());
		return redirect('/admin/setting/biaya_les')->with('msg','biaya les berhasil ditambahkan');

	}

	public function edit($id){
		$data['biaya_les'] = DB::table('biaya_les')
	            ->join('jenjang', 'biaya_les.jenjang_id', '=', 'jenjang.id')
	            ->join('kurikulum', 'biaya_les.kurikulum_id', '=', 'kurikulum.id')
	            ->select('biaya_les.*', 'kurikulum.kurikulum', 'jenjang.jenjang')
	            ->where('biaya_les.id',$id)
	            ->first();
	    $data['jenjang'] = Jenjang::all();
		$data['kurikulum'] = Kurikulum::all();
	    return response()->json($data);
	}

	public function update(Request $request){

		$id = $request->id;
		$data = BiayaLes::findOrFail($id);
		$data->update($request->all());
		return redirect('/admin/setting/biaya_les')->with('msg','biaya les berhasil di edit');

	}

	public function destroy(Request $request){

		BiayaLes::destroy($request->id);
		return redirect('/admin/setting/biaya_les')->with('msg','biaya les berhasil di hapus');

	}

}