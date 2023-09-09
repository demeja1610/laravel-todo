<?php

use App\Enum\Task\TaskActionEnum;

return [
    'create_title_placeholder' => 'Enter your new task',
    'create_submit' => 'Add',
    'empty' => 'No tasks. Yet',
    'created' => 'Created',

    'actions' => [
        TaskActionEnum::DELETE->value => 'Delete',
        TaskActionEnum::RESTORE->value => 'Restore',
        TaskActionEnum::COMPLETE->value => 'Move to completed tasks',
        TaskActionEnum::FAVORITE->value => 'Add to favorite',
    ]
];
