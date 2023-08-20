<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\dataharga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
   

    public function index()
    {

        $pemesanan = DB::table('pemesanans as u')->select(
            'u.id_pemesanan as id_pemesanan',
            'u.nama_pelanggan as pelangganId',
            'b.nama as nama_pelanggan',
            'u.nama_pelanggan as nama_user',
            'u.nama_kendaraan as nama_kendaraan',
            'u.tanggal_ambil as tanggal_ambil',
            'u.tanggal_kembali as tanggal_kembali',
            'u.bukti_tf as bukti_tf',
            'u.foto_ktp as foto_ktp',
            'u.total_harga as total_harga',
            'u.status as status',
            'u.sopir as sopir',
            'c.nama as nama_sopir',
            'u.tujuan as tujuan',
            'u.tujuan_sopir as tujuan_sopir',
            'u.waktu_ambil as waktu_ambil',
        )
            ->leftjoin('users as b', 'b.id', '=', 'u.nama_pelanggan')
            ->leftJoin('users as c', 'c.id', '=', 'u.sopir')
            ->get();

            $supir = User::where('level', 'Sopir')->get();

            

    return view('dashboard.pemesanan', compact('pemesanan', 'supir'));
    }
   public function lihatharga(){
    $harga = dataharga::all();
    return view ('dashboard.insertdataharga',compact('harga'));
   }
   public function dataharga(Request $request){
    $dataharga = new dataharga(); // Create a new instance of the model
    $dataharga->harga = $request->input('harga');
    $dataharga->save();

    return redirect()->route('lihatharga')->with('success', 'Data Berhasil Ditambahkan');
}
public function updatedataharga(Request $request){
    $id = $request->input('id');
    $dataharga = dataharga::find($id); // Find the existing data by ID
    $dataharga->harga = $request->input('harga');
    $dataharga->save();

    return redirect()->route('lihatharga')->with('success', 'Data Berhasil Diupdate');
}

    public function insert()
    {
        $kendaraan = Kendaraan::all();
        $sewa = kendaraan::all();
        $aku = pemesanan::all();
        $harga = dataharga::all();
        $supir = User::where('level', 'Sopir')
        ->where('status', 'aktif')
        ->get();


        return view('dashboard.insertPemesanan', compact('kendaraan', 'aku','harga','sewa', 'supir'));
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sopir' => 'required|valid_sopir',
            'tanggal_ambil' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_ambil',
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('validationFailed', true);
        }
    
        $pemesanan = new Pemesanan();
        $pemesanan->nama_pelanggan = $request->input('nama_pelanggan');
        $pemesanan->nama_kendaraan = $request->input('nama_kendaraan');
        $pemesanan->tujuan = $request->input('tujuan');
        $pemesanan->tujuan_sopir = $request->input('tujuan_sopir');
        $pemesanan->harga_sewa = $request->input('harga_sewa');
        $pemesanan->tanggal_ambil = $request->input('tanggal_ambil');
        $pemesanan->tanggal_kembali = $request->input('tanggal_kembali');
        $pemesanan->sopir = $request->input('sopir');
        $pemesanan->bukti_tf = $request->input('bukti_tf');
        $pemesanan->status_bayar = $request->input('status_bayar');
        $pemesanan->total_harga = $request->input('total_harga');
        $pemesanan->waktu_ambil = $request->input('waktu_ambil');
        $pemesanan->waktu_kembali = $request->input('waktu_kembali');
        $pemesanan->status = 2;
        if ($request->hasFile('foto_ktp')) {
            $file = $request->file('foto_ktp');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->storeAs('image/ktp/', $filename);
            $pemesanan->foto_ktp = $filename;
        }
        if ($request->hasFile('bukti_tf')) {
            $file = $request->file('bukti_tf');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->storeAs('image/transfer/', $filename);
            $pemesanan->bukti_tf = $filename;
        }
        $pemesanan->save();
        alert()->success('Tambah', 'Data Berhasil Ditambahkan');

        return redirect()->route('order')->with('success', ' Data Berhasil Ditambahkan ');
    }

    public function approve(Request $request, $id)
    {
        $approve = DB::table('pemesanans')
            ->where('id_pemesanan', $id)
            ->update([
                'status' => 2,
            ]);

        alert()->success('Berhasil', 'Data Berhasil diuprove');

        return redirect()->route('order')->with('success', 'Data Berhasil Diuprove');
    }
    public function batal(Request $request, $id)
    {
        $approve = DB::table('pemesanans')
            ->where('id_pemesanan', $id)
            ->update([
                'status' => 4,
            ]);

        alert()->success('Berhasil', 'Data Berhasil dibatalkan');

        return redirect()->route('order')->with('success', 'Data Berhasil Dibatalkan');
    }

    public function updateSopir(Request $request, $id)
    {
        $sopir = Pemesanan::find($id);
        $sopir->sopir = $request->input('sopir');
        $sopir->save();

        alert()->success('Berhasil', 'Data Berhasil diupdate');

        return redirect()->route('order')->with('success', 'Data Berhasil Diuprove');
    }

    public function hapus($id)
    {
        $hapus = Pemesanan::find($id);
        if ($hapus) {
            $hapus->delete();

            return redirect()->back()->with('status', 'Data telah dihapus');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}
