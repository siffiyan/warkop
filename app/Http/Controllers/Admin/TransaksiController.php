<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class TransaksiController extends Controller
{
    public function index()
    {
        $data['transaksi'] = DB::table('transaksi as a')
                                    ->join('transaksi_detail as b','a.id','=','b.transaksi_id')
                                    ->join('murid as c','c.id','=','a.murid_id')
                                    ->get();
        return view('admin.transaksi.index',$data);
    }
}
