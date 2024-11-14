<?php

namespace App\Providers;

use App\Facades\Model\JenisModel;
use App\Facades\Model\RuanganModel;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Plugins\Query;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {}

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $roles = Query::role();
        if ($roles) {
            foreach ($roles as $role) {
                Blade::if($role->field_primary, function () use ($role) {
                    return auth()->check() && auth()->user()->role == $role->field_primary;
                });
            }
        }

        Blade::if('level', function ($value) {
            return auth()->check() && auth()->user()->level >= $value;
        });

        Livewire::setScriptRoute(function ($handle) {
            return Route::get('/vendor/livewire/livewire.js', $handle);
        });

        if(env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }

        if(!Cache::has('cacheable_App\Facades\Model\RuanganModel'))
        {
            Cache::set('cacheable_App\Facades\Model\RuanganModel', RuanganModel::getAllByKey());
        }

        if(!Cache::has('cacheable_App\Facades\Model\JenisModel'))
        {
            Cache::set('cacheable_App\Facades\Model\JenisModel', JenisModel::getAllByKey());
        }
    }
}
