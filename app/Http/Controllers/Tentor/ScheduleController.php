<?php

namespace App\Http\Controllers\Tentor;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    public function index()
    {
        $data['transaksi'] = DB::table('transaksi_detail as a')
                                ->join('transaksi as b','a.transaksi_id','b.id')
                                ->join('murid as c','b.murid_id','c.id')
                                ->where('b.status','!=','berhasil')
                                ->where('a.mitra_id',session('id'))
                                ->get();

        $data['berhasil'] =DB::table('transaksi_detail as a')
                                ->join('transaksi as b','a.transaksi_id','b.id')
                                ->join('murid as c','b.murid_id','c.id')
                                ->select('a.*','c.nama','c.email','b.judul','b.status')
                                ->where('b.status','berhasil')
                                ->where('a.mitra_id',session('id'))
                                ->get();

        return view('tentor.schedule.index',$data);
    }

    public function update(Request $request)
    {
        $id = $request->id;

        DB::table('transaksi_detail')->where('id',$id)->update(['les' => 'YES']);

        return redirect()->back()->with('msg','Anda telah melakukan les jangan lupa untuk segera memberikan penilaian kepada murid pada menu Evaluasi Belajar');
    }
}
