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

        $hasil = array();

        $nama_bulan = ['Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $end = date('n');

        $bulan = array();
        $admin = array();
        $mitra = array();

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
        $data['bulan'] = json_encode($bulan);

        return view('admin.dashboard.index',$data);
    }

}