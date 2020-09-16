<?php

namespace App\Http\Controllers\Tentor;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class EvaluasiController extends Controller
{
    public function index()
    {
        $data['berhasil'] =DB::table('transaksi_detail as a')
                                ->join('transaksi as b','a.transaksi_id','b.id')
                                ->join('murid as c','b.murid_id','c.id')
                                ->select('a.*','b.judul','c.nama','c.email')
                                ->where('a.les','YES')
                                ->where('a.mitra_id',session('id'))
                                ->get();
                                
        return view('tentor.evaluasi.index',$data);
    }

    public function detail_murid($id)
    {
        $data['murid'] = DB::table('transaksi_detail as a')
                                ->join('transaksi as b','a.transaksi_id','b.id')
                                ->join('murid as c','b.murid_id','c.id')
                                ->select('a.id as transaksi_detail','c.*')
                                ->where('a.mitra_id',session('id'))
                                ->where('a.id',$id)
                                ->first();

        $data['evaluasi'] = DB::table('evaluasi_belajar_siswa')
                                    ->where('transaksi_detail_id',$id)
                                    ->first();

        return response()->json($data);
    }

    public function store(Request $request)
    {
        DB::table('evaluasi_belajar_siswa')->updateOrInsert(["transaksi_detail_id" => $request->transaksi_id],[
            "transaksi_detail_id" => $request->transaksi_id,
            "murid_id" => $request->murid_id,
            "pemahaman" => $request->pemahaman,
            "konsentrasi" => $request->konsentrasi,
            "penilaian" => $request->penilaian,
        ]);

        $a = $request->pemahaman + $request->konsentrasi / 2;

        DB::table('transaksi_detail')->where('id',$request->transaksi_id)->update(["evaluasi_murid" => $a]);

        return redirect()->back()->with('msg','Data Evaluasi belajar berhasil disimpan');
    }
}
