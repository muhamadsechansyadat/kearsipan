<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Suratmasuk;
use App\Suratkeluar;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $notif_surat_masuk = Suratmasuk::where('status',0)->get();
        $notif_surat_keluar = Suratkeluar::where('status',0)->get();

        View()->share('notif_surat_masuk',$notif_surat_masuk);
        View()->share('notif_surat_keluar',$notif_surat_keluar);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
