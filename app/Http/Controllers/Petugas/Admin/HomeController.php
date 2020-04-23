<?php

namespace App\Http\Controllers\Petugas\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function viewHomeAdmin()
    {
        return view('admin.home');        
    }
    
}
