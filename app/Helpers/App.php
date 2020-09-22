<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class App {

    public static function get_completness($mitra_id) {
        	
       	$count = 13;
       	$persen_second = 0;

		$field = ['nama','email','tempat_lahir','tanggal_lahir','no_hp',
				 'pendidikan_terakhir','nama_institusi','prodi','foto_profil','provinsi_id',
				 'kabkot_id','kecamatan_id','kelurahan_id'];

		$data = DB::table('mitra')->where('id',$mitra_id)->first();
		
		foreach ($field as $r) {
			if($data->$r == null) $count--;
		}

		$persen_first = $count/13 * 50;

		$pilihan_mengajar = DB::table('pilihan_mengajar_mitra')->where('mitra_id',$mitra_id);

		if($pilihan_mengajar->count()>0){
			$persen_second = 50;
		}

		$total = round(($persen_first + $persen_second),2);

		return $total;

	}
	
	public static function get_rating($mitra_id)
	{
		$query = DB::table('mitra')->where('id',$mitra_id)->select('penilaian')->first();
		return $query->penilaian;
	}

	public static function get_poin($mitra_id)
	{
		$query = DB::table('mitra')->where('id',$mitra_id)->select('poin')->first();
		return $query->poin;
	}

	public static function get_saldo($mitra_id)
	{
		$query = DB::table('transaksi_detail as a')
					->select(DB::raw("(SUM(biaya)*80/100)-if((SELECT SUM(jumlah) FROM pencairan_dana WHERE STATUS = 'berhasil' AND mitra_id = '$mitra_id')<>null,(SELECT SUM(jumlah) FROM pencairan_dana WHERE STATUS = 'berhasil' AND mitra_id = '$mitra_id'),0) as saldo"))
					->where('evaluasi_murid','!=','0')
					->first();

		return $query->saldo;
	}

}