<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PencairanController extends Controller
{
    public function index()
    {
        $data['transaksi'] = DB::table('pencairan_dana as a')
                                    ->join('rekening as b','a.rekening_id','b.id')
                                    ->select('a.*','b.nama_pemilik','b.nama_bank')
                                    ->get();

        return view('admin.pencairan.index',$data);
    }

    public function approve(Request $request)
    {
        DB::table('pencairan_dana')->where('id',$request->id)->update(["status" => "berhasil"]);

        return redirect()->back()->with('msg','Pencairan dana berhasil di approve');
    }

    public function reject(Request $request)
    {
        DB::table('pencairan_dana')->where('id',$request->id)->update(["status" => "ditolak"]);

        return redirect()->back()->with('msg','Pencairan dana berhasil di tolak');
    }
}
