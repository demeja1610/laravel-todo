<?php

use App\Enum\TaskStatusEnum;

return [
    TaskStatusEnum::await => 'В ожидании',
    TaskStatusEnum::dev => 'В разработке',
    TaskStatusEnum::test => 'На тестировании',
    TaskStatusEnum::review => 'На проверке',
    TaskStatusEnum::done => 'Выполнен',
];
