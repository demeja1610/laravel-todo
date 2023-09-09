<?php

use App\Enum\Task\TaskActionEnum;

return [
    'create_title_placeholder' => 'Новая задача',
    'create_submit' => 'Добавить',
    'empty' => 'Пока что задач нет',
    'created' => 'Добавлено',

    'actions' => [
        TaskActionEnum::DELETE->value => 'Удалить',
        TaskActionEnum::RESTORE->value => 'Восстановить',
        TaskActionEnum::COMPLETE->value => 'Отправить в завершенные задачи',
        TaskActionEnum::UNCOMPLETE->value => 'Отправить в текущие задачи',
        TaskActionEnum::FAVORITE->value => 'Добавить в избранное',
        TaskActionEnum::UNFAVORITE->value => 'Убрать из избранного',
    ],
];
