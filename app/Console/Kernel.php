<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;
use Telegram\Bot\Api;
use App\User;
use App\Pemesanan;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    public function schedule(Schedule $schedule)
{
    $schedule->call(function () {
        $users = User::all();
        
        foreach ($users as $user) {
            $phoneNumber = $user->no_hp;
            $now = Carbon::now();
            
            $pemesanans = Pemesanan::whereDate('tanggal_ambil', $now->addDay()->toDateString())
                ->whereTime('waktu_ambil', '=', Carbon::parse('1 hour ago')->format('H:i:s'))
                ->get();
            
            foreach ($pemesanans as $pemesanan) {
                // Waktu h-1 hari, kirim pesan Telegram
                $message = 'Telegram: Ambil mobil Anda.';
                
                $telegram = new Api(config('6034964506:AAHgcRYkD3Zndhz6l9qAVknyFZCTYA3rE28'));

                $response = $telegram->sendMessage([
                    'chat_id' => $phoneNumber,
                    'text' => $message,
                ]);
                
                if ($response->isOk()) {
                    // Pesan terkirim
                    // Lakukan tindakan sesuai kebutuhan Anda
                } else {
                    // Gagal mengirim pesan
                    // Lakukan tindakan sesuai kebutuhan Anda
                }
            }
        }
    })->dailyAt('09:00'); // Atur waktu sesuai kebutuhan (misalnya, kirim pesan setiap hari pukul 09:00)
}
    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
