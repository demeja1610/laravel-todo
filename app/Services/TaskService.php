<?php

namespace App\Services;

use App\Models\Task;
use App\Enum\Task\TaskActionEnum;
use App\ValueObjects\Task\TaskActionValueObject;
use App\Interfaces\Services\TaskServiceInterface;

class TaskService implements TaskServiceInterface
{
    public function getAllowedActions(Task $model): array
    {
        $actions = [
            $this->getCompleteTaskAction($model),
            $this->getFavoriteTaskAction($model),
            $this->getRestoreTaskAction($model),
            $this->getDeleteTaskAction($model),
        ];

        return array_filter($actions, fn (?TaskActionValueObject $item) => $item !== null);
    }

    protected function getDeleteTaskAction(Task &$model): TaskActionValueObject
    {
        return new TaskActionValueObject(action: TaskActionEnum::DELETE, id: $model->id);
    }

    protected function getRestoreTaskAction(Task &$model): ?TaskActionValueObject
    {
        $action = null;

        if ($model->trashed()) {
            $action = new TaskActionValueObject(action: TaskActionEnum::RESTORE, id: $model->id);
        }

        return $action;
    }

    protected function getCompleteTaskAction(Task &$model): ?TaskActionValueObject
    {
        $action = null;

        if (!$model->trashed()) {
            $action = new TaskActionValueObject(action: TaskActionEnum::COMPLETE, id: $model->id);

            if ($model->completed_at !== null) {
                $action->setIsPerformed(true);
            }
        }

        return $action;
    }

    protected function getFavoriteTaskAction(Task &$model): ?TaskActionValueObject
    {
        $action = null;

        if (!$model->trashed()) {
            $action = new TaskActionValueObject(action: TaskActionEnum::FAVORITE, id: $model->id);

            if ($model->favorite !== false) {
                $action->setIsPerformed(true);
            }
        }

        return $action;
    }
}
