<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Murid;

class DashboardController extends Controller
{

    public function index()
    {	
        return view('siswa.dashboard.index');
    }

}