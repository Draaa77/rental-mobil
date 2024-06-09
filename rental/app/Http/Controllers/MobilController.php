<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MobilModel;

class MobilController extends Controller
{
    public function mobiltampil()
    {
        $datamobil = MobilModel::orderby('nomor', 'ASC')
        ->paginate(5);

        return view('halaman/view_mobil',['mobil'=>$datamobil]);
    }

    public function mobiltambah(Request $request)
    {
        $this->validate($request, [
            'nomor' => 'required',
            'jenis' => 'required',
            'warna' => 'required'
        ]);

        MobilModel::create([
            'nomor' => $request->nomor,
            'jenis' => $request->jenis,
            'warna' => $request->warna
        ]);

        return redirect('/mobil');
    }

    public function mobilhapus($id_mobil)
    {
        $datamobil=MobilModel::find($id_mobil);
        $datamobil->delete();

        return redirect()->back();
    }

    public function mobiledit($id_mobil, Request $request)
    {
        $this->validate($request, [
            'nomor' => 'required',
            'jenis' => 'required',
            'warna' => 'required'
        ]);

        $id_mobil = MobilModel::find($id_mobil);
        $id_mobil->nomor = $request->nomor;
        $id_mobil->jenis = $request->jenis;
        $id_mobil->warna = $request->warna;

        $id_mobil->save();
        
        return redirect()->back();
    }
}
