<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BlogController extends Controller
{
    public function detail($id)
    {
        $data['blog'] = DB::table('blog')->where('id',$id)->first();

        if($data['blog']->role == 'Super Admin'){
            $data['created_by'] = DB::table('admin')->where('id',$data['blog']->created_by)->first();
        }else{
            $data['created_by'] = DB::table('mitra')->where('id',$data['blog']->created_by)->first();
        }

        return view('landing_page.blog',$data);
    }
}
