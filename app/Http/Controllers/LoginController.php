<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function logoutPost()
    {
        Session::flush();
        return redirect('/');
    }

    public function viewLoginPetugas()
    {
        return view('login.login-petugas');
    }

    public function loginPetugasPost(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        
        $data = \App\Petugas::where('username',$username)->first();
        
        if ($data) {
            if ($password === $data->password) {
                Session::put('login',TRUE);
                Session::put('id_petugas',$data->id_petugas);
                Session::put('nama_petugas',$data->nama_petugas);
                Session::put('level',$data->level);

                if (Session::get('level') == 'admin') {
                    return redirect('admin/data-siswa');
                } else {
                    return redirect('petugas/home');
                }
            }else{
                return redirect('login/view/petugas');
            }
        }else{
            return redirect('login/view/petugas');
        }
    }


    public function viewLoginSiswa()
    {
        if (!Session::get('login')) {
            return view('login.login-siswa');            
        }else{
            if (!Session::get('level')) {
                return redirect('siswa/home');
            }else{
                return redirect('/');
            }
        }

    }

    public function loginSiswaPost(Request $request)
    {
        $nisn = $request->nisn;
        $data = \App\Siswa::where('nisn',$nisn)->first();
        if ($data) {
                Session::put('login',TRUE);
                Session::put('nisn',$data->nisn);
                Session::put('nama',$data->nama);
                return redirect('siswa/home');
        }else{
            return redirect('login/view/siswa');
        }
    }

}
