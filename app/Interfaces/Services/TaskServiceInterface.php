<?php

namespace App\Interfaces\Services;

use App\Models\Task;

interface TaskServiceInterface
{
    /**
     * @return array<\App\Dto\Task\TaskActionValueObject>
     */
    public function getAllowedActions(Task $model): array;
}
