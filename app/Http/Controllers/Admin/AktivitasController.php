<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class AktivitasController extends Controller
{
    public function index()
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        $data['siswa'] = DB::table('murid')->orderBy('created_at', 'desc')->get();
        //$data['new_siswa'] = DB::table('murid')->where(DB::raw("DATE(created_at) = '".date('Y-m-d',strtotime($current_date_time))."'"))->count();
        $data['transaksi'] = DB::table('transaksi')->join('mitra','transaksi.mitra_id','mitra.id')->orderBy('transaksi.created_at', 'desc')->get();
        return view('admin.aktivitas_terbaru.index',$data);    
    }
    
}
