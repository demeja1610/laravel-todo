<?php

namespace App\Providers;

use App\Enum\PermissionsEnum;
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
                'can' => PermissionsEnum::manage_self_projects,
            ],
            [
                'name' => 'Пользователи',
                'route' => 'page.users',
                'can' => PermissionsEnum::manage_users,
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
