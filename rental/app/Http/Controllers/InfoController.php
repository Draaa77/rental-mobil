<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoModel;
use App\Models\MobilModel;
use App\Models\PeminjamModel;

class InfoController extends Controller
{
    public function infotampil()
    {
        $datainfo = InfoModel::orderby('id_info', 'ASC')
        ->paginate(5);

        $datamobil = MobilModel::all();
        $datapeminjam = PeminjamModel::all();

        return view('halaman/view_info',['info_pinjam'=>$datainfo, 'peminjam'=>$datapeminjam, 'mobil'=>$datamobil]);
    }

    public function infotambah(Request $request)
    {
        $this->validate($request, [
            'id_mobil' => 'required',
            'id_peminjam' => 'required'
        ]);

        InfoModel::create([
            'id_mobil' => $request->id_mobil,
            'id_peminjam' => $request->id_peminjam
        ]);

        return redirect('/info');
    }

    public function infohapus($id_info)
    {
        $datainfo=InfoModel::find($id_info);
        $datainfo->delete();

        return redirect()->back();
    }

    public function infoedit($id_info, Request $request)
    {
        $this->validate($request, [
            'id_mobil' => 'required',
            'id_peminjam' => 'required'
        ]);

        $id_info = InfoModel::find($id_info);
        $id_info->id_mobil = $request->id_mobil;
        $id_info->id_peminjam = $request->id_peminjam;

        $id_info->save();
        
        return redirect()->back();
    }
}
