<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\BookingNotificationEmail;
use App\Models\Pemesanan;
use Carbon\Carbon;
use Dompdf\Dompdf;
use FPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
use PDF;

class JadwalController extends Controller
{
    public function pemasukan()
    {
        $totalPrice = Pemesanan::where('status', '=', 3)
            ->sum('total_harga');
        $formattedPrice = number_format($totalPrice, 3, ',', '.');

        $pemasukan = DB::table('pemesanans')
            ->where('status', '=', 3)
            ->get();

        return view('dashboard.pemasukan', compact('pemasukan', 'formattedPrice'));
    }

    public function index()
    {

        $jadwal = DB::table('pemesanans as u')->select(
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
            'u.waktu_ambil as waktu_ambil',
            'u.waktu_kembali as waktu_kembali',
        )
            ->leftjoin('users as b', 'b.id', '=', 'u.nama_pelanggan')
            ->leftJoin('users as c', 'c.id', '=', 'u.sopir')
            ->where('u.status', '=', 2)
            ->get();

        $sopir = Auth::user()->id;

        $response = DB::table('pemesanans as u')->select(
            'u.id_pemesanan as pemesananId',
            'u.nama_pelanggan as pelangganId',
            'u.nama_pelanggan as nama_user',
            'u.nama_kendaraan as kendaraan',
            'u.tanggal_ambil as tanggal_ambil',
            'u.tanggal_kembali as tanggal_kembali',
            'u.sopir as sopirId',
            'u.status as status',
            'u.waktu_ambil as waktu_ambil',
            'b.nama as nama_pelanggan',
            'c.nama as nama_sopir',

        )
            ->leftjoin('users as b', 'b.id', '=', 'u.nama_pelanggan')
            ->leftJoin('users as c', 'c.id', '=', 'u.sopir')
            ->get();

        $notifiedBookings = [];

       
        foreach ($jadwal as $booking) {
           
            if (! in_array($booking->id_pemesanan, $notifiedBookings) && $booking->sopir == $sopir) {
              
                $tanggalPengambilan = Carbon::parse($booking->tanggal_ambil);
                $tanggalPengingat = $tanggalPengambilan->subDay();

             
                if ($tanggalPengingat->isToday()) {
                 
                    $emailData = [
                        'booking' => $booking,
                        'tanggal_ambil' => $booking->tanggal_ambil,
                        'nama_kendaraan' => $booking->nama_kendaraan,
                       
                    ];

                  
                    $driverEmail = DB::table('users')->where('id', $booking->sopir)->value('email');

                   
                    if ($driverEmail) {
                        Mail::to($driverEmail)->send(new BookingNotificationEmail($emailData));

                       
                        $notifiedBookings[] = $booking->id_pemesanan;
                    }
                }
            }
        }

        return view('dashboard.jadwal', compact('response', 'jadwal'));
    }

    public function kwitansi($id)
    {
        ini_set('max_execution_time', 120); 


            $kwitansi = DB::table('pemesanans')
            ->select('pemesanans.*', 'users.nama', 'users.no_hp')
            ->leftJoin('users','pemesanans.sopir','=','users.id')
            ->where('pemesanans.id_pemesanan','=',$id)
            ->where('users.level','=','sopir')
            ->first();
            $ambil = Carbon::parse($kwitansi->tanggal_ambil);
            $kembali = Carbon::parse($kwitansi->tanggal_kembali);
            $selisih = $ambil->diffInDays($kembali);
            $kwitansi->selisih_hari = $selisih;

        


       
        $logoPath = public_path('images/icon/iconbg.png');
        $logo = Image::make($logoPath)->encode('data-url')->encoded;

       
        $html = View::make('dashboard.kwitansi', ['latter' => $kwitansi], compact('logo'))->render();

      
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

       
        $dompdf->render();

        
        return $dompdf->stream('kwitansi.pdf');
    }

    public function calculateTotalPrice(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $totalPrice = Pemesanan::where('status', '=', 2)
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

        return view('dashboard.pemasukan', compact('formattedTotal', 'formattedPrice', 'pemasukan', 'report'));
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

        
        $pdf->SetFont('Arial', 'B', 16);

       
        foreach ($report as $item) {
            $pdf->Cell(40, 10, $item->id);
            $pdf->Cell(40, 10, $item->tanggal_ambil);
            $pdf->Cell(40, 10, $item->customer_name);
            $pdf->Cell(40, 10, $item->total_harga);
            $pdf->Ln(); // Move to the next line
        }

        return $pdf->Output('Report.pdf', 'D');
    }

    public function selesai(Request $request, $id)
    {
        $selesai = DB::table('pemesanans')
            ->where('id_pemesanan', $id)
            ->update([
                'status' => 3,
            ]);

        alert()->success('Berhasil', 'Data Berhasil diselesaikan');

        return redirect()->route('jadwal')->with('success', 'Data Berhasil Diselesaikan');

    }
}
