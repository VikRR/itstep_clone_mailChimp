<?php

namespace App\Providers;

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
        //\View::share('user',\Auth::user()->id);
        //$data = array(\Auth::user()->id);
        //view()->share('user',$data);
        //view()->share('user_id',[\Auth::user()->id]);
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
