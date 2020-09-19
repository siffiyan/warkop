<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Kurikulum;

class KurikulumController extends Controller
{
    public function index()
    {
        $data['kurikulum'] = Kurikulum::all();
        return view('admin.pembelajaran.kurikulum.index',$data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kurikulum' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['admin_id'] = session('id');
        Kurikulum::create($data);

        return redirect()->back()->with('msg', 'data kurikulum berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Kurikulum::find($id);
        echo json_encode($data);
    }

    public function update(Request $request)
    {
        $id = $request->id;

        $validator = Validator::make($request->all(), [
            'kurikulum' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $kurikulum = Kurikulum::findOrFail($id);
        $kurikulum->kurikulum = $request->kurikulum;
        $kurikulum->admin_id = session('id');
        $kurikulum->update();

        return redirect()->back()->with('msg','data Kurikulum berhasil diedit');
    }

    public function destroy(Request $request)
    {
        Kurikulum::destroy($request->id);
        return redirect()->back()->with('msg','data Kurikulum berhasil dihapus');
    }
}
