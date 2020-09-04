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

class ShareProfitController extends Controller
{

	public function index(){

		$data['profit'] = ShareProfit::find(1);
		return view('admin.setting.share_profit.index',$data);

	}

	public function update(Request $request,$id){

		if($request->owner + $request->mitra != 100){
			return redirect('/admin/setting/share_profit')->with('err','penjumlahan presentase antara owner dan mita harus = 100');
		}

		$data = ShareProfit::findOrFail($id);
		$data->update($request->all());

		return redirect('/admin/setting/share_profit')->with('msg','settingan profit berhasil di update');

	}

}