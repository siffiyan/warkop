<?php

namespace App\Http\Controllers\Tentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mitra;
use DB;

class PermintaanLesController extends Controller
{

    public function index()
    {	
        $data['permintaan'] = DB::table('transaksi_mitra as tm')
                            ->join('transaksi as t','tm.transaksi_id','t.id')
                            ->where(['tm.mitra_id'=>session('id'),'tm.status'=>'aktif'])
                            ->select('t.judul','t.id')
                            ->get();
        $data['user'] = Mitra::where('id',session('id'))->first();
        return view('tentor.permintaan_les.index',$data);
    }

    public function detail($id){

        $data = DB::table('transaksi_detail')->where('transaksi_id',$id)->get();
        return response()->json($data);

    }

    public function ambil(Request $request){

        DB::table('transaksi')->where('id', $request->id)->update(['status' => 'pending','mitra_id'=>session('id')]);
        DB::table('transaksi_detail')->where('transaksi_id', $request->id)->update(['mitra_id' => session('id')]);
        DB::table('transaksi_mitra')->where('transaksi_id', $request->id)->update(['status' => 'nonaktif']);

        return redirect()->back();

    }

}