<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class PenilaianController extends Controller
{
    public function index()
    {
        $data['berhasil'] =DB::table('transaksi_detail as a')
                                ->join('transaksi as b','a.transaksi_id','b.id')
                                ->join('mitra as c','b.mitra_id','c.id')
                                ->select('a.*','b.judul','c.nama','c.email')
                                ->where('b.status','berhasil')
                                ->where('b.murid_id',session('id'))
                                ->get();

        return view('siswa.penilaian.index',$data);
    }

    public function detail($id)
    {
        $data['detail'] = DB::table('transaksi_detail as a')
                                ->join('mitra as b','a.mitra_id','b.id')
                                ->where('a.id',$id)
                                ->select('a.*','b.nama','b.email','b.foto_profil')
                                ->first();

        $data['evaluasi'] = DB::table('evaluasi_mitra')
                                    ->where('transaksi_detail_id',$id)
                                    ->first();

        return response()->json($data);

    }

    public function store(Request $request)
    {
        DB::table('evaluasi_mitra')->updateOrInsert(["transaksi_detail_id" => $request->transaksi_id],[
            "transaksi_detail_id" => $request->transaksi_id,
            "mitra_id" => $request->mitra_id,
            "penilaian" => $request->penilaian,
            "keterangan" => $request->keterangan
        ]);

        DB::table('transaksi_detail')->where('id',$request->transaksi_id)->update(["evaluasi_mitra" => $request->penilaian]);

        $cek = DB::table('transaksi_detail')
                    ->where('mitra_id',$request->mitra_id)
                    ->where('evaluasi_murid','!=','0')
                    ->select(DB::raw('SUM(evaluasi_mitra) as total,COUNT(evaluasi_mitra) as count'))->first();
        
        $perhitungan = $cek->total / $cek->count;

        DB::table('mitra')->where('id',$request->mitra_id)->update(['penilaian' => $perhitungan]);

        return redirect()->back()->with('msg','Data Penilaian berhasil disimpan');
    }
}
