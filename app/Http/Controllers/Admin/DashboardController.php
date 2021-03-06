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
        $nama_bulan = ['Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $end = date('n');

        $bulan = array();
        $admin = array();
        $mitra = array();

        $query = DB::table('transaksi_detail')
                    ->where('evaluasi_murid','<>','0')
                    ->whereMonth('transaksi_detail.created_at', '=', 9)
                    ->select(DB::raw("(SUM(biaya)*20/100) as admin,(SUM(biaya)*80/100) as mitra"))
                    ->get();

        for ($i=0; $i <$end ; $i++) { 

            $query = DB::table('transaksi_detail')
                    ->where('evaluasi_murid','<>','0')
                    ->whereMonth('transaksi_detail.created_at', '=', $i+1)
                    ->select(DB::raw("(SUM(biaya)*20/100) as admin,(SUM(biaya)*80/100) as mitra"))
                    ->get();

            if($query[0]->admin){
                $admin[] = $query[0]->admin;
                $mitra[] = $query[0]->mitra;
            }

            else{
                $admin[] = 0;
                $mitra[] = 0;
            }


            $bulan[] = $nama_bulan[$i];
            
        }


        $data['murid'] = Murid::all();
    	$data['mitra'] = Mitra::all();
        $data['admin'] = Admin::all();
        $data['transaksi'] = DB::table('transaksi')->where('status','berhasil')->get();
        $data['bulan'] = json_encode($bulan);
        $data['data_admin'] = json_encode($admin,JSON_NUMERIC_CHECK);
        $data['data_mitra'] = json_encode($mitra,JSON_NUMERIC_CHECK);

        return view('admin.dashboard.index',$data);
    }

}