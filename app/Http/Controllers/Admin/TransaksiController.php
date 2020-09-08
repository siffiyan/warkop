<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class TransaksiController extends Controller
{
    public function index()
    {	
    	$data['transaksi'] = DB::table('transaksi')->get();
    	$data['menunggu_pembayaran'] = DB::table('transaksi as t')
    								  ->join('murid as m','t.murid_id','m.id')
    								  ->select('t.*','m.nama')
    								  ->where('status','menunggu pembayaran')->get();
    	$data['sudah_dibayar'] = DB::table('transaksi as t')
    								  ->join('murid as m','t.murid_id','m.id')
    								  ->select('t.*','m.nama')
    								  ->where('status','sudah_dibayar')->get();
 		
        return view('admin.transaksi.index',$data);
    }

    public function change_status(Request $request,$status){

    	DB::table('transaksi')->where('id',$request->id_transaksi)->update(['status'=>$request->status]);

    	return redirect()->back();

    }
}
