<?php

namespace App\Http\Controllers\Petugas\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    // == View ==

    public function viewdataSiswa()
    {
        $data['siswa'] = \App\Siswa::get();
        $data['spp'] = \App\Spp::get();
        return view('admin.data-siswa',$data);
    }

    public function viewTambahSiswa()
    {
        $data['kelas'] = \App\Kelas::get();
        $data['spp'] = \App\Spp::get();
        return view('admin.update-siswa',$data);
    }

    public function viewEditSiswa($nisn)
    {
        $data['siswa'] = \App\Siswa::find($nisn);
        $data['kelas'] = \App\Kelas::get();
        $data['spp'] = \App\Spp::get();
        return view('admin.update-siswa',$data);
    }

    // == Action ==

    public function tambahSiswaPost(Request $request)
    {
        $this->validate($request,[
            'nisn' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required',
        ]);

        $data = new \App\Siswa;
        $data->nisn = $request->nisn;
        $data->nis = $request->nis;
        $data->nama = $request->nama;
        $data->id_kelas = $request->id_kelas;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->id_spp = $request->id_spp;

        $status = $data->save();

        if ($status) {
            return redirect('admin/data-siswa');
        } else {
            return redirect('admin/data-siswa/tambah');
        }

    }

    public function editSiswaPost(Request $request, $nisn)
    {
        $this->validate($request,[
            'nisn' => 'required|min:10',
            'nis' => 'required|min:10',
            'nama' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required',
        ]);

        $data = \App\Siswa::find($nisn);
        $data->nisn = $request->nisn;
        $data->nis = $request->nis;
        $data->nama = $request->nama;
        $data->id_kelas = $request->id_kelas;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->id_spp = $request->id_spp;

        $status = $data->update();

        if ($status) {
            return redirect('admin/data-siswa');
        } else {
            return redirect('admin/data-siswa/edit');
        }
    }  

    public function deleteSiswaPost($nisn)
    {
        $data = \App\Siswa::find($nisn);

        $status = $data->delete();

        if ($status) {
            return redirect('admin/data-siswa');
        } else {
            return redirect('admin/data-siswa');
        }
    }
}
