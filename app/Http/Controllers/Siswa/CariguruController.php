<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Murid;
use App\Models\Mitra;
use App\Models\Jenjang;
use App\Models\Kurikulum;
use App\Models\Mapel;
use App\Models\BiayaLes;


class CariguruController extends Controller
{

    public function index()
    {
        $data['jenjang'] = Jenjang::all();
        $data['kurikulum'] = Kurikulum::all();
        $data['mapel'] = Mapel::all();
        $data['guru'] = Mitra::all();

        return view('siswa.cariguru.index',$data);
    }

    public function filter_mapel($jenjang, $kurikulum)
    {

        $data['mapel'] = DB::table('mata_pelajaran')->where([
            ['jenjang', $jenjang],
            ['kurikulum', $kurikulum]
        ])->get(); 

        return $data;
    }

    public function action_filter($jenjang, $kurikulum, $mapel)
    {

        $data['guru'] = DB::table('pilihan_mengajar_mitra as a')->join('mitra as b', '.a.mitra_id', '=', 'b.id')->where([['jenjang_id',$jenjang],['kurikulum_id', $kurikulum],['mapel_id', $mapel]])->get();

        return $data;
    }

    public function profil_tentor($id){
        
        $data['mitra'] = DB::table('mitra')->where('id',$id)->first();
        $data['prestasi'] = DB::table('prestasi_mitra')->where('mitra_id',$id)->get();
        $data['pengalaman'] = DB::table('pengalaman_mengajar_mitra')->where('id',$id)->get(); 

        return view('siswa.cariguru.profil_tentor',$data);

    }

    public function checkout(Request $request){

        $pilihan_guru = $request->pilihan_guru;
        $pilihan_guru = explode("|", $pilihan_guru);
        $data['jenjang'] = Jenjang::find($request->jenjang);
        $data['kurikulum'] = Kurikulum::find($request->kurikulum);
        $data['mapel'] = Mapel::find($request->mapel);

        $data['guru'] = Mitra::select('id','foto_profil','nama','nama_institusi')
                        ->whereIn('id',$pilihan_guru)
                        ->get();

        $data['pilihan_guru'] = $request->pilihan_guru;;
        
        return view('siswa.cariguru.checkout',$data);

    }

    public function cek_harga(Request $request){

        $hasil = array();

        $jumlah_orang = $request->jumlah_orang;
        $durasi_pertemuan = $request->durasi_pertemuan;
        $jenjang_id = $request->jenjang_id;
        $kurikulum_id = $request->kurikulum_id;

        foreach ($jumlah_orang as $key => $value) {
            $data = BiayaLes::where(['jenjang_id'=>$jenjang_id,'kurikulum_id'=>$kurikulum_id])->first();

            // get harga berdasarkan jumlah orang
            $harga_total_orang = 0;
            if($value > 1) $harga_total_orang = ($value-1) * $data->harga_tambahan_per_1;

            // get harga berdasarkan waktu
            if($durasi_pertemuan[$key]=='90') $harga_waktu = $data->harga_90;
            else $harga_waktu = $data->harga_120;

            $total_harga = $harga_total_orang + $harga_waktu;

            $hasil[$key]['harga'] = $total_harga;

        }

        return response()->json($hasil);

    }

     public function pembayaran(Request $request){

       $last_price = $request->last_price;
       $jenjang_id = $request->jenjang_id;
       $kurikulum_id = $request->kurikulum_id;
       $mapel_id = $request->mapel_id;

       $jumlah_orang = $request->jumlah_orang;
       $durasi_pertemuan = $request->durasi_pertemuan;
       $tanggal_pertemuan = $request->tanggal_pertemuan;
       $waktu_pertemuan = $request->waktu_pertemuan;
       $zona = $request->zona;
       $harga = $request->harga;

       $pilihan_guru = $request->pilihan_guru;
       $pilihan_guru = explode("|", $pilihan_guru);

       $jenjang = Jenjang::find($jenjang_id);
       $kurikulum = Kurikulum::find($kurikulum_id);
       $mapel = Mapel::find($mapel_id);

       $judul = 'Les '.$mapel->mata_pelajaran.' '.$kurikulum->kurikulum.' '.$jenjang->jenjang;

       $id = DB::table('transaksi')->insertGetId(['judul'=>$judul,'mapel_id'=>$mapel_id,'total_biaya'=>$last_price,'status'=>'menunggu pembayaran','murid_id'=>session('id')]);

       $kode_transaksi = date('ymd').str_pad($id, 3, '0', STR_PAD_LEFT);

       DB::table('transaksi')->where('id',$id)->update(["kode_transaksi" => $kode_transaksi]);

       foreach ($jumlah_orang as $key => $value) {

        // $waktu_pertemuan[$key] = date_format($waktu_pertemuan[$key],"H:i:s");
           DB::table('transaksi_detail')->insert([
            'tanggal_pertemuan'=>$tanggal_pertemuan[$key],
            'jumlah_orang'=>$value,
            'durasi'=>$durasi_pertemuan[$key],
            'biaya'=>$harga[$key],
            'waktu'=>$waktu_pertemuan[$key],
            'zona'=>$zona[$key],
            'transaksi_id'=>$id
        ]);
       }

       foreach($pilihan_guru as $key => $r){
        DB::table('transaksi_mitra')->insert([
            "mitra_id" => $r,
            "transaksi_id" => $id,
        ]);
    }

       return response()->json(['status'=>'success']);

    }

    public function promo($promo)
    {
        $promo = DB::table('diskon')->whereRaw('tanggal_mulai < CURDATE() AND tanggal_akhir > CURDATE() AND kode_promo = ?',[$promo])->first();
        
        if(!empty($promo)){
            $data['promo'] = $promo->presentase;
        }

        else{
            $data['promo'] = 'Kosong';
        }

        return $data;
    }

}
