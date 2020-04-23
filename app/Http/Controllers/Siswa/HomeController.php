<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function viewHomeSiswa()
    {
		$nisn = Session::get('nisn');
		$data['pembayaran'] = \App\Pembayaran::where('nisn',$nisn)->get();
		
		return view('siswa.home',$data);
    }
}