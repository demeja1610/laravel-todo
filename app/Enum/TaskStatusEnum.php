<?php

namespace App\Enum;

use ReflectionClass;

class TaskStatusEnum
{
    public const await = 'await';
    public const dev = 'dev';
    public const test = 'test';
    public const review = 'review';
    public const done = 'done';

    public static function getConstants()
    {
        $oClass = new ReflectionClass(__CLASS__);

        return $oClass->getConstants();
    }
}
