<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\Mitra;
use App\Models\Admin;
use DB;


class GuruTerbaikController extends Controller
{

    public function index()
    {	
    	$data['guru'] = DB::table('mitra')->where('complete',1)->orderBy('penilaian', 'desc')->orderBy('poin','desc')->limit(8)->get();
        return view('admin.guru_terbaik.index',$data);
    }

}