<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboardcontroller extends Controller
{
    ////method untuk halaman index
    public function index()
    {
        return view("admin.dashboard.index");
    }
}
