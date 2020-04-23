<?php

namespace App\Http\Controllers\Petugas\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SppController extends Controller
{
    // == View ==

    public function viewdataSpp()
    {
        $data['spp'] = \App\Spp::get();
        return view('admin.data-spp',$data);
    }

    public function viewTambahSpp()
    {
        return view('admin.update-spp');
    }

    public function viewEditSpp($id_spp)
    {
        $data['spp'] = \App\Spp::find($id_spp);
        return view('admin.update-spp',$data);
    }

    // == Action ==

    public function tambahSppPost(Request $request)
    {
        $this->validate($request,[
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        $data = new \App\Spp;
        $data->tahun = $request->tahun;
        $data->nominal = $request->nominal;

        $status = $data->save();

        if ($status) {
            return redirect('admin/data-spp');
        } else {
            return redirect('admin/data-spp/tambah');
        }
    }

    public function editSppPost(Request $request, $id_spp)
    {
        $this->validate($request,[
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        $data = \App\Spp::find($id_spp);
        $data->tahun = $request->tahun;
        $data->nominal = $request->nominal;

        $status = $data->update();

        if ($status) {
            return redirect('admin/data-spp');
        } else {
            return redirect('admin/data-spp/edit');
        }
    }  

    public function deleteSppPost($id_spp)
    {
        $data = \App\Spp::find($id_spp);

        $status = $data->delete();

        if ($status) {
            return redirect('admin/data-spp');
        } else {
            return redirect('admin/data-spp');
        }
    }
}
