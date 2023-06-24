<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\jadwals;
use PDF;
use FPDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    public function pemasukan(){
        $totalPrice = Pemesanan::where('status','=', 2)
                     ->sum('total_harga');
        $formattedPrice = number_format($totalPrice, 2, ',', '.');

        $pemasukan = DB::table('pemesanans')
        ->where('status', '=', 2)
        ->get();

        return view('dashboard.pemasukan',compact('pemasukan','formattedPrice'));
    }
   


    public function index()
    {
        $jadwal = DB::table('pemesanans')
        ->join('users', 'users.id', '=', 'pemesanans.nama_pelanggan')
        ->where('pemesanans.status', '=', 2)
        ->get();


        $sopir = Auth::user()->id;

            $response = DB::table('pemesanans as u')->select(
                'u.id_pemesanan as pemesananId',
                'u.nama_pelanggan as pelangganId',
                'u.nama_kendaraan as kendaraan',
                'u.tanggal_ambil as tanggal_ambil',
                'u.tanggal_kembali as tanggal_kembali',
                'u.sopir as sopirId',
                'u.status as status',
                'u.waktu_ambil as waktu_ambil',
                'b.nama as nama_pelanggan', 
            )
            ->leftjoin('users as b', 'b.id', '=', 'u.nama_pelanggan')
            ->where('u.sopir', $sopir)
            ->get();
       
        return view('dashboard.jadwal',compact('response','jadwal'));
    }
    
    

    public function kwitansi($id)
    { 
        $kwitansi = Pemesanan::where('id_pemesanan', $id)->first();
        $ambil = Carbon::parse($kwitansi->tanggal_ambil);
        $kembali = Carbon::parse($kwitansi->tanggal_kembali);
        $selisih = $ambil->diffInDays($kembali);
        $kwitansi->selisih_hari = $selisih;
    
        $pdf = PDF::loadView('dashboard.kwitansi', ['latter' => $kwitansi]);
        return $pdf->stream('Kwitansi');
    }


public function calculateTotalPrice(Request $request)
{
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    $totalPrice = Pemesanan::where('status','=', 2)
                     ->sum('total_harga');
    $formattedPrice = number_format($totalPrice, 2, ',', '.');

    $pemasukan = DB::table('pemesanans')
        ->where('status', '=', 2)
        ->get();

    $report = Pemesanan::where('status', '=', 2)
        ->whereBetween('tanggal_ambil', [$startDate, $endDate])
        ->get();

    $pemesanan = Pemesanan::where('status', '=', 2)
        ->whereBetween('tanggal_ambil', [$startDate, $endDate])
        ->sum('total_harga');
       

    $formattedTotal = number_format($pemesanan, 2, ',', '.');

    return view('dashboard.pemasukan', compact('formattedTotal','formattedPrice','pemasukan','report'));
}




public function report(Request $request)
{
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    $report = Pemesanan::where('status', '=', 2)
        ->whereBetween('tanggal_ambil', [$startDate, $endDate])
        ->get();

    $pdf = new FPDF();
    $pdf->AddPage();

    // Set font and size
    $pdf->SetFont('Arial', 'B', 16);

    // Loop through the $report data and add it to the PDF
    foreach ($report as $item) {
        $pdf->Cell(40, 10, $item->id);
        $pdf->Cell(40, 10, $item->tanggal_ambil);
        $pdf->Cell(40, 10, $item->customer_name);
        $pdf->Cell(40, 10, $item->total_harga);
        $pdf->Ln(); // Move to the next line
    }

    return $pdf->Output('Report.pdf', 'D');
}


public function selesai(Request $request, $id){
    $selesai =  DB::table('pemesanans')
                ->where('id_pemesanan', $id)
                ->update([
                    'status' => 3
                ]);

    alert()->success('Berhasil','Data Berhasil diselesaikan');
    return redirect()->route('jadwal')->with('success','Data Berhasil Diselesaikan');

}

}