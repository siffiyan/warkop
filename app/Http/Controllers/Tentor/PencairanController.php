<?php

namespace App\Http\Controllers\Tentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PencairanController extends Controller
{
    public function index()
    {
        $data['rekening'] = DB::table('rekening')->where('mitra_id',session()->get('id'))->get();
        $data['saldo'] = DB::table('transaksi')->select(DB::raw('(SUM(total_biaya)-(SELECT SUM(jumlah) FROM pencairan_dana)) AS saldo'))->first();
        $data['transaksi'] = DB::table('pencairan_dana as a')
                                    ->join('rekening as b','a.rekening_id','b.id')
                                    ->where('a.mitra_id',session()->get('id'))->get();

        return view('tentor.pencairan.index',$data);
    }

    public function store(Request $request)
    {
        $id = DB::table('pencairan_dana')->insertGetId([
            "tanggal" => date('Y-m-d'),
            "jumlah" => $request->jumlah,
            "rekening_id" => $request->rekening_id,
            "mitra_id" => session()->get('id'),
        ]);

        $invoice = 'PCR/DN/'.str_pad($id, 3, '0', STR_PAD_LEFT);

        DB::table('pencairan_dana')->where('id',$id)->update(['no_invoice' => $invoice]);

        return redirect()->back()->with('msg','Pencairan berhasil diajukan silahkan tunggu approve dari admin');
    }
}
