<?php

namespace App\Http\Controllers\Tentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Mitra;
use App\Models\PengalamanMengajarMitra;
use App\Models\PilihanMengajarMitra;
use App\Models\PrestasiMitra;
use App\Models\Mapel;
use App\Models\Jenjang;
use App\Models\Kurikulum;

class ProfilController extends Controller
{

    public function index()
    {	
        $data['jenjang'] = Jenjang::all();
        $data['kurikulum'] = Kurikulum::all();
        $data['mapel'] = Mapel::all();
        $data['user'] = Mitra::where('id',session('id'))->first();
    	$data['pengalaman'] = PengalamanMengajarMitra::where('mitra_id',session('id'))->get();
        $data['prestasi'] = PrestasiMitra::where('mitra_id',session('id'))->get();
        $data['pilihan_mengajar'] = PilihanMengajarMitra::where('mitra_id',session('id'))
                                    ->join('jenjang', 'pilihan_mengajar_mitra.jenjang_id', '=', 'jenjang.id')
                                    ->join('kurikulum', 'pilihan_mengajar_mitra.kurikulum_id', '=', 'kurikulum.id')
                                    ->join('mata_pelajaran', 'pilihan_mengajar_mitra.mapel_id', '=', 'mata_pelajaran.id')
                                    ->select('pilihan_mengajar_mitra.*','jenjang.jenjang','kurikulum.kurikulum','mata_pelajaran.mata_pelajaran')
                                    ->get();
    	$data['tahun_awal'] = range(2020, 1960);
        $data['pendidikan'] = ['SD','SMP','SMA','S1','S2'];
    	$hasil = $data['tahun_awal'];
    	array_unshift($hasil, "Sampai Sekarang");
        $data['tahun_akhir'] = $hasil;
        $data['provinsi'] = DB::table('tbl_provinsi')->get();
        $data['kota'] = DB::table('tbl_kabkot')->get();
        $data['kecamatan'] = DB::table('tbl_kecamatan')->get();
        $data['kelurahan'] = DB::table('tbl_kelurahan')->get();
        return view('tentor.profil.index',$data);
    }

    public function update(Request $request){

        $data = Mitra::where('id',session('id'))->first();
        $change = $request->except('foto_profil');
        
        if(isset($request->foto_profil)){

            $this->validate($request, [
            'foto_profil' => 'required|max:10000|mimes:png,jpg,jpeg'
            ]);

            $file = $request->file('foto_profil');
            $foto_profil = time().$file->getClientOriginalName();
            $change['foto_profil'] = $foto_profil;
            $file->move('foto_guru',$foto_profil);
        }

        $data->update($change);

        return redirect('/tentor/profil')->with('msg','Data profil berhasil diedit');
    }

    public function kota($id)
    {
        $data = DB::table('tbl_kabkot')->where('provinsi_id',$id)->get();
        return response()->json($data);
    }

    public function kecamatan($id)
    {
        $data = DB::table('tbl_kecamatan')->where('kabkot_id',$id)->get();
        return response()->json($data);
    }

    public function kelurahan($id)
    {
        $data = DB::table('tbl_kelurahan')->where('kecamatan_id',$id)->get();
        return response()->json($data);
    }

}