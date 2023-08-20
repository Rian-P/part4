<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::all();

        return view('dashboard.kendaraan', compact('kendaraan'));
    }

    public function insert()
    {
        return view('dashboard.insertKendaraan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_kendaraan' => 'required|unique:kendaraans,no_kendaraan',

        ]);

        $kendaraan = new Kendaraan();
        $kendaraan->nama_kendaraan = $request->input('nama_kendaraan');
 
        $kendaraan->no_kendaraan = $request->input('no_kendaraan');
        $kendaraan->tipe = $request->input('tipe');
        $kendaraan->tahun = $request->input('tahun');
        $kendaraan->max_penumpang = $request->input('max_penumpang');
        $kendaraan->harga_24_jam = $request->input('harga_24_jam');
        $kendaraan->deskripsi = $request->input('deskripsi');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->storeAs('image/kendaraan/', $filename);
            $kendaraan->image = $filename;
        }

        $kendaraan->save();
        alert()->success('Tambah', 'Data Berhasil Ditambahkan');

        return redirect()->route('Kendaraan')->with('success', ' Data Berhasil Ditambahkan ');

    }

    public function updateView($id)
    {
        $kendaraan = Kendaraan::find($id);

        return view('dashboard.updateKendaraan', compact('kendaraan'));
    }

    public function update(Request $request, $id)
    {
        try {
            $kendaraan = Kendaraan::findOrFail($id);

            $kendaraan->nama_kendaraan = $request->input('nama_kendaraan');
            $kendaraan->no_kendaraan = $request->input('no_kendaraan');
            $kendaraan->tipe = $request->input('tipe');
            $kendaraan->tahun = $request->input('tahun');
            $kendaraan->max_penumpang = $request->input('max_penumpang');
            $kendaraan->harga_24_jam = $request->input('harga_24_jam');
            $kendaraan->deskripsi = $request->input('deskripsi');

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->storeAs('image/kendaraan/', $filename);
                $kendaraan->image = $filename;
            }
            alert()->success('Update', 'Data Berhasil Diupdate');
            $kendaraan->save();

            return redirect()->route('Kendaraan')->with('success', 'Data berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: '.$e->getMessage());
        }
    }

    public function hapus($id)
    {
        $hapus = Kendaraan::find($id);
        if ($hapus) {
            $hapus->delete();

            return redirect()->back()->with('status', 'Data telah dihapus');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}
