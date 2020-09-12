<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ScheduleController extends Controller
{
    public function index(){

        $data['transaksi'] = DB::table('transaksi_detail as a')
                                    ->join('transaksi as b','a.transaksi_id','b.id')
                                    ->join('mitra as c','b.mitra_id','c.id')
                                    ->where('b.status','!=','berhasil')
                                    ->where('b.murid_id',session('id'))
                                    ->get();
        $data['berhasil'] =DB::table('transaksi_detail as a')
                                ->join('transaksi as b','a.transaksi_id','b.id')
                                ->join('mitra as c','b.mitra_id','c.id')
                                ->where('b.status','berhasil')
                                ->get();

        return view('siswa.schedule.index',$data);
    }
}
