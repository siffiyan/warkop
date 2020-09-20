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

        $data['saldoFirst'] = DB::table('transaksi_detail as a')
                                ->select(DB::raw("((SUM(biaya)-(SELECT SUM(jumlah) FROM pencairan_dana WHERE status != 'ditolak'))*80/100) AS saldo"))
                                ->where('evaluasi_murid','!=','0')
                                ->first();

        $data = DB::table('transaksi_detail')
                    ->where('mitra_id',session()->get('id'))
                    ->where('evaluasi_murid','<>','0')
                    ->select(DB::raw("(SUM(biaya)*80/100)-(SELECT SUM(jumlah) FROM pencairan_dana WHERE STATUS = 'berhasil' AND mitra_id = '$mitra_id') total,(SELECT SUM(jumlah) FROM pencairan_dana WHERE STATUS = 'berhasil') AS penarikan, MONTHNAME(created_at) as bulan"))
                    ->groupBy(DB::raw('month(created_at)'))
                    ->get();

        foreach($data as $key => $value){
            $saldo[] = $value->total;
            $bulan[] = $value->bulan;
            $penarikan[] = $value->penarikan;
        }

        $data = [
            'saldo' => json_encode($saldo,JSON_NUMERIC_CHECK),
            'bulan' => json_encode($bulan, ),
            'penarikan' => json_encode($penarikan, JSON_NUMERIC_CHECK),
        ];

        $data['saldoFirst'] = DB::table('transaksi_detail as a')
                                ->select(DB::raw("((SUM(biaya)-(SELECT SUM(jumlah) FROM pencairan_dana WHERE status != 'ditolak'))*80/100) AS saldo"))
                                ->where('evaluasi_murid','!=','0')
                                ->first();

        $data['jumlah'] = DB::table('pencairan_dana as a')
                                    ->select(DB::raw('SUM(jumlah) as jumlah'))
                                    ->where('status', 'berhasil')
                                    ->where('mitra_id', session()->get('id'))
                                    ->first();

        return view('tentor.dashboard.index',$data);
    }

}