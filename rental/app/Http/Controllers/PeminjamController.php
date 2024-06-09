<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeminjamModel;

class PeminjamController extends Controller
{
    public function peminjamtampil()
    {
        $datapeminjam = PeminjamModel::orderby('nama', 'ASC')
        ->paginate(5);

        return view('halaman/view_peminjam',['peminjam'=>$datapeminjam]);
    }

    public function peminjamtambah(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'hp' => 'required'
        ]);

        PeminjamModel::create([
            'nama' => $request->nama,
            'hp' => $request->hp
        ]);

        return redirect('/peminjam');
    }

    public function peminjamhapus($id_peminjam)
    {
        $datapeminjam=PeminjamModel::find($id_peminjam);
        $datapeminjam->delete();

        return redirect()->back();
    }

    public function peminjamedit($id_peminjam, Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'hp' => 'required'
        ]);

        $id_peminjam = PeminjamModel::find($id_peminjam);
        $id_peminjam->nama = $request->nama;
        $id_peminjam->hp = $request->hp;

        $id_peminjam->save();
        
        return redirect()->back();
    }
}
