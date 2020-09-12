<?php

namespace App\Http\Controllers\Tentor;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        $data['bank'] = DB::table('bank')->get();
        $data['rekening'] = DB::table('rekening')->where('mitra_id',session()->get('id'))->get();
        return view('tentor.bank.index',$data);
    }

    public function store(Request $request)
    {
        DB::table('rekening')->insert([
            "mitra_id" => session()->get('id'),
            "nama_bank" => $request->nama_bank,
            "cabang" => $request->cabang,
            "nomor_rekening" => $request->nomor_rekening,
            "nama_pemilik" => $request->nama_pemilik,
        ]);

        return redirect()->back()->with('msg','data rekening berhasil ditambahkan');
    }

    public function detail($id)
    {
        $data = DB::table('rekening as a')->where('id',$id)->first();

        return response()->json($data);
    }

    public function delete($id)
    {
        DB::table('rekening')->where('id',$id)->delete();

        return response()->back()->with('msg','Data rekening berhasil dihapus');
    }
}
