<?php

namespace App\Enum;

use ReflectionClass;

class PermissionsEnum
{
    public const manage_self_projects = 'manage_self_projects';
    public const manage_self_tasks = 'manage_self_tasks';

    public const manage_projects = 'manage_projects';
    public const manage_tasks = 'manage_tasks';
    public const manage_users = 'manage_users';

    public static function getConstants()
    {
        $oClass = new ReflectionClass(__CLASS__);

        return $oClass->getConstants();
    }
}
