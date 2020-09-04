<?php

namespace App\Http\Controllers\Tentor;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\Mitra;
use App\Models\Admin;


class DashboardController extends Controller
{

    public function index()
    {	
        return view('tentor.dashboard.index');
    }

}