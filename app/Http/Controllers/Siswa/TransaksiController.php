<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TransaksiController extends Controller
{

    public function index()
    {	
    	$data['transaksi'] = DB::table('transaksi')->where('murid_id',session('id'))->get();
        return view('siswa.transaksi.index',$data);
    }

}