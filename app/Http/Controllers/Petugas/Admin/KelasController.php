<?php

namespace App\Http\Controllers\Petugas\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelasController extends Controller
{
    // == View ==

    public function viewdataKelas()
    {
        $data['kelas'] = \App\Kelas::get();
        return view('admin.data-kelas',$data);
    }

    public function viewTambahKelas()
    {
        return view('admin.update-kelas');
    }

    public function viewEditKelas($id_kelas)
    {
        $data['kelas'] = \App\Kelas::find($id_kelas);
        return view('admin.update-kelas',$data);
    }

    // == Action ==

    public function tambahKelasPost(Request $request)
    {
        $this->validate($request,[
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        $data = new \App\Kelas;
        $data->nama_kelas = $request->nama_kelas;
        $data->kompetensi_keahlian = $request->kompetensi_keahlian;

        $status = $data->save();

        if ($status) {
            return redirect('admin/data-kelas');
        } else {
            return redirect('admin/data-kelas/tambah');
        }

    }

    public function editKelasPost(Request $request, $id_kelas)
    {
        $this->validate($request,[
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        $data = \App\Kelas::find($id_kelas);
        $data->nama_kelas = $request->nama_kelas;
        $data->kompetensi_keahlian = $request->kompetensi_keahlian;

        $status = $data->update();

        if ($status) {
            return redirect('admin/data-kelas');
        } else {
            return redirect('admin/data-kelas/edit');
        }
    }  

    public function deleteKelasPost($id_kelas)
    {
        $data = \App\Kelas::find($id_kelas);

        $status = $data->delete();

        if ($status) {
            return redirect('admin/data-kelas');
        } else {
            return redirect('admin/data-kelas');
        }
    }
}
