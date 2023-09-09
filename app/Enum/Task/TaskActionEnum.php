<?php

namespace App\Enum\Task;

enum TaskActionEnum: string
{
    case DELETE = 'DELETE';
    case RESTORE = 'RESTORE';
    case COMPLETE = 'COMPLETE';
    case UNCOMPLETE = 'UNCOMPLETE';
    case FAVORITE = 'FAVORITE';
    case UNFAVORITE = 'UNFAVORITE';
}
