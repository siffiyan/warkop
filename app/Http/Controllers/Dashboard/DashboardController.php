<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Models\Blog;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blog'] = DB::table('blog')->where(['status' => 'approve', 'isactive' => '1'])->limit(3)->get();
        $data['guru_terbaik'] = DB::table('mitra')->orderBy('penilaian', 'desc')->limit(10)->get();
        $data['count_mitra'] = DB::table('mitra')->count();
        $data['count_mapel'] = DB::table('mata_pelajaran')->count();
        $data['count_room'] = DB::table('transaksi_detail')->where('link_meeting','<>',null)->count();
        $data['count_provinsi'] = DB::table('mitra')->where('provinsi_id','<>',null)->groupBy('provinsi_id')->count();

        return view('landing_page.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
