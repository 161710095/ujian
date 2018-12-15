<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        schema::defaultStringLength(191);
        view()->composer('frontend.side', function ($view) {
            // $category = \App\Category::all();
            $recent = \App\Artikel::orderBy('created_at', 'desc')->take(4)->get();
            $view->with(compact('recent'));
        });
        view()->composer('frontend.sideproduk', function ($view) {
            $kategori = \App\Kategori::all();
            // $category = \App\Category::all();
            $recent = \App\Barang::orderBy('created_at', 'desc')->take(4)->get();
            $view->with(compact('kategori', 'recent'));
        });
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
