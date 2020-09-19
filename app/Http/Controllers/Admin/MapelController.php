<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Mapel;
use App\Models\Jenjang;
use App\Models\Kurikulum;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['mapel'] = DB::table('mata_pelajaran')->join('jenjang','mata_pelajaran.jenjang','=','jenjang.id')->join('kurikulum','mata_pelajaran.kurikulum','=','kurikulum.id')->select('mata_pelajaran.*','jenjang.jenjang','kurikulum.kurikulum')->get();
        $data['jenjang'] = Jenjang::all();
        $data['kurikulum'] = Kurikulum::all();

        return view('admin.pembelajaran.mapel.index', $data);
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
        $validator = Validator::make($request->all(), [
            'jenjang' => 'required',
            'mata_pelajaran' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['admin_id'] = session('id');
        $insert = Mapel::create($data);
        if($insert){
            return redirect()->back()->with('msg','data Mata Pelajaran berhasil ditambahkan');
        }else{
            return 'gagal';
        }
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
        $data = Mapel::find($id);
        echo json_encode($data);
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
    public function destroy(Request $request)
    {
        Mapel::destroy($request->id);
        return redirect()->back()->with('msg','data Mata Pelajaran berhasil hapus');
    }
}
