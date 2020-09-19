<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\Mitra;
use App\Models\Admin;
use DB;


class DashboardController extends Controller
{

    public function index()
    {	
        $data = DB::table('transaksi_detail')
                    ->where('evaluasi_murid','<>','0')
                    ->select(DB::raw("(SUM(biaya)*20/100) as total, MONTHNAME(created_at) as bulan"))
                    ->groupBy(DB::raw('month(created_at)'))
                    ->get();

        foreach($data as $key => $value){
            $saldo[] = $value->total;
            $bulan[] = $value->bulan;
        }

        $data['murid'] = Murid::all();
    	$data['mitra'] = Mitra::all();
        $data['admin'] = Admin::all();
        $data['saldo'] = json_encode($saldo,JSON_NUMERIC_CHECK);
        $data['bulan'] = json_encode($bulan);

        return view('admin.dashboard.index',$data);
    }

}