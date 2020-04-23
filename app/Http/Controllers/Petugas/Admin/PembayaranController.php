<?php

namespace App\Http\Controllers\Petugas\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PembayaranController extends Controller
{
    public function viewdataPembayaran()
    {
        $data['pembayaran'] = \App\Pembayaran::get();
        return view('admin.data-pembayaran',$data);
    }


    public function viewTambahPembayaran()
    {
        $data['siswa'] = \App\Siswa::get();
        $data['spp'] = \App\Spp::get();
        return view('admin.update-pembayaran',$data);
    }

    public function viewEditPembayaran($id_pembayaran)
    {
        $data['pembayaran'] = \App\Pembayaran::find($id_pembayaran);
        $data['siswa'] = \App\Siswa::get();
        $data['spp'] = \App\Spp::get();
        return view('admin.update-pembayaran',$data);
    }

    // == Action ==

    public function tambahPembayaranPost(Request $request)
    {
        $this->validate($request,[
            'nisn' => 'required',
            // 'bulan_bayar' => 'required',
            // 'tahun_bayar' => 'required',
            'id_spp' => 'required',
            'jumlah_bayar' => 'required',
            ]);

        $data = new \App\Pembayaran;
        $data->id_petugas = Session::get('id_petugas');
        
        $data->nisn = $request->nisn;
        $date = date("Y-m-d");
        $data->tgl_bayar = $date;
        $data->bulan_bayar = $request->bulan_bayar;
        $data->tahun_bayar = $request->tahun_bayar;
        $data->id_spp = $request->id_spp;
        $data->jumlah_bayar = $request->jumlah_bayar;

        $status = $data->save();

        if ($status) {
            return redirect('admin/data-pembayaran');
        } else {
            return redirect('admin/data-pembayaran/tambah');
        }
    }

    public function editPembayaranPost(Request $request, $id_pembayaran)
    {
        $this->validate($request,[
            'nisn' => 'required',
            'bulan_bayar' => 'required',
            'tahun_bayar' => 'required',
            'id_spp' => 'required',
            'jumlah_bayar' => 'required',
        ]);

        $data = \App\Pembayaran::find($id_pembayaran);
        $data->nisn = $request->nisn;
        $data->bulan_bayar = $request->bulan_bayar;
        $data->tahun_bayar = $request->tahun_bayar;
        $data->id_spp = $request->id_spp;
        $data->jumlah_bayar = $request->jumlah_bayar;

        $status = $data->update();

        if ($status) {
            return redirect('admin/data-pembayaran');
        } else {
            return redirect('admin/data-pembayaran/edit');
        }
    }  

    public function deletePembayaranPost($id_pembayaran)
    {
        $data = \App\Pembayaran::find($id_pembayaran);

        $status = $data->delete();

        if ($status) {
            return redirect('admin/data-pembayaran');
        } else {
            return redirect('admin/data-pembayaran');
        }
    }
}
