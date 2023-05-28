<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kendaraan;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::all();
        return view('dashboard.kendaraan',compact('kendaraan'));
    }

    public function insert()
    {
        return view('dashboard.insertKendaraan');
    }

    public function store(Request $request){
        $kendaraan = new Kendaraan();
        $kendaraan->nama_kendaraan = $request->input('nama_kendaraan');
        $kendaraan->no_kendaraan = $request->input('no_kendaraan');
        $kendaraan->tipe = $request->input('tipe');
        $kendaraan->tahun = $request->input('tahun');
        $kendaraan->max_penumpang = $request->input('max_penumpang');
        $kendaraan->harga_24_jam = $request->input('harga_24_jam');
        $kendaraan->deskripsi = $request->input('deskripsi');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->storeAs('image/kendaraan/',$filename);
            $kendaraan->image = $filename;
        }
    $kendaraan->save();
    alert()->success('Tambah','Data Berhasil Ditambahkan');
    return redirect()->route('Kendaraan')->with('success',' Data Berhasil Ditambahkan ');

}

public function hapus($id){
    $hapus = Kendaraan::where('id_mobil', $id);
    $hapus->delete();
    return redirect()->back()->with('status','Data Telah Dihapus');
}

}
