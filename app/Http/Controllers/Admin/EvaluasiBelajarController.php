<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluasiBelajarController extends Controller
{

	public function index(){

		$data['evaluasi_belajar'] = DB::table('evaluasi_belajar_siswa as e')
								   ->join('murid as m','e.murid_id','m.id')
								   ->join('transaksi_detail as t','e.transaksi_detail_id','t.id')
								   ->join('mitra as mi','t.mitra_id','mi.id')
								   ->select('e.*','m.nama as nama_murid','mi.nama as nama_mitra')
								   ->get();

		return view('admin.pembelajaran.evaluasi_belajar.index',$data);

	}

}