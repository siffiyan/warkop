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
        $data['pending'] = DB::table('transaksi as t')
                                      ->join('murid as m','t.murid_id','m.id')
                                      ->select('t.*','m.nama')
                                      ->where('status','pending')->get();

        $data['berhasil'] = DB::table('transaksi as t')
                                      ->join('murid as m','t.murid_id','m.id')
                                      ->select('t.*','m.nama')
                                      ->where('status','berhasil')->get();
 		
        return view('admin.transaksi.index',$data);
    }

    public function detail($id){

        $data['user'] = DB::table('transaksi as t')
                        ->join('murid as m','t.murid_id','m.id')
                        ->join('mitra as mt','t.mitra_id','mt.id')
                        ->where('t.id',$id)
                        ->select('m.nama as nama_murid','m.email as email_murid','m.no_hp as no_hp_murid','mt.nama as nama_guru','mt.email as email_guru','mt.no_hp as no_hp_guru')
                        ->first();
        $data['transaksi'] = DB::table('transaksi_detail')->where('transaksi_id',$id)->get();
        return view('admin.transaksi.detail',$data);

    }

    public function change_status(Request $request,$status){

    	DB::table('transaksi')->where('id',$request->id_transaksi)->update(['status'=>$request->status]);

    	return redirect()->back();

    }

    public function show($id){

        $data = DB::table('transaksi_detail')->where('id',$id)->first();
        return response()->json($data);

    }

    public function update_link_meeting(Request $request){

        DB::table('transaksi_detail')->where('id', $request->id_transaksi_detail)->update(['link_meeting' => $request->link_meeting]);

        $affected =  DB::table('transaksi_detail')->where('id', $request->id_transaksi_detail)->first();

        // cek apakah sudah semuanya di input link meeting
        $data = DB::table('transaksi_detail')->where('transaksi_id', $affected->transaksi_id);

        if($data->count() == $data->whereNotNull('link_meeting')->count()){

            // update menjadi berhasil

            DB::table('transaksi')->where('id', $affected->transaksi_id)->update(['status'=>'berhasil']);

        }

        return redirect()->back();

    }
}
