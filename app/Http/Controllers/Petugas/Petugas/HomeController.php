<?php

namespace App\Http\Controllers\Petugas\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function viewHomePetugas()
    {
        $data['pembayaran'] = \App\Pembayaran::get();
        return view('petugas.home',$data);
    }
}
