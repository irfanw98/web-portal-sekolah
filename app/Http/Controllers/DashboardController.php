<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswa;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboards.index');
    }
}
