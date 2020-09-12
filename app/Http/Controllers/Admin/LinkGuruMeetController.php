<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\Mitra;
use App\Models\Admin;
use DB;

class LinkGuruMeetController extends Controller
{

    public function index()
    {	
    	$bulan = date('m');
    	$data['meet'] = DB::table('transaksi_detail as td')
    					->join('transaksi as t','td.transaksi_id','t.id')
    					->join('mata_pelajaran as m','t.mapel_id','m.id')
    					->join('jenjang as j','m.jenjang','j.id')
    					->join('murid as mu','t.murid_id','mu.id')
    					->where('t.status','berhasil')
    				    ->whereMonth('td.tanggal_pertemuan', $bulan)
    				    ->select('m.mata_pelajaran','td.*','j.jenjang','mu.nama')
    				    ->get();
        return view('admin.link_guru_meet.index',$data);
    }

}