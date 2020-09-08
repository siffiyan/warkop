<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Murid;

class TransaksiController extends Controller
{

    public function index()
    {	
    	$data['transaksi'] = DB::table('transaksi')->where('murid_id',session('id'))->get();
        return view('siswa.transaksi.index',$data);
    }

    public function pembayaran($id)
    {
        $data['kode_transaksi'] = $id;
        return view('siswa.transaksi.pembayaran',$data);
    }

    public function detail_pembayaran($id)
    {
        $data['siswa'] = Murid::where('id', session()->get('id'))->firstOrFail();
        $data['transaksi'] = DB::table('transaksi_detail as a')
                                    ->join('transaksi as b','a.transaksi_id','=','b.id')
                                    ->where('b.id',$id)
                                    ->get();
        $data['total'] = DB::table('transaksi')
                                ->where('id',$id)->first();
        return view('siswa.transaksi.detail_pembayaran',$data);
    }

}