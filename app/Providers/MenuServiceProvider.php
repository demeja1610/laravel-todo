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
            // [
            //     'name' => 'Задачи',
            //     'route' => 'page.projects',
            //     'can' => PermissionsEnum::manage_self_tasks,
            // ],
            // [
            //     'name' => 'Все проекты',
            //     'route' => 'page.projects',
            //     'can' => PermissionsEnum::manage_projects,
            // ],
            // [
            //     'name' => 'Все задачи',
            //     'route' => 'page.projects',
            //     'can' => PermissionsEnum::manage_tasks,
            // ],
            // [
            //     'name' => 'Пользователи',
            //     'route' => 'page.projects',
            //     'can' => PermissionsEnum::manage_users,
            // ],
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
