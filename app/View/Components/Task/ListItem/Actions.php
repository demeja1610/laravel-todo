<?php

namespace App\View\Components\Task\ListItem;

use Illuminate\View\Component;
use App\Enum\Task\TaskActionEnum;
use Illuminate\Contracts\View\View;
use App\ValueObjects\Task\TaskActionValueObject;
use App\Interfaces\Services\TaskServiceInterface;

class Actions extends Component
{
    public array $actions = [];

    protected $except = [
        'taskService',
        'prepareActions',
        'getIcon',
    ];

    public function __construct(
        public TaskServiceInterface $taskService,
        public $task
    ) {
        $this->prepareActions();
    }

    public function render(): View
    {
        return view('components.task.list-item.actions');
    }

    public function prepareActions(): void
    {
        $actions = $this->taskService->getAllowedActions($this->task);

        $this->actions = array_map(
            array: $actions,
            callback: function (TaskActionValueObject $action) {
                $icon = $this->getIcon($action);

                $action->setIcon($icon);

                return $action->toNative();
            },
        );
    }

    public function getIcon(TaskActionValueObject $action): string
    {
        return match ($action->getAction()) {
            TaskActionEnum::DELETE => 'trash',
            TaskActionEnum::RESTORE => 'restore',
            TaskActionEnum::COMPLETE => 'check',
            TaskActionEnum::FAVORITE => 'like-heart',
        };
    }
}
