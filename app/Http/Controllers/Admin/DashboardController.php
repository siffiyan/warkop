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
                    ->select(DB::raw("(SUM(biaya)*20/100) as admin,(SUM(biaya)*80/100) as mitra,MONTHNAME(created_at) as bulan"))
                    ->groupBy(DB::raw('month(created_at)'))
                    ->get();

        foreach($data as $key => $value){
            $admin[] = $value->admin;
            $mitra[] = $value->mitra;
            $bulan[] = $value->bulan;
        }

        $data['murid'] = Murid::all();
    	$data['mitra'] = Mitra::all();
        $data['admin'] = Admin::all();
        $data['admin'] = json_encode($admin,JSON_NUMERIC_CHECK);
        $data['mitra'] = json_encode($mitra,JSON_NUMERIC_CHECK);
        $data['bulan'] = json_encode($bulan);

        return view('admin.dashboard.index',$data);
    }

}