<?php

namespace App\Http\Controllers\Tentor;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\Mitra;
use App\Models\Admin;


class DashboardController extends Controller
{

    public function index()
    {	

        $mitra_id = session()->get('id');

        $nama_bulan = ['Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $end = date('n');

        $bulan = array();
        $admin = array();
        $mitra = array();

        for ($i=0; $i <$end ; $i++) { 
            $month_number = $i+1;
            $query = DB::table('transaksi_detail')
                    ->where('mitra_id',session()->get('id'))
                    ->where('evaluasi_murid','<>','0')
                    ->whereMonth('transaksi_detail.created_at', '=', $month_number)
                    ->select(DB::raw("(SUM(biaya)*80/100)-if((SELECT SUM(jumlah) FROM pencairan_dana WHERE STATUS = 'berhasil' AND mitra_id = '$mitra_id')<>null,(SUM(biaya)*80/100)-if((SELECT SUM(jumlah) FROM pencairan_dana WHERE STATUS = 'berhasil' AND mitra_id = '$mitra_id'),0) total,(SELECT SUM(jumlah) FROM pencairan_dana WHERE STATUS = 'berhasil' AND MONTH(created_at) = '$month_number') AS penarikan"))
                    ->get();

            if($query[0]->total){
                $total[] = $query[0]->total;
            }else{
                $total[] = 0;
            }

            if($query[0]->penarikan){
                $penarikan[] = $query[0]->penarikan;
            }else{
                $penarikan[] = 0;
            }


            $bulan[] = $nama_bulan[$i];
            
        }

        $data['bulan'] = json_encode($bulan);
        $data['total'] = json_encode($total,JSON_NUMERIC_CHECK);
        $data['penarikan'] = json_encode($penarikan,JSON_NUMERIC_CHECK);

        $id = session('id');

        $saldoTentor = DB::table('transaksi_detail')
                                ->select(DB::raw("(SUM(biaya)*80/100) AS saldo"))
                                ->where('evaluasi_murid','!=','0')
                                ->where('mitra_id',$id)
                                ->first();

        $penarikan = DB::table('pencairan_dana')
                            ->select(DB::raw("(SUM(jumlah)) as penarikan"))
                            ->where('mitra_id',$id)
                            ->where('status','<>','ditolak')
                            ->first();
        
        if(empty($penarikan->penarikan)){
            $a = 0;
        }else{
            $a = $penarikan->penarikan;
        }

        $data['saldoFirst'] = $saldoTentor->saldo;
        $data['saldoFirst'] -= $a;

        $data['jumlah'] = DB::table('pencairan_dana as a')
                                    ->select(DB::raw('SUM(jumlah) as jumlah'))
                                    ->where('status', 'berhasil')
                                    ->where('mitra_id', session()->get('id'))
                                    ->first();

        return view('tentor.dashboard.index',$data);
    }

}