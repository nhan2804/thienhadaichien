<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Auth;
use App\Insight;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        view()->composer('*', function($view)
    {
        if (Auth::check()) {
            $view->with('user', Auth::user());
            $view->with('date', date("Y-m-d H:i:s"));
            $view->with('i',Insight::where('id_user',Auth::user()->id)->first());
        }else {
            $view->with('user', null);
        }
    });
    }
}
