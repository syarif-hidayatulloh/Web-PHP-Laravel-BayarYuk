<?php

namespace App\Http\Controllers\Petugas\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PetugasController extends Controller
{
    // == View ==

    public function viewdataPetugas()
    {
        $petugas = 'petugas';
        $data['petugas'] = \App\Petugas::where('level',$petugas)->get();
        return view('admin.data-petugas',$data);
    }

    public function viewTambahPetugas()
    {
        return view('admin.update-petugas');
    }

    public function viewEditPetugas($id_petugas)
    {
        $data['petugas'] = \App\Petugas::find($id_petugas);
        return view('admin.update-petugas',$data);
    }

    public function viewForgotPetugas($id_petugas)
    {
        $data['petugas'] = \App\Petugas::find($id_petugas);
        return view('admin.forgot-petugas',$data);
    }

    // == Action ==

    public function tambahPetugasPost(Request $request)
    {
        $this->validate($request,[
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required|min:6',
            'level' => 'required',
            ]);

        $data = new \App\Petugas;
        
        $data->nama_petugas = $request->nama_petugas;
        $data->username = $request->username;
        $data->password = $request->password;
        $data->level = $request->level;
        $status = $data->save();
        
        if ($status) {
            return redirect('admin/data-petugas');
        } else {
            return redirect('admin/data-petugas/tambah');
        }
    }

    public function editPetugasPost(Request $request, $id_petugas)
    {
        $this->validate($request,[
            'nama_petugas' => 'required',
            'username' => 'required',
            'level' => 'required',
            ]);

        $data = \App\Petugas::find($id_petugas);
        $data->nama_petugas = $request->nama_petugas;
        $data->username = $request->username;
        $data->level = $request->level;
        
        $status = $data->update();
        
        if ($status) {
            return redirect('admin/data-petugas');
        } else {
            return redirect('admin/data-petugas/edit');
        }
    }

    public function forgotPetugasPost(Request $request, $id_petugas)
    {
        $this->validate($request,[
            'password' => 'required',
            'cpassword' => 'same:password',
            ]);
        
        $data = \App\Petugas::find($id_petugas);
        
        $data->password = $request->password;
        
        $status = $data->update();
        
        if ($status) {
            return redirect('admin/data-petugas');
        } else {
            return redirect('admin/data-petugas/edit');
        }
    }   

    public function deletePetugasPost($id_petugas)
    {
        $data = \App\Petugas::find($id_petugas);
        
        $status = $data->delete();
        
        if ($status) {
            return redirect('admin/data-petugas');
        } else {
            return redirect('admin/data-petugas');
        }
    } 
}
