<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\Mitra;
use App\Models\Admin;


class DashboardController extends Controller
{

    public function index()
    {	
    	$data['murid'] = Murid::all();
    	$data['mitra'] = Mitra::all();
    	$data['admin'] = Admin::all();
        return view('admin.dashboard.index',$data);
    }

}