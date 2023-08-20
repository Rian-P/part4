<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Models\Pemesanan;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('valid_sopir', function ($attribute, $value, $parameters, $validator) {
            $tanggal_ambil = $validator->getData()['tanggal_ambil'];
            $tanggal_kembali = $validator->getData()['tanggal_kembali'];

            $count = Pemesanan::where('sopir', $value)
                ->where(function ($query) use ($tanggal_ambil, $tanggal_kembali) {
                    $query->whereBetween('tanggal_ambil', [$tanggal_ambil, $tanggal_kembali])
                        ->orWhereBetween('tanggal_kembali', [$tanggal_ambil, $tanggal_kembali])
                        ->orWhere(function ($q) use ($tanggal_ambil, $tanggal_kembali) {
                            $q->where('tanggal_ambil', '<=', $tanggal_ambil)
                                ->where('tanggal_kembali', '>=', $tanggal_kembali);
                        });
                })
                ->count();
return in_array($value, ['good', 'excellent']);
            return $count === 0;
        });

        
    
    }
}
