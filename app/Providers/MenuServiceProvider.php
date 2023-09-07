<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    private $menu;

    public function __construct()
    {
        $this->menu = [
            [
                'name' => 'Проекты',
                'route' => 'page.projects',
            ],
            [
                'name' => 'Выйти',
                'route' => 'logout',
                'classes' => 'logout',
            ],
        ];
    }

    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer('layouts.app', function($view) {
            $view->with('menu', $this->menu);
        });
    }
}
