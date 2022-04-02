<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Session;
use App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*',function($settings){
            $settings->with('gs', DB::table('generalsettings')->find(1));
            $settings->with('seo', DB::table('seotools')->find(1));
            if (Session::has('language')) 
            {
            if (\Request::is('admin/*')) { 
                $data = DB::table('admin_languages')->where('is_default','=',1)->first();
                App::setlocale($data->name);
            }
                else {
                    $data = DB::table('admin_languages')->find(Session::get('language'));
                    App::setlocale($data->name);                    
                }
            }
            else
            {
                $data = DB::table('admin_languages')->where('is_default','=',1)->first();
                App::setlocale($data->name);
            }   
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
