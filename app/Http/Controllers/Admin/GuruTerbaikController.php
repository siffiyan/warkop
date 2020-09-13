<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\Mitra;
use App\Models\Admin;


class GuruTerbaikController extends Controller
{

    public function index()
    {	
        return view('admin.guru_terbaik.index');
    }

}