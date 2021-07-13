<?php

namespace App\Enum;

use ReflectionClass;

class RolesEnum
{
    public const user = [
        'name' => 'user',
        'permissions' => [
            PermissionsEnum::manage_self_projects,
            PermissionsEnum::manage_self_tasks,
        ],
    ];

    public const admin = [
        'name' => 'admin',
        'permissions' => [
            PermissionsEnum::manage_self_projects,
            PermissionsEnum::manage_self_tasks,
            PermissionsEnum::manage_projects,
            PermissionsEnum::manage_tasks,
            PermissionsEnum::manage_users,
        ],
    ];

    public static function getConstants()
    {
        $oClass = new ReflectionClass(__CLASS__);

        return $oClass->getConstants();
    }
}
