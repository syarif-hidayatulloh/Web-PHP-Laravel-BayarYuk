<?php

namespace App\Http\Controllers\Petugas\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PembayaranController extends Controller
{
    // == View ==

    public function viewTambahPembayaran()
    {
        $data['siswa'] = \App\Siswa::get();
        $data['spp'] = \App\Spp::get();
        return view('petugas.update-pembayaran',$data);
    }

    public function viewEditPembayaran($id_pembayaran)
    {
        $data['pembayaran'] = \App\Pembayaran::find($id_pembayaran);
        $data['siswa'] = \App\Siswa::get();
        $data['spp'] = \App\Spp::get();
        return view('petugas.update-pembayaran',$data);
    }

    // == Action ==

    public function tambahPembayaranPost(Request $request)
    {
        $this->validate($request,[
            'nisn' => 'required',
            'bulan_dibayar' => 'required',
            'tahun_dibayar' => 'required',
            'id_spp' => 'required',
            'jumlah_bayar' => 'required',
            ]);

        $data = new \App\Pembayaran;
        $data->id_petugas = Session::get('id_petugas');
        $data->nisn = $request->nisn;
        $date = date("Y-m-d");
        $data->tgl_bayar = $date;
        $data->bulan_dibayar = $request->bulan_dibayar;
        $data->tahun_dibayar = $request->tahun_dibayar;
        $data->id_spp = $request->id_spp;
        $data->jumlah_bayar = $request->jumlah_bayar;

        $status = $data->save();

        if ($status) {
            return redirect('petugas/home');
        } else {
        return redirect('petugas/tambah/pembayaran');
        }
    }

    public function editPembayaranPost(Request $request, $id_pembayaran)
    {
        $this->validate($request,[
            'nisn' => 'required',
            'bulan_dibayar' => 'required',
            'tahun_dibayar' => 'required',
            'id_spp' => 'required',
            'jumlah_bayar' => 'required',
            ]);

        $data = \App\Pembayaran::find($id_pembayaran);
        $data->id_petugas = Session::get('id_petugas');

        $data->nisn = $request->nisn;
        $date = date("Y-m-d");
        $data->tgl_bayar = $date;
        $data->bulan_dibayar = $request->bulan_dibayar;
        $data->tahun_dibayar = $request->tahun_dibayar;
        $data->id_spp = $request->id_spp;
        $data->jumlah_bayar = $request->jumlah_bayar;

        $status = $data->update();

        if ($status) {
            return redirect('petugas/home');
        } else {
            return redirect('petugas/edit/pembayaran');
        }
    }

    public function deletePembayaranPost($id_pembayaran)
    {
        $data = \App\Pembayaran::find($id_pembayaran);

        $status = $data->delete();

        if ($status) {
            return redirect('petugas/home');
        } else {
            return redirect('petugas/home');
        }
    }
}
