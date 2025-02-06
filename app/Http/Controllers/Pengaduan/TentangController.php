<?php

namespace App\Http\Controllers\Pengaduan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
        return view('pengaduan.tentang');
    }
}
