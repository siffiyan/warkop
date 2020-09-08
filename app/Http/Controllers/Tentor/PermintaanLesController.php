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
                            ->select('t.judul')
                            ->get();
        $data['user'] = Mitra::where('id',session('id'))->first();
        return view('tentor.permintaan_les.index',$data);
    }

}